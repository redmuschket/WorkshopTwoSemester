<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $detail = $project->details()->create($request->only('title', 'content'));

        return response()->json(['detail' => $detail,]);
    }

    public function edit(Request $request, Project $project)
    {
    }

    public function show(Project $project)
    {
    }

    public function create()
    {
    }

    public function update(Request $request, Project $project)
    {
    }
}
