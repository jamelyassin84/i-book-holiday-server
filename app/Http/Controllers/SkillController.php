<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    private $relationships = [
        'user',
    ];

    public function store(Request $request)
    {
        $payload = $request->all();
        $skill = Skill::create($payload);
        $skill->load($this->relationships);
        return response()->json($skill, 201);
    }

    public function update(Request $request, Skill $skill)
    {
        $skill->fill($request->all())->save();
        $skill->load($this->relationships);
        return response()->json($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'skill deleted successfully']);
    }
}
