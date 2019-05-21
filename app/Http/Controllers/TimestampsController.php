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

        $timestamp->project_id = $request->project_id;
        $timestamp->description = $request->description;
        $timestamp->start_time = $request->start_time;
        $timestamp->end_time = $request->end_time;
        $timestamp->start_date = $request->start_date;
        $timestamp->end_date = $request->end_date;

        $timestamp->save();

        return redirect()->route('dashboard');
    }
}
