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

    

    protected function getShortcode($user, $titlename)
    {

        $title = explode('.', $titlename)[0];
        $ext = explode('.', $titlename)[1];
        
        $shortcode = Shortcode::where([
            ['title', $title],
            ['ext', $ext],
            ['user_id', $user]
        ])->first();

        if($shortcode === null) return response(404);


        return $shortcode;

    }

    public function cdn($user, $titlename)
    {

        $shortcode = $this->getShortcode($user, $titlename);
        if($shortcode->cdn == 0) {
            return response()->json(['error' => 'cdn off']);
        }
        if(!$shortcode->checkAccess()) {
            return response()->json(['error' => 'not-access']);
        }
        return response()->file($shortcode->getPhysicalAddress(), [
            'Content-Type' => 'text/javascript'
        ]);
    
    }

    public function view($user, $titlename) 
    {

        $shortcode = $this->getShortcode($user, $titlename);
        if(!$shortcode->checkAccess()) {
            return response()->json(['error' => 'not-access']);
        }
        return response($shortcode->gitcubeStamp())->header('Content-Type', 'text/json');

    }


    public function download($user, $titlename)
    {
        $shortcode = $this->getShortcode($user, $titlename);
        if(!$shortcode->checkAccess()) {
            return response()->json(['error' => 'not-access']);
        }
        return $shortcode->download();
    }

}
