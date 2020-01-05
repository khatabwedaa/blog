<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function imageUpdate($oldImage, $image)
    {
        $newImage = Post::imageSave($image);

        $oldFilename = $oldImage;

        Storage::delete($oldFilename);

        return $newImage;
    }

    public static function safeDelete($post)
    {
        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();
    }
}
