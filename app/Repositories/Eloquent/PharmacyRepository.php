<?php

namespace App\Repositories\Eloquent;

use App\Models\Pharmacy;
use App\Repositories\PharmacyRepositoryInterface;

class PharmacyRepository extends BaseRepository implements PharmacyRepositoryInterface
{
    public function __construct(Pharmacy $pharmacy)
    {
        $this->model = $pharmacy;
    }
}
