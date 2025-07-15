<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\UserServices;
use App\Http\Requests\Api\Users\CreateUserRequest;
use App\Http\Requests\Api\Users\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserServices $service;

    public function __construct(UserServices $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function store(CreateUserRequest $request)
    {
        return $this->service->store($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
