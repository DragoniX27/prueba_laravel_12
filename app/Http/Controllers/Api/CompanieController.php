<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\Api\CompanieServices;
use App\Http\Requests\Api\Companies\CreateCompanieRequest;
use App\Http\Requests\Api\Companies\UpdateCompanieRequest;

class CompanieController extends Controller
{
    protected $servicie;

    public function __construct(CompanieServices $servicie)
    {
        $this->servicie = $servicie;
    }

    public function index(Request $request)
    {
        return $this->servicie->index($request);
    }

    public function store(CreateCompanieRequest $request)
    {
        return $this->servicie->store($request);
    }

    public function show($id)
    {
        return $this->servicie->show($id);
    }

    public function update(UpdateCompanieRequest $request, $id)
    {
        return $this->servicie->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->servicie->destroy($id);
    }
}