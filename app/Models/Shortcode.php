<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CodeComment;

use Illuminate\Support\Facades\Storage;



class Shortcode extends Model
{
    use HasFactory;


    public function author() {
        return $this->belongsTo(User::class);
    }

    public function filename() 
    {
        return $this->filename . "." . $this->ext;
    }

    public function titlename()
    {
        return $this->title . "." . $this->ext;
    }

    public function getPhysicalAddress($host = false) {


        $filename = $this->filename();
        
        if(!$host) return 'storage/shortcodes/' . $filename;
        if($host) return Storage::disk('shortcodes')->url($filename);
    }

    
    public function download()
    {
        return response()->download($this->getPhysicalAddress(), $this->titlename());
    }

    public function gitcubeStamp()
    {

        $header = CodeComment::make(
            trim("CDN GitCube | "  . $this->titlename() . " | " . date('Y')),
            $this->ext
        );

        return $header . "\n\n" . Storage::disk('shortcodes')->get($this->filename());


    }
}
