<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'content'];

    // Отношение "многие к одному" с Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
