<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lang',
        'src',
        'user_id'
    ];

    public function mainFolder() {
        return $this->hasOne(RepositoryFolder::class)->where('main', '=', 1);
    }

    public function json() {
        return $this->mainFolder->json();
    }

    public function tree() {
        return $this->mainFolder->tree();
    }

    public function path($src) {

        $slashEnd = false;
        if($src[strlen($src) - 1] == "/"){
            $src = substr_replace($src, '', strlen($src) - 1, 1);
            $slashEnd = true;
        }
        $url = explode('/', $src);

        $result = $this->mainFolder;

        foreach ($url as $element) {

            if(stristr($element, '.') !== false) {
                if($result !== null && !$slashEnd){
                    $result = $result->file($element);
                }else{
                    return null;
                }
            }else{
                $result = $result->down($element);
            }

        }

        return $result;

    }

    public function filesOnTop() {
        return $this->mainFolder->allFiles();
    }

    public function foldersOnTop() {
        return $this->mainFolder->allFolders();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isExist($path) {
        if($this->path($path) === null) return false;
        return true;
    }

    public function type($path) {
        $element = $this->path($path);

        if($element !== null) {
            return $element->model();
        }
        return null;
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }


}
