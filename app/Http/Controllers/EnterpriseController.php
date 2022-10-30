<?php

namespace App\Http\Controllers;

use App\Services\EnterpriseService;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    protected $enterpriseService;

    public function __construct(EnterpriseService $enterpriseService) 
    {
        $this->enterpriseService = $enterpriseService;
    }

    public function index(Request $request)
    {
        return response()->json($this->enterpriseService->getEnterprisesWithPagination($request->all()));
    }

    public function store(VehicleStoreRequest $request) 
    {
        return response()->json($this->enterpriseService->storeVehicle($request->validated(), 201));
    }

    public function show($id)
    {
        return response()->json($this->enterpriseService->getById($id), 200);
    }

    public function update(VehicleUpdateRequest $request, $id)
    {
        return response()->json($this->enterpriseService->updateVehicle($request->validated(), $id), 201);
    }

    public function destroy($id)
    {
        return response()->json($this->enterpriseService->deleteVehicle($id), 200);
    }

    public function all()
    {
        return response()->json($this->enterpriseService->getAll(), 200);
    }
}
