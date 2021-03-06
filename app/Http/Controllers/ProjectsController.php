<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $userProjects = $user->projects()->get();
        $username = $user->username;
        return view('dashboard', compact('userProjects'));
    }

    public function show($projectid)
    {
        $user = User::find(Auth::user()->id);
        $userProject = $user->projects()->find($projectid);
        $username = $user->username;

        if ($userProject) {
            if ($userProject->timestamp->first()) {
                foreach ($userProject->timestamp as $timestamp) {
                    $inProgressTask = $timestamp->getInProgress($userProject->id);
                    $totalTimeSpent = $timestamp->getTotalTimeSpent($userProject->id);
                }
            } else {
                $inProgressTask = null;
                $totalTimeSpent = null;
            }
            return view('project', compact('userProject', 'inProgressTask', 'totalTimeSpent'));
        } else {
            abort(403);
        }
    }

    public function create()
    {
        return view('createProject');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $project = new Project;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rate_type' => 'required',
            'rate_amount' => 'required',
        ]);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = $user->id;
        $project->rate_type = $request->rate_type;
        $project->rate_amount = $request->rate_amount;

        $project->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        $project = Project::find($request->project_to_delete);
        $project->delete();
        return redirect()->route('dashboard');
    }
}
