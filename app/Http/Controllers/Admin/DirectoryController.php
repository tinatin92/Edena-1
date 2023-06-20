<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class DirectoryController extends Controller
{
    public function index($type)
    {

        $directories = Directory::where('parent_id', null)->where('type_id', $type)->orderBy('order_by', 'asc')->with('children')->get();

        return view('admin.directories.list', compact('type', 'directories'));
    }

    public function create($type)
    {
        $par_directories = Directory::where('type_id', $type)->where('parent_id', null)->with('translations')->get();

        return view('admin.directories.add', compact('type', 'par_directories'));
    }

    public function store($type, Request $request)
    {
        $values = $request->all();
        $values['type_id'] = $type;

        if ($request->cover != '') {

            $originalName = $request->cover->getClientOriginalName();
            $newName = uniqid().'.'.$request->cover->getClientOriginalExtension();
            $request->cover->move(config('config.image_path'), $newName);
            $values['cover'] = $newName;

        }
        Directory::create($values);

        return Redirect::route('directory.list', [app()->getLocale(), $type]);
    }

    public function edit($directory)
    {
        $directory = Directory::where('id', $directory)->with(['translations', 'parent'])->first();

        $type = $directory->type_id;
        $par_directories = Directory::where('type_id', $type)->where('parent_id', null)->with('translations')->get();

        return view('admin.directories.edit', compact('type', 'directory', 'par_directories'));
    }

    public function update($directory, Request $request)
    {
        $values = $request->all();
        $directory = Directory::find($directory);
        if ($request->cover != '') {

            $originalName = $request->cover->getClientOriginalName();
            $newName = uniqid().'.'.$request->cover->getClientOriginalExtension();
            $request->cover->move(config('config.image_path'), $newName);
            $values['cover'] = $newName;

        }
        $directory->update($values);
        $directory->save();

        return Redirect::route('directory.list', [app()->getLocale(), $directory->type_id]);
    }

    public function destroy($directory)
    {

        $directory = Directory::find($directory);

        $type = $directory->type_id;

        $directory->delete();

        return Redirect::route('directory.list', [app()->getLocale(), $type]);
    }

    public function arrange(Request $request)
    {
        $array = $request->input('orderArr');
        Directory::rearrange($array);

        return ['error' => false];
    }

    public function deleteImage($id)
    {
        $directory = Directory::findOrFail($id);

        // Find translation for the specified locale

        // Delete image file for this translation
        $imagePath = config('config.image_path').'/'.$directory->cover;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Remove image from database for this translation
        $directory->cover = null;
        $directory->save();

        return response()->json(['success' => true]);

    }
}
