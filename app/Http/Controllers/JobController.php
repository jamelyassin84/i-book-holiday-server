<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    private $relationships = [
        'user',
        'department',
    ];

    public function index(Request $request)
    {
        $jobs = Job::with($this->relationships)->get();
        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        $job = Job::create($payload);
        $job->load($this->relationships);
        return response()->json($job, 201);
    }

    public function show(Job $job)
    {
        $job->load($this->relationships);
        return response()->json($job);
    }

    public function update(Request $request, Job $job)
    {
        $job->fill($request->all())->save();
        $job->load($this->relationships);
        return response()->json($job);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(['message' => 'job deleted successfully']);
    }
}
