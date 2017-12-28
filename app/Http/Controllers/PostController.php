<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 4:51 PM
 */

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Tag;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){}

    public function getIndex() {

        $posts = Post::where(function($query){
                $query->whereNull('archived')
                      ->orWhere('archived', 0);
            })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        return view('content.index', ['posts' => $posts]);
    }

    public function getArchiveIndex() {

        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->where('archived', 1)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        return view('content.archive', ['posts' => $posts]);
    }

    public function getProfileIndex() {

        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        return view('profile.index', ['posts' => $posts]);
    }

    public function getPost($id) {

        $post = Post::where('id', $id)
            ->with('likes')
            ->first();
        return view('content.post', ['post' => $post]);
    }

    public function getLikePost($id) {

        $post = Post::where('id', $id)
            ->first();
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
    }

    public function getCreate() {

        Auth::user();
        $tags = Tag::all();
        return view('content.create', ['tags' => $tags, 'user_id', Auth::user()]);
    }

    public function postCreate(Request $request) {

        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('content.index')->with('info', 'Item created, Title is: ' . $request->input('title'));
    }

    //ADMIN

    public function getAdminIndex() {

        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getAdminEdit($id) {

        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.edit', ['post' => $post, 'postId' => $id, 'tags' => $tags]);
    }

    public function getAdminDelete($id) {

        $post = Post::find($id);
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted!');
    }

    public function getAdminCreate() {

        Auth::user();
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags, 'user_id', Auth::user()]);
    }

    public function postAdminCreate(Request $request) {

        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')->with('info', 'Item created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(Request $request) {

        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3'
        ]);
        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

    public function setArchived($id) {
        $post = Post::where('id', $id)->first();
        $post->archived = 1;
        $post->save();

        return redirect("archive");
    }

    public function setUnarchived($id) {
        $post = Post::where('id', $id)->first();
        $post->archived = 0;
        $post->save();

        return redirect("/");
    }
}