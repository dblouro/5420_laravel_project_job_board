<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $companies = \App\Models\Company::all();
        return view('jobs.create', compact('companies'));
    }

    public function store(Request $request)
    {
        //$job = Job::create($request->all());
        //return redirect()->route('jobs.index');
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    // Adicione métodos para show, edit, update e destroy

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $companies = \App\Models\Company::all();
        return view('jobs.edit', compact('job', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validated);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
