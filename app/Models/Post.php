<?php

namespace App\Models;

use App\Mail\PostCreated;
use App\Mail\PostStored;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['name', 'description'];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    protected static function booted()
    {
        static::created(function ($post){
            Mail::to('stp22800@gmail.com')->send(new PostStored($post));
        });
    }
}
