<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        //filtra palavra-chave
        $keyword = $request->input('keyword');

        $query = Job::query();

        //aplica o filtro
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        //obter emprego
        $jobs = $query->get();

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

    public function search(Request $request)
    {
        //obter parametros que vai pesquisar
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $location = $request->input('location');

        //consulta a base de dados
        $jobs = Job::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                      ->orWhere('description', 'like', '%' . $keyword . '%');
            })
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($location, function ($query, $location) {
                $query->where('location', 'like', '%' . $location . '%');
            })
            ->get();

        //retorna resultados
        return view('jobs.index', compact('jobs'));
    }

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
