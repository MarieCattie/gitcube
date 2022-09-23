<?php

namespace App\Http\Controllers\cdn\v1x0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// models
use App\Models\Shortcode;

// facades
use Illuminate\Support\Facades\Storage;



class MainController extends Controller
{
    public function get($user, $title) 
    {
        


        $shortcode = Shortcode::where([

            ['user_id', $user], 
            ['title', $title]
        
        ])->first();

        if($shortcode === null) return response(404);



        return response()->file(
            $shortcode->getPhysicalAddress()
        );

    }
}
