<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comments()
{
    return $this->hasMany(Comment::class);
}
public function author()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function questions()
{
    return $this->hasMany(Question::class);
}
}
