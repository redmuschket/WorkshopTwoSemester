<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Отношение "один ко многим" с ProjectDetail
    public function details()
    {
        return $this->hasMany(ProjectDetail::class);
    }
}
