<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoryFolder extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
    ];

    public function repository() {
        return $this->belongsTo(Repository::class);
    }

    public function allFolders() {
        return $this->hasMany(RepositoryFolder::class, 'folder_id');
    }

    public function allFiles() {
        return $this->hasMany(RepositoryFile::class, 'folder_id');
    }

    public function json() {
        return json_encode($this->tree());
    }

    public function tree() {
        $arr = [];

        if(count($this->allFolders()->get()) == 0) {
            if(count($this->allFiles()->get()) != 0) {
                foreach ($this->allFiles()->get() as $file) {
                    $arr[] = $file->title;
                }
            }else{
                $arr[] = null;
            }
        }else{
            foreach ($this->allFolders()->get() as $folder) {
                $arr[$folder->title] = $folder->tree();
            }
            if(count($this->allFiles()->get()) != 0) {
                foreach ($this->allFiles()->get() as $file) {
                    $arr[] = $file->title;
                }
            }
        }

        return $arr;
    }

    public function top() {
        if($this->main) return false;
        return RepositoryFolder::find($this->folder_id);
    }

    public function down($folder) {

        return RepositoryFolder::where([
            ['title', '=', $folder],
            ['folder_id', '=', $this->id]
        ])->first();

    }

    public function getPath() {
        if(!$this->main) {
            $result = $this->title;
        }else{
            $result = "";
        }

        $folder = $this->top();
        while($folder !== false) {
            if(!$folder->main) $result = $folder->title . "/" . $result;
            $folder = $folder->top();
        }

        return $result;
    }

    public function file($filename) {
        $file = RepositoryFile::where([
            ['folder_id', '=', $this->id],
            ['title', '=', $filename]
        ]);

        if($file !== null) return $file->first();
        return $file;
    }

    public function getPhysicalAddress() {
        //
    }

    public function model() {
        return "rep-folder";
    }


}
