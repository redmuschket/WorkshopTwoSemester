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

        // Создаем проект
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'project' => $project,
        ]);
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
        $project->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Перенаправляем на страницу просмотра проекта
        return response()->json([
            'message' => 'Проект успешно обновлен',
            'redirect_url' => route('projects.show', $project),
        ])->header('X-Content-Type-Options', 'nosniff');
    }
}
