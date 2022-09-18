<?php

namespace App\Http\Controllers;

use App\Models\Shortcode;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use function Psr\Log\error;

class ShortcodeController extends Controller
{

    public function index($filename) {

        $shortcode = Shortcode::where('filename', '=', $filename)->first();
        if($shortcode == null) return view('404');


        $content = Storage::disk('shortcodes')->get('krek.js');

        return view('shortcode', [
            'shortcode' => $shortcode,
            'content' => $content
        ]);
    }

    public function cdn($filename) {

        $shortcode = Shortcode::where('filename', '=', $filename)->first();
        if($shortcode == null) return ['error' => 404];

        $url = url()->current();
        $url = str_replace('/cdn', '', $url);
        $head = "/*\n------------ CDN GitCube ------------\ncdn file: " . $shortcode->filename . "\nshortcode url: $url\n -------------------------------------\n*/\n\n\n";

        $result = $head . Storage::disk('shortcodes')->get('krek.js');

        return response($result)->header('Content-Type', 'text/javascript');

    }

    public function download($filename) {

        $shortcode = Shortcode::where('filename', '=', $filename)->first();
        if($shortcode == null) return ['error' => 404];

        return response()->download("storage/shortcodes/$shortcode->filename", $shortcode->filename, ['Content-Type' => 'text/javascript']);

    }

    public function faq() {
        return view('shortcode_faq');
    }
}
