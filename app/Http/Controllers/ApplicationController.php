<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    private $relationships = [
        'user',
        'department',
    ];

    public function index()
    {
        $applications = Application::with($this->relationships)->get();
        return response()->json($applications);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        $application = Application::create($payload);
        $application->load($this->relationships);
        return response()->json($application, 201);
    }

    public function show(Application $application)
    {
        $application->load($this->relationships);
        return response()->json($application);
    }

    public function update(Request $request, Application $application)
    {
        $application->fill($request->all())->save();
        $application->load($this->relationships);
        return response()->json($application);
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return response()->json(['message' => 'application deleted successfully']);
    }
}
