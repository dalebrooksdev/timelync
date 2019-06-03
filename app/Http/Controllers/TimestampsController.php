<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Timestamp;

use Auth;

class TimestampsController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $timestamp = new Timestamp;

        $fieldsToValidate = array(
            'project_id' => 'required',
        );

        if ($request->task_type !== 'tracked' && $request->task_type !== 'tracked_end'){
            $fieldsToValidate['start_date'] = 'required';
            $fieldsToValidate['start_time'] = 'required';
            $fieldsToValidate['end_date'] = 'required';
            $fieldsToValidate['end_time'] = 'required';
            if ($request->task_type !== 'tracked_end'){
                $fieldsToValidate['description'] = 'required';
            }
        }

        $request->validate($fieldsToValidate);

        $timestamp->project_id = $request->project_id;
        $timestamp->description = $request->description;
        

        if ($request->task_type === 'tracked'){
            $timestamp->start_time = date('H:i:s');
            $timestamp->start_date = date('Y-m-d');
        } elseif ($request->task_type === 'tracked_end') {
            $timestamp = Timestamp::find($request->timestamp_id);
            $timestamp->end_time = date('H:i:s');
            $timestamp->end_date = date('Y-m-d');
        }else {
            $timestamp->start_time = $request->start_time;
            $timestamp->start_date = $request->start_date;
            $timestamp->end_time = $request->end_time;
            $timestamp->end_date = $request->end_date;
        }
        
        $timestamp->save();
        

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        $timestamp = Timestamp::find($request->timestamp_to_delete);
        $timestamp->delete();
        return redirect()->route('dashboard');
    }
}
