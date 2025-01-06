<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Skill::create($request->all());
        return redirect()->route('skills.index')->with('success', 'Habilidade criada com sucesso!');
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Habilidade atualizada com sucesso!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Habilidade excluída com sucesso!');
    }
}
