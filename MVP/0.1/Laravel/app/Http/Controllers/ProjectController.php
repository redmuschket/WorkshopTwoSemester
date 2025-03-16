<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Отображение списка проектов
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Сохранение нового проекта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::create($request->only('name', 'description'));

        return response()->json(['project' => $project]);
    }

    // Отображение окна редактирования проекта
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Отображение окна просмотра проекта
    public function show(Project $project)
    {
        $project->load('details');
        return view('projects.show', compact('project'));
    }

    // Отображение окна просмотра проекта
    public function create()
    {
        return view('projects.create');
    }

    // Обновление проекта
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($request->only('name', 'description'));

        return redirect()->route('post.show', $project->id)->with('success', 'Проект успешно обновлен!');
    }

    // Добавление деталей проекта
    public function addDetail(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $project->details()->create($request->only('title', 'content'));

        return redirect()->route('projects.edit', $project)->with('success', 'Деталь успешно добавлена!');
    }
}
