<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 3:27 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function posts() {
        return $this->belongsToMany('App\Post', "post_tags", 'tag_id', 'post_id')->withTimestamps();
    }
}