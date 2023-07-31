<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;

class WorkExperienceController extends Controller
{
    private $relationships = [
        'user',
    ];

    public function store(Request $request)
    {
        $payload = $request->all();
        $workExperience = WorkExperience::create($payload);
        $workExperience->load($this->relationships);
        return response()->json($workExperience, 201);
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $workExperience->fill($request->all())->save();
        $workExperience->load($this->relationships);
        return response()->json($workExperience);
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return response()->json(['message' => 'workExperience deleted successfully']);
    }
}
