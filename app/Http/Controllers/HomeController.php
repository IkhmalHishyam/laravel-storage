<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function uploadFile(FileRequest $request)
    {
        $validated = $request -> validated();

        // $path = Storage::putFile('files',$validated['file_test']);

        $file = $validated['file_test'];
        $name = $file -> getClientOriginalName();
        $extension = $file -> getClientOriginalExtension();
        $newName = $name . '.' . $extension;

        $path = Storage::putFileAs('public',$validated['file_test'],$newName);

        dd($path);
    }

    public function list()
    {
        // $files = Storage::AllFiles('');

        //Get all folder only
        // $directories = Storage::allDirectories('');

        //Create folder/dir
        // $directory = Storage::makeDirectory('TestFolder');

        //Delete folder/dir
        $directory = Storage::deleteDirectory('TestFolder');

        dd($directory);
    }

    public function show()
    {
        //Run php artisan storage:link
        $path = Storage::url('public/IMG-20180930-WA0004.jpg.jpg');

        return '<img src="' .$path. '" alt="">';
    }
}
