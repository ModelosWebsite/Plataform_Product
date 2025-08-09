<?php

namespace App\Repositories;

use App\Models\company;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyRepository
{
    public function findByHashOrFail(string $hash): company
    {
        \Log::info("has", ["das" => $hash]);
        
        $company = company::where('companyhashtoken', $hash)->first();
        \Log::info("repository company", ["das" => $company]);

        if (! $company) {
            throw new ModelNotFoundException("Company not found by hash: {$hash}");
        }

        return $company;
    }
}