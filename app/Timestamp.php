<?php

namespace App;

use App\Project;
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
            return $inProgressTask = null;
        }
    }

    public function getDuration($timestamp_id)
    {
        $timestamp = Timestamp::find($timestamp_id);
        $startDateTime = new DateTime($timestamp->start_date . " " . $timestamp->start_time);
        $endDateTime = new DateTime($timestamp->end_date . " " . $timestamp->end_time);
        $interval = $startDateTime->diff($endDateTime);
        return $interval->format('%a day(s) %h hour(s) %i minute(s) %s second(s)');
    }

    public function getTotalTimeSpent($project_id)
    {
        $project = Project::find($project_id);

        
            foreach($project->timestamp as $timestamp){
                $startDateTime = new DateTime($timestamp->start_date . " " . $timestamp->start_time);
                $endDateTime = new DateTime($timestamp->end_date . " " . $timestamp->end_time);
                $intervals[] = $startDateTime->diff($endDateTime);
            }
        $startDateTime = new DateTime('00:00');
        $endDateTime = clone $startDateTime;
        foreach ($intervals as $interval){
            $startDateTime->add($interval);
        }
        $intervalTotal = $endDateTime->diff($startDateTime);
        return $totalTimeSpent = $intervalTotal->format('%a day(s) %h hour(s) %i minute(s) %s second(s)');
    }

    public function getTotalCharges($project_id)
    {
        $project = Project::find($project_id);
        if ($project->rate_type === 2){
            return $project->rate_amount;
        } else {
            foreach($project->timestamp as $timestamp){
                $startTimestamp = new DateTime($timestamp->start_date . " " . $timestamp->start_time);
                $endTimestamp = new DateTime($timestamp->end_date . " " . $timestamp->end_time);
                $intervals[] = $endTimestamp->getTimestamp()-$startTimestamp->getTimestamp();
            }
            $totalSeconds = array_sum($intervals);

            return "$" .round(($project->rate_amount / 3600) * $totalSeconds, 2);
        }
    }
}