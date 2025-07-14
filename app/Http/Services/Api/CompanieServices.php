<?php

namespace App\Http\Services\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Companie;

class CompanieServices
{
    public function index(Request $request)
    {
        $companies = Companie::all();
        return response()->json(['message' => 'Compañias retornadas con existo', 'data' => $companies], 201);
    }

    public function store(Request $request)
    {
        $companie = Companie::create([
            'name' => $request->input('name'),
        ]);

        $companie->subscriptions()->create([
            'plan_id' => $request->input('plan_id'),
            'start_date' => now(),
            'is_active' => true,
        ]);

        return response()->json(['message' => 'Compañia creada con exito', 'data' => $companie], 201);
    }

    public function show($id)
    {
        $companie = Companie::findOrFail($id);
        return response()->json(['message' => 'Compañia retornada con exito', 'data' => $companie], 201);
    }

    public function update(Request $request, $id)
    {
        $companie = Companie::findOrFail($id);
        $companie->update([
            'name' => $request->input('name'),
        ]);

        $activeSubscription = $companie->subscriptions()
                ->where('is_active', true)
                ->first();

        if ($activeSubscription->plan_id !== $request->input('plan_id')) {
            $activeSubscription->update([
                'is_active' => false,
                'end_date' => now(),
            ]);

            $companie->subscriptions()->create([
                'plan_id' => $request->input('plan_id'),
                'start_date' => now(),
                'is_active' => true,
            ]);
        }

        return response()->json(['message' => 'Compañia actualizada con exito', 'data' => $companie], 200);
    }

    public function destroy($id)
    {
        $companie = Companie::findOrFail($id);
        
        $activeSubscription = $companie->subscriptions()
                ->where('is_active', true)
                ->first();

        $activeSubscription->update([
                'is_active' => false,
                'end_date' => now(),
            ]);

        $companie->delete();


        

        return response()->json(['message' => 'Compañia eliminada con exito'], 200);
    }
}