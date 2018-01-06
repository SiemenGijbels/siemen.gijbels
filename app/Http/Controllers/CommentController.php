<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/28/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use ValidateRequests;

class CommentController
{
    public function postCommentPost(Request $request) {

        $comment = new Comment([
            'post_id' => $request->input('post_id'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);
        $comment->save();

        return redirect()->route('content.post', ['id' => $request->input('post_id')]);
    }

    public function getDeleteComment($postId, $commentId) {

        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $comment->delete();
        return redirect()->route('content.post', ['id' => $postId]);
    }
}