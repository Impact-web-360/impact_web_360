<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Formation;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index() {
        $modules = Module::with('formation')->get();
        return view('Dashboard.modules.index', compact('modules'));
    }

    public function create() {
        $formations = Formation::all();
        return view('Dashboard.modules.create', compact('formations'));
    }

    public function store(Request $request, Formation $formation)
    {
        $validatedData = $request->validate([
            'formation_id'=>'required|exists:formations,id',
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|max:10240',
            'video_path' => 'required|file|mimes:mp4,mov,ogg,qt|max:51200', // 50MB
            'duration' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
        ]);

        $module = new Module($validatedData);

        if ($request->hasFile('file_path')) {
            $module->file_path = $request->file('file_path')->store('modules/files', 'public');
        }
        if ($request->hasFile('video_path')) {
            $module->video_path = $request->file('video_path')->store('modules/videos', 'public');
        }

        $module->save();

        return redirect()->route('Dashboard.modules.index')->with('success', 'Module ajouté avec succès à la formation!');
    }


    public function edit(Module $module) {
        $formations = Formation::orderBy('title')->get();
        return view('Dashboard.modules.edit', compact('module', 'formations'));
    }

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

        // Gestion du fichier
        if ($request->hasFile('file_path')) {
            if ($module->file_path && \Storage::disk('public')->exists($module->file_path)) {
                \Storage::disk('public')->delete($module->file_path);
            }
            $validatedData['file_path'] = $request->file('file_path')->store('modules/files', 'public');
        } elseif (!empty($validatedData['clear_file'])) {
            if ($module->file_path && \Storage::disk('public')->exists($module->file_path)) {
                \Storage::disk('public')->delete($module->file_path);
            }
            $validatedData['file_path'] = null;
        } else {
            $validatedData['file_path'] = $module->file_path;
        }

        // Gestion de la vidéo
        if ($request->hasFile('video_path')) {
            if ($module->video_path && \Storage::disk('public')->exists($module->video_path)) {
                \Storage::disk('public')->delete($module->video_path);
            }
            $validatedData['video_path'] = $request->file('video_path')->store('modules/videos', 'public');
        } elseif (!empty($validatedData['clear_video'])) {
            if ($module->video_path && \Storage::disk('public')->exists($module->video_path)) {
                \Storage::disk('public')->delete($module->video_path);
            }
            $validatedData['video_path'] = null;
        } else {
            $validatedData['video_path'] = $module->video_path;
        }

        // Retirer les clés qui ne correspondent pas à des colonnes
        unset($validatedData['clear_file'], $validatedData['clear_video']);

        $module->update($validatedData);

        return redirect()->route('Dashboard.modules.index')->with('success', 'Module mis à jour avec succès!');
    }

    public function destroy(Module $module)
    {
        if ($module->file_path && Storage::disk('public')->exists($module->file_path)) {
            Storage::disk('public')->delete($module->file_path);
        }
        if ($module->video_path && Storage::disk('public')->exists($module->video_path)) {
            Storage::disk('public')->delete($module->video_path);
        }

        $module->delete();
        return back()->with('success', 'Module supprimé avec succès.');
    }
};



