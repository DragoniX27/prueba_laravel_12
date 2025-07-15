<?php

namespace App\Http\Services\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserServices
{
    public function index(Request $request)
    {
        $users = User::with('company')->get();

        return response()->json(['message' => 'Usuarios retornados con exito', 'data' => $users], 200);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'company_id' => $request->input('company_id'),
        ])->assignRole(Role::where('name', 'user')->where('guard_name', 'sanctum')->first());

        return response()->json(['message' => 'Usuario creado con exito', 'data' => $user], 201);
    }

    public function show($id)
    {
        $user = User::with('company')->findOrFail($id);

        return response()->json(['message' => 'Usuario retornado con exito', 'data' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company_id' => $request->input('company_id'),
        ]);

        if ($request->has('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        return response()->json(['message' => 'Usuario actualizado con exito', 'data' => $user], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado con exito'], 200);
    }

}