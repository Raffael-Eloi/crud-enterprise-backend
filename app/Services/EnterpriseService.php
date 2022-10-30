<?php

namespace App\Services;

use App\Repositories\EnterpriseRepository;

class EnterpriseService {
  protected $enterpriseRepository;

  public function __construct(EnterpriseRepository $enterpriseRepository)
  {
    $this->enterpriseRepository = $enterpriseRepository;
  }

    public function getEnterprisesWithPagination($data)
  {
    return $this->enterpriseRepository->getPaginateFiltered($data, $data['perPage']);
  }

  public function storeEnterprise($request)
  {
    return $this->enterpriseRepository->create($request);
  }

  public function getById($id)
  {
    return $this->enterpriseRepository->show($id);
  }

  public function updateEnterprise($request, $id)
  {
    return $this->enterpriseRepository->update($request, $id);
  }

  public function deleteVehicle($id)
  {
    return $this->enterpriseRepository->destroy($id);
  }

  public function getAll()
  {
    return $this->enterpriseRepository->getAllEnterprise();
  }
}