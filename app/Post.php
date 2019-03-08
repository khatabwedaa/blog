<?php

namespace App;

use Image;
use Storage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug' , 'category_id' , 'body' , 'image'];

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

    public static function imageSave($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $location = public_path('images/' . $filename);

        Image::make($image)->save($location);

        return $filename;
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
