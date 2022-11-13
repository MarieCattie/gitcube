<?php

namespace App\Http\Controllers;

use App\Models\Shortcode;
use Illuminate\Filesystem\Filesystem;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Psr\Log\error;

class ShortcodeController extends Controller
{


    /**
     * 
     *  POST
     * 
     */


    public function cdn($filename) {

        $shortcode = Shortcode::where('filename', '=', $filename)->first();
        if($shortcode == null) return ['error' => 404];

        $url = url()->current();
        $url = str_replace('/cdn', '', $url);
        $head = "/*\n------------ CDN GitCube ------------\ncdn file: " . $shortcode->filename . "\nshortcode url: $url\n -------------------------------------\n*/\n\n\n";

        $result = $head . Storage::disk('shortcodes')->get('krek.js');

        return response($result)->header('Content-Type', 'text/javascript');

    }

    public function download($id) {

        $shortcode = Shortcode::find($id);

        if($shortcode == null) return ['error' => 404];


        // dd($shortcode);
        if($shortcode->checkUserAccess())
        {
            return $shortcode->download();
        }

    }

    public function store(Request $request) {
    
        $chose = $request->only(['short-name', 'short-status', 'show-mail']);

        $validator = Validator::make($chose, [
            'short-name' => 'required|min:3',
            'short-status' => 'required',
            'show-mail' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('shortcode.create')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $status = 1;

        if($validated['short-status'] == 'repo-friend')
        {
            $status = 2;
        }else if($validated['short-status'] == 'repo-me') {
            $status = 3;
        }

        $shortcode = new Shortcode();
        $shortcode->title = $validated['short-name'];
        $shortcode->user_id = Auth::id();
        $shortcode->filename = md5(rand(-10000, 10000));
        $shortcode->cdn = filter_var($validated['show-mail'], FILTER_VALIDATE_BOOL); 
        $shortcode->save();


        Storage::disk('shortcodes')->put($shortcode->filename . ".txt", "// $shortcode->title.txt");
        return redirect()->route('shortcode.index', ['id' => $shortcode->id]);


    }



    /**
     * 
     * GET
     * 
     */

    public function index($filename) {

        $shortcode = Shortcode::where('filename', '=', $filename)->first();
        if($shortcode == null) return view('404');

        
        if(!$shortcode->checkAccess() && $shortcode->user != Auth::user()) {
            return view('block', [
                'error' => 'Шорткод не доступен'
            ]);
        }

        $content = Storage::disk('shortcodes')->get($shortcode->filename());
        


        return view('shortcode.shortcode', [
            'shortcode' => $shortcode,
            'content' => $content
        ]);
    }

    

    

    public function faq() {
        return view('shortcode.shortcode_faq');
    }

    

    public function all($id = 0) {
        if($id == 0){
            $reps = Shortcode::where('user_id', Auth::id())->get();
            $user = Auth::user();
        }else{
            $reps = Shortcode::where('user_id', $id)->get();
            $user = User::find($id);
        }

        if($user === null) return view('404');

        return view('shortcode.shortcode_all', [
            'shortcodes' => $reps,
            'user' => $user
        ]);
    }

    public function create() {
        return view('shortcode.shortcode_create');
    }

    public function edit() {
        return view('shortcode.shortcode_edit');
    }
}
