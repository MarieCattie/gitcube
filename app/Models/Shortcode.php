<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Support\Facades\Storage;



class Shortcode extends Model
{
    use HasFactory;

    public $extensions = [];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function getPhysicalAddress($host = false) {


        $filename = $this->filename . "." . $this->ext;
        
        if(!$host) return 'storage/shortcodes/' . $filename;
        if($host) return Storage::disk('shortcodes')->url($filename);
    }
}
