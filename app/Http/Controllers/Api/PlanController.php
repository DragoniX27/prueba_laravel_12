<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\Api\PlanServices;
use App\Http\Requests\Api\Plans\CreatePlanRequest;
use App\Http\Requests\Api\Plans\UpdatePlanRequest;

class PlanController extends Controller
{
    private PlanServices $service;

    public function __construct(PlanServices $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }
    
    public function store(CreatePlanRequest $request)
    {
        return $this->service->store($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(UpdatePlanRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
       return $this->service->destroy($id);
    }
}
