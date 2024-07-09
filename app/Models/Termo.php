<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    use HasFactory;

    protected $table = "termos";
    protected $primaryKey = "id";
    protected $fillable = [
        "privacy",
        "condition",
        "status",
        "company_id"
    ];
    
}
