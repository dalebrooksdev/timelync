<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    protected $fillable = [
        'project_id',
        'description',
        'start_time',
        'end_time',
        'start_date',
        'end_date',
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function totalTimeSpent()
    {

    }
}
