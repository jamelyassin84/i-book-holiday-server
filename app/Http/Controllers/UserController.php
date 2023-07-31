<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $relationships = [
        'user',
    ];

    public function store(Request $request)
    {
        $payload = $request->all();
        $user = User::create($payload);
        $user->load($this->relationships);
        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all())->save();
        $user->load($this->relationships);
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'user deleted successfully']);
    }
}
