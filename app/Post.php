<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function category()
    {

        return Category::whereIn('id', explode(",", $this->categories))->get();
    }

    public function cat()
    {
        return $this->belongsToMany('App\Category','post_category')->withTimestamps()->withPivot(['id']);      
    }

}
