<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeComment extends Model
{
    use HasFactory;

    public static $data = [

        'txt' => '//',
        'php' => '//',
        'js' => '//',
        'java' => '//',
        'py' => '#',
    
    ];

    public static function make($comment, $ext) 
    {
        if(array_key_exists($ext, self::$data))
        {
            return self::$data[$ext] . " " . $comment;
        }
        return '';
    }

}
