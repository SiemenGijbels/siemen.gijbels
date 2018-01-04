<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 4:51 PM
 */

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Like;
use App\Tag;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
    }

    // HOMEPAGE

    public function getIndex()
    {
        $posts = Post::where(function ($query) {
            $query->whereNull('archived')
                ->orWhere('archived', 0);
        })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('content.index', ['posts' => $posts]);
    }

    //  HOMEPAGE SORTED BY TAG

    public function getIndexByTag($name)
    {
        $tag = Tag::where('name', $name)->first();

        $tagId = Tag::where('id', $tag->id)->first();

        $posts = Post::where(function ($query) {
            $query->whereNull('archived')
                ->orWhere('archived', 0);
        })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        for($i = 0; $i < count($posts); $i++){
            if($posts[$i]->tags->contains($tagId)){
                $blogPosts[] = $posts[$i];
            }
        }
        return view('content.sortByTag', ['blogPosts' => $blogPosts, 'tag' => $tag]);
    }


    // POST PAGE

    public function getPost($id)
    {
        $post = Post::where('id', $id)
            ->first();

        $comments = Comment::where('post_id', $post->id)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $likes = Like::where('post_id', $post->id)
            ->get();

        if (Auth::user()) {
            $userLike = Like::where('user_id', Auth::user()->id)
                ->where('post_id', $post->id)
                ->first();

            if ($likes->isEmpty() || count($userLike) == 0 || count($userLike) == NULL) {
                $userLikeCount = 0;
            } else {
                $userLikeCount = 1;
            }
        }

        $countLikes = $likes->count();

        if (Auth::user()) {
            return view('content.post', ['post' => $post, 'comments' => $comments, 'userLike' => $userLike, 'userLikeCount' => $userLikeCount, 'countLikes' => $countLikes]);
        } else {
            return view('content.post', ['post' => $post, 'comments' => $comments, 'countLikes' => $countLikes]);
        }
    }

    public function postLikePost(Request $request)
    {
        $like = new Like([
            'post_id' => $request->input('post_id'),
            'user_id' => $request->input('user_id')
        ]);
        $like->save();

        return redirect()->route('content.post', ['id' => $request->input('post_id')]);
    }

    public function getUnlikePost($postId, $likeId)
    {
        $post = Post::find($postId);
        $like = Like::find($likeId);
        $like->delete();

        return redirect()->route('content.post', ['id' => $post->id]);
    }

    // EDIT POST

    public function getEdit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('content.edit', ['post' => $post, 'postId' => $id, 'tags' => $tags]);
    }

    public function postUpdate(Request $request)
    {
        $posts = Post::where(function ($query) {
            $query->whereNull('archived')
                ->orWhere('archived', 0);
        })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3'
        ]);
        $post = Post::find($request->get('post_id'));
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/' . $filename));
            $post->image = $filename;
        }
        $post->save();

        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('content.index', ['posts' => $posts]);
    }

    // USER SOFT DELETE POST

    public function getSoftDelete($id)
    {
        $posts = Post::where(function ($query) {
            $query->whereNull('archived')
                ->orWhere('archived', 0);
        })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $post = Post::where('id', $id)->first();
        $post->archived = 2;
        $post->save();

        return redirect()->route('content.index', ['posts' => $posts])->with('info', 'Post deleted!');
    }

    // ARCHIVE

    public function getArchiveIndex()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->where('archived', 1)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('content.archive', ['posts' => $posts]);
    }

    public function setArchived($id)
    {
        $post = Post::where('id', $id)->first();
        $post->archived = 1;
        $post->save();

        return redirect("archive");
    }

    public function setUnarchived($id)
    {
        $post = Post::where('id', $id)->first();
        $post->archived = 0;
        $post->save();

        return redirect("/");
    }

    // PROFILE

    public function getProfileIndex()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->where(function ($query) {
                $query->whereNull('archived')
                    ->orWhere('archived', 0)
                    ->orWhere('archived', 1);
            })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('profile.index', ['posts' => $posts]);
    }

    //https://devdojo.com/episode/laravel-user-image
    public function postAvatarUpdate(Request $request)
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
            $user->save();
        }

        return view('profile.index', ['posts' => $posts]);

    }

    // CREATE POST

    public function getCreate()
    {
        Auth::user();
        $tags = Tag::all();
        return view('content.create', ['tags' => $tags, 'user_id', Auth::user()]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
            'image' => $request->file('image')
        ]);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/uploads/images/' . $filename));
        $post->image = $filename;
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('content.index')->with('info', 'Item created, Title is: ' . $request->input('title'));
    }


    // ADMIN
    // DASHBOARD

    public function getAdminIndex()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $comments = Comment::all();
        $likes = Like::all();
        $users = User::all();
        $archivedPosts = Post::where('archived', 1)->get();
        $softDeletedPosts = Post::where('archived', 2)->get();

        return view('admin.index', ['posts' => $posts, 'archivedPosts' => $archivedPosts, 'softDeletedPosts' => $softDeletedPosts, 'comments' => $comments, 'likes' => $likes, 'users' => $users]);
    }

    // EDIT

    public function getAdminEdit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.edit', ['post' => $post, 'postId' => $id, 'tags' => $tags]);
    }

    // HARD DELETE

    public function getAdminDelete($id)
    {
        $post = Post::find($id);
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted!');
    }

    // GET CREATE

    public function getAdminCreate()
    {
        Auth::user();
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags, 'user_id', Auth::user()]);
    }

    // UNDO SOFT DELETE

    public function getPutBack($id)
    {
        $posts = Post::where(function ($query) {
            $query->whereNull('archived')
                ->orWhere('archived', 0);
        })
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $post = Post::where('id', $id)->first();
        $post->archived = 0;
        $post->save();

        return redirect()->route('content.index', ['posts' => $posts])->with('info', 'Post deleted!');
    }

    // POST CREATE

    public function postAdminCreate(Request $request)
    {
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

    // POST UPDATE

    public function postAdminUpdate(Request $request)
    {
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