<?php

namespace App\Repositories;

use App\Models\company;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyRepository
{
    public function findByHashOrFail(string $hash): company
    {
        $company = company::where('companyhashtoken', $hash)->first();

        if (! $company) {
            throw new ModelNotFoundException("Company not found by hash: {$hash}");
        }

        return $company;
    }
}