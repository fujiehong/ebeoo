<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogReply extends Model
{
    protected $fillable = ['content'];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
