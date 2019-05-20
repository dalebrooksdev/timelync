<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Project;
use App\User;

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
        if ($userProject){
            return view('project', compact('userProject'));
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

        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = $user->id;
        $project->rate_type = $request->rate_type;
        $project->rate_amount = $request->rate_amount;
        $project->title = $request->title;

        $project->save();

        return redirect()->route('dashboard');
    }
}

