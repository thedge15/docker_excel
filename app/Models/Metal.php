<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metal extends Model
{
    protected $guarded = false;
    protected $table = 'metals';

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
