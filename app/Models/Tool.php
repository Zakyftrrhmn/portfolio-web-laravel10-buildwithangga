<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{

    use softDeletes;

    protected $guarded = ['id'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tools', 'tool_id', 'project_id')
            ->wherePivotNull('deleted_at')
            ->withPivot('id');;
    }
}
