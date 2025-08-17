<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Formation;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::with('formation')->get();
        return view('Dashboard.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations = Formation::all();
        return view('Dashboard.modules.create', compact('formations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|max:10240',
            'video_path' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // 50MB
            'duration' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
        ]);

        $module = new Module($validatedData);

        if ($request->hasFile('file_path')) {
            $uploadedFile = Cloudinary::upload($request->file('file_path')->getRealPath());
            $module->file_path = $uploadedFile->getSecurePath();
        }

        if ($request->hasFile('video_path')) {
            $uploadedVideo = Cloudinary::uploadVideo($request->file('video_path')->getRealPath());
            $module->video_path = $uploadedVideo->getSecurePath();
        }

        $module->save();

        return redirect()->route('Dashboard.modules.index')->with('success', 'Module ajouté avec succès à la formation!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        $formations = Formation::orderBy('title')->get();
        return view('Dashboard.modules.edit', compact('module', 'formations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $validatedData = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|max:10240',
            'clear_file' => 'nullable|boolean',
            'video_path' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'clear_video' => 'nullable|boolean',
            'duration' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
        ]);

        // Helper function to extract the public ID from the Cloudinary URL
        $getPublicId = function ($url) {
            $pathParts = pathinfo(parse_url($url, PHP_URL_PATH));
            $publicId = $pathParts['filename'];
            $folder = basename(dirname($pathParts['dirname']));
            return $folder . '/' . $publicId;
        };

        // Handle file upload/update
        if ($request->hasFile('file_path')) {
            // Delete existing file from Cloudinary if it exists
            if ($module->file_path) {
                Cloudinary::destroy($getPublicId($module->file_path));
            }
            // Upload the new file
            $uploadedFile = Cloudinary::upload($request->file('file_path')->getRealPath());
            $validatedData['file_path'] = $uploadedFile->getSecurePath();
        } elseif (!empty($validatedData['clear_file'])) {
            // Clear the file
            if ($module->file_path) {
                Cloudinary::destroy($getPublicId($module->file_path));
            }
            $validatedData['file_path'] = null;
        } else {
            $validatedData['file_path'] = $module->file_path;
        }

        // Handle video upload/update
        if ($request->hasFile('video_path')) {
            // Delete existing video from Cloudinary if it exists
            if ($module->video_path) {
                Cloudinary::destroy($getPublicId($module->video_path), ["resource_type" => "video"]);
            }
            // Upload the new video
            $uploadedVideo = Cloudinary::uploadVideo($request->file('video_path')->getRealPath());
            $validatedData['video_path'] = $uploadedVideo->getSecurePath();
        } elseif (!empty($validatedData['clear_video'])) {
            // Clear the video
            if ($module->video_path) {
                Cloudinary::destroy($getPublicId($module->video_path), ["resource_type" => "video"]);
            }
            $validatedData['video_path'] = null;
        } else {
            $validatedData['video_path'] = $module->video_path;
        }

        // Remove non-database keys
        unset($validatedData['clear_file'], $validatedData['clear_video']);

        $module->update($validatedData);

        return redirect()->route('Dashboard.modules.index')->with('success', 'Module mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        // Helper function to extract the public ID from the Cloudinary URL
        $getPublicId = function ($url) {
            $pathParts = pathinfo(parse_url($url, PHP_URL_PATH));
            $publicId = $pathParts['filename'];
            $folder = basename(dirname($pathParts['dirname']));
            return $folder . '/' . $publicId;
        };

        if ($module->file_path) {
            Cloudinary::destroy($getPublicId($module->file_path));
        }

        if ($module->video_path) {
            Cloudinary::destroy($getPublicId($module->video_path), ["resource_type" => "video"]);
        }

        $module->delete();
        return back()->with('success', 'Module supprimé avec succès.');
    }
}