<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'repository_id'
    ];

    public function repository() {
        return $this->belongsTo(Repository::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

