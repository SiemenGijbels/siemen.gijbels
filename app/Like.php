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
    public function item() {

        return $this->belongsTo('App\Post', 'post_id');
    }
}
