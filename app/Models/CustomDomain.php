<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDomain extends Model
{
    use HasFactory;

    protected $fillable = [
        "status",
        "domain",
        "verified",
        "company_id",
        "verification_token"
    ];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}