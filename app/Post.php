<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'url'];

    /** 
     *   Defining Relationship Post - User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}