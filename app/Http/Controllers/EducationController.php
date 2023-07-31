<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    private $relationships = [
        'user',
    ];

    public function store(Request $request)
    {
        $payload = $request->all();
        $education = Education::create($payload);
        $education->load($this->relationships);
        return response()->json($education, 201);
    }

    public function update(Request $request, Education $education)
    {
        $education->fill($request->all())->save();
        $education->load($this->relationships);
        return response()->json($education);
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json(['message' => 'education deleted successfully']);
    }
}
