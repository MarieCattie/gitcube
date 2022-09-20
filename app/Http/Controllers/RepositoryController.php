<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Models\RepositoryFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function Psr\Log\error;

class RepositoryController extends Controller
{

    public function index($id) {

        $repository = Repository::find($id);

        if($repository->user_id != Auth::id()) {
            $repository->watches++;
            $repository->save();
        }

        $files = $repository->filesOnTop;
        $folders = $repository->foldersOnTop;
        $comments = $repository->comments()->latest()->get();

        return view('repository.repository', [
            'rep' => $repository,
            'author' => User::find($repository->user_id),
            'files' => $files,
            'folders' => $folders,
            'comments' => $comments
        ]);
    }

    public function search($id, $path) {
        $rep = Repository::find($id);
        if($rep !== null && $rep->isExist($path)) {

            if($rep->type($path) == 'rep-file') {

                $file = $rep->path($path);
                return view('file', [
                    'file' => $file
                ]);

            }else{

                $folder = $rep->path($path);
                $rep = $folder->repository;
                $files = $folder->allFiles;
                $folders = $folder->allFolders;

                return view('repository.folder', [
                    'rep' => $rep,
                    'folder' => $folder,
                    'author' => User::find($rep->user_id),
                    'files' => $files,
                    'folders' => $folders,
                    'path' => $path
                ]);
            }

        }else{
            return view('404');
        }


    }

    public function create() {
       return view('repository.repository_create');
    }

    public function store(Request $request) {


        $chose = $request->only(['repo-name', 'repo-status', 'repo-access']);

        $validator = Validator::make($chose, [
            'repo-name' => 'required|min:3',
            'repo-status' => 'required',
            'repo-access' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('repository.create')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        dd($validated);

        // $repository = new Repository();
        // $mainFolder = new RepositoryFolder();

    }
}
