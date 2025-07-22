<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Formation;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index() {
        $modules = Module::with('formation')->get();
        return view('modules.index', compact('modules'));
    }

    public function create() {
        $formations = Formation::all();
        return view('Dashboard.modules.create', compact('formations'));
    }

    public function store(Request $request) {
        $request->validate([
            'titre' => 'required',
            'formation_id' => 'required'
        ]);
        Module::create($request->all());
        return redirect()->route('modules.index');
    }

    public function edit(Module $module) {
        $formations = Formation::all();
        return view('modules.edit', compact('module', 'formations'));
    }

    public function update(Request $request, Module $module) {
        $request->validate([
            'titre' => 'required',
            'formation_id' => 'required'
        ]);
        $module->update($request->all());
        return redirect()->route('modules.index');
    }

    public function destroy(Module $module) {
        $module->delete();
        return redirect()->route('modules.index');
    }
}