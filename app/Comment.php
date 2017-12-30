<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/28/17
 * Time: 7:49 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['title', 'content', 'post_id', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }

}