<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projectt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Type;
USE Illuminate\support\Str;



class ProjecttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projectt::all();
        
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $project = new Projectt;

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->url = $data['url'];
        $project->slug = Str::slug($project->title);

        $project->save();

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projectt  $projectt
     * @return \Illuminate\Http\Response
     */
    public function show(Projectt $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projectt  $projectt
     * @return \Illuminate\Http\Response
     */
    public function edit(Projectt $project)
    {
        return view("admin.projects.edit", compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projectt  $projectt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projectt $project)
    {
        $data = $request->all();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->url = $data['url'];
        $project->slug = Str::slug($project->title);
        $project->save();
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projectt  $projectt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projectt $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
