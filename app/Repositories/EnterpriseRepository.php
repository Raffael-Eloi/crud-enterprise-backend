<?php
namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class EnterpriseRepository {
  public function getPaginateFiltered($filter, $perPage = 10)
  {
    $vehicles = new Vehicle();
    $vehicles = $this->filterQuery($vehicles, $filter);
    $vehicles = $vehicles->with('gearbox');
    $vehicles = $vehicles->with('owner');
    $vehicles = $vehicles->with('customer');
    $vehicles = $vehicles->paginate($perPage);
    return $vehicles;
  }

  public function create($data)
  {
    $vehicle = new Vehicle();
    $vehicle->fill($data);
    $vehicle->save();
    return $vehicle;
  }

  public function show($id)
  {
    $vehicle = Vehicle::where('id', $id);
    $vehicle = $vehicle->with('gearbox');
    $vehicle = $vehicle->with('owner');
    $vehicle = $vehicle->with('customer');
    $vehicle = $vehicle->firstOrFail();
    return $vehicle;
  }

  public function update($data, $id)
  {
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->fill($data);
    $vehicle->save();
    return $vehicle;
  }

  public function destroy($id)
  {
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->delete();
  }

  protected function filterQuery($vehicles, $filter) 
  {
    return $vehicles->where(function ($query) use ($filter) {
      if ($filter['filterByAttribute'] == "true") {
        if ($filter['attributeSearch'] == 'license_plate') {
          $query->where('license_plate', 'like', '%'.$filter['keywords'].'%');
        }
        if ($filter['attributeSearch'] == 'brand') {
          $query->where('brand', 'like', '%'.$filter['keywords'].'%');
        }
        if ($filter['attributeSearch'] == 'model') {
          $query->where('model', 'like', '%'.$filter['keywords'].'%');
        }
        if ($filter['attributeSearch'] == 'color') {
          $query->where('color', 'like', '%'.$filter['keywords'].'%');
        }
      }
    });
  }

  public function getAllEnterprise()
  {
    $vehicles = new Vehicle();
    $vehicles = $vehicles->with('gearbox');
    $vehicles = $vehicles->with('owner');
    $vehicles = $vehicles->with('customer');
    $vehicles = $vehicles->get();
    return $vehicles;
  }
}