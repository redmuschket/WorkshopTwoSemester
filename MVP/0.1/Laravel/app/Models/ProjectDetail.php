<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;

    // Указываем, какие поля можно массово заполнять
    protected $fillable = [
        'title',
        'content', // Добавляем это поле
        'project_id', // Если нужно, добавьте и это поле
    ];

    // Отношение "многие к одному" с Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
