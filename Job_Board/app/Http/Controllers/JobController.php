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
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $job = Job::create($request->all());
        return redirect()->route('jobs.index');
    }

    // Adicione métodos para show, edit, update e destroy
    // Método para excluir o trabalho
    public function destroy($id)
    {
        // Encontre o trabalho pelo ID e exclua-o
        $job = Job::findOrFail($id);
        $job->delete();

        // Redirecionar de volta para a lista de trabalhos com uma mensagem de sucesso
        return redirect()->route('jobs.index')->with('success', 'Trabalho excluído com sucesso!');
    }
}
