<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 3:18 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'mainimage_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function likes() {
        return $this->hasMany('App\Like', 'post_id');
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value) {
        return strtoupper($value);
    }

}