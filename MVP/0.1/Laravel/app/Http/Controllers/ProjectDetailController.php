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

        // Создаем деталь проекта
        $detail = $project->details()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'detail' => $detail,
        ]);
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

    public function updateDetails(Request $request, Project $project)
    {
        $request->validate([
            'details' => 'required|array',
            'details.*.id' => 'nullable|integer', // ID для существующих деталей
            'details.*.title' => 'required|string|max:255',
            'details.*.content' => 'nullable|string',
        ]);

        foreach ($request->details as $detailData) {
            if (isset($detailData['id'])) {
                // Обновляем существующую деталь
                $detail = ProjectDetail::find($detailData['id']);
                if ($detail) {
                    $detail->update([
                        'title' => $detailData['title'],
                        'content' => $detailData['content'],
                    ]);
                }
            } else {
                // Создаем новую деталь
                $project->details()->create([
                    'title' => $detailData['title'],
                    'content' => $detailData['content'],
                ]);
            }
        }

        return response()->json(['message' => 'Детали успешно обновлены']);
    }
}
