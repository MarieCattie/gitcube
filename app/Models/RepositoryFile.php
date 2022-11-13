<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoryFile extends Model
{
    use HasFactory;

    public $fillable = [
        'title'
    ];

    public function folder() {
        return $this->belongsTo(RepositoryFolder::class);
    }

    public function repository() {
        return $this->belongsTo(Repository::class);
    }

    public function model() {
        return "rep-file";
    }

}
