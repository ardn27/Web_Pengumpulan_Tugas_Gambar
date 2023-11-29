<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyeks';
    protected $fillie;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'like_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
