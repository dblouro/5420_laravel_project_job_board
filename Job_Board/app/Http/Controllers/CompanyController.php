<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url',
        ]);

        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Empresa criada com sucesso!');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url',
        ]);

        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Empresa excluída com sucesso!');
    }

    public function show($id)
{
    // Busca a empresa pelo ID, incluindo as vagas relacionadas
    $company = Company::with('jobs')->findOrFail($id);

    // Retorna a view com os dados da empresa
    return view('companies.show', compact('company'));
}

}
