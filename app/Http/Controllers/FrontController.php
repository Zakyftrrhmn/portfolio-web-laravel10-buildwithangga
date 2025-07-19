<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->take(6)->get();
        return view('front.index', compact('projects'));
    }

    public function details(Project $project)
    {

        return view('front.detail', compact('project'));
    }


    public function book()
    {
        return view('front.book');
    }

    public function services()
    {
        return view('front.services');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'budget' => 'required|integer',
            'category' => 'required|string',
            'brief' => 'required|string|max:645535'
        ]);

        DB::beginTransaction();

        try {

            $newProject = ProjectOrder::create($validated);
            DB::commit();

            return redirect()->route('front.index')->with('succes', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    }
}
