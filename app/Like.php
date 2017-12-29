<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 3:27 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id', 'user_id'];

    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
