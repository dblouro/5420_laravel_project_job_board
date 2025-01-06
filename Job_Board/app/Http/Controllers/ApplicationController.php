<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['user', 'job'])->get();
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $jobs = Job::all();
        return view('applications.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,id',
        ]);

        Application::create($request->all());
        return redirect()->route('applications.index')->with('success', 'Candidatura criada com sucesso!');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Candidatura excluída com sucesso!');
    }
}
