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
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {

        $posts = Post::orderBy('created_at', 'desc')->paginate(30);
        return view('content.index', ['posts' => $posts]);
    }

    public function getPost($id) {

        $post = Post::where('id', $id)->with('likes')->first();
        return view('content.post', ['post' => $post]);
    }

    public function getLikePost($id) {

        $post = Post::where('id', $id)->first();
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
    }

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
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags]);
    }

    public function postAdminCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
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
}