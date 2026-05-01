<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // This allows Laravel to save these specific fields
    protected $fillable = [
        'user_id',
        'caption',
    ];

    // This links the Post to a User so you can show the author's name
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}