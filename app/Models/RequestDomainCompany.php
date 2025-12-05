<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDomainCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        "domain_name",
        "extension",
        "company_id"
    ];
}