<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    
    protected $fillable = [
        'reference',
        'value',
        'status',
        'typeservice',
        'company_id'
    ];

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function extraPackage()
    {
        return $this->belongsTo(FunctionalityPlus::class);
    }
}