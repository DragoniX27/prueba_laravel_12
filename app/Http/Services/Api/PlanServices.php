<?php

namespace App\Http\Services\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

class PlanServices
{
    public function index(Request $request)
    {
        $plans = Plan::all();

        return response()->json($plans);
    }

    public function store(Request $request)
    {
        $plan = Plan::create([
            'name' => $request->input('name'),
            'monthly_price' => $request->input('monthly_price'),
            'limit_users' => $request->input('limit_users'),
            'features' => $request->input('features'),
        ]);

        return response()->json(['message' => 'Plan creado con exito', 'data' => $plan], 201);
    }

    public function show($id)
    {
        $plan = Plan::findOrFail($id);

        return response()->json(['message' => 'Plan retornado con exito', 'data' => $plan], 201);
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->update([
            'name' => $request->input('name'),
            'monthly_price' => $request->input('monthly_price'),
            'limit_users' => $request->input('limit_users'),
            'features' => $request->input('features'),
        ]);

        return response()->json(['message' => 'Plan actualizado con exito', 'data' => $plan], 200);
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return response()->json(['message' => 'Plan eliminado con exito'], 200);
    }
}