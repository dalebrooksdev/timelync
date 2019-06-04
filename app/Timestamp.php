<?php

namespace App;
use DateTime;
use Illuminate\Support\Facades\DB;
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

    public function getInProgress($project_id)
    {
        $inProgressTask = DB::table('timestamps')
                    ->whereNull('end_time')
                    ->where('project_id', $project_id)
                    ->get();

        if(!$inProgressTask->isEmpty()){
            return $inProgressTask;
        } else {
            return null;
        }
    }

    public function getTotalTimeSpent($project_id)
    {
        $timestamps = DB::table('timestamps')
                    ->whereNotNull('end_time')
                    ->where('project_id', $project_id)
                    ->get();
        foreach ($timestamps as $timestamp){
            $startDateTime = new DateTime($timestamp->start_date . " " . $timestamp->start_time);
            $endDateTime = new DateTime($timestamp->end_date . " " . $timestamp->end_time);
            $intervals[] = $startDateTime->diff($endDateTime);
        }
        $e = new DateTime('00:00');
        $f = clone $e;
        foreach ($intervals as $interval){
            $e->add($interval);
        }
        $intervalTotal = $f->diff($e);
        return $totalTimeSpent = $intervalTotal->format('%a day(s) %h hour(s) %i minute(s) %s second(s)');
    }
}
