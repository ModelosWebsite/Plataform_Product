<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacote extends Model
{
    use HasFactory;
    
    protected $table = "pacotes";
    protected $primaryKey = "id";
    protected $fillable = [
        "pacote",
        "status",
        "company_id"
    ];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
