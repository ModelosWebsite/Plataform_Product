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
        "package_name",
        "status",
        "company_id",
        "start_date",
        "end_date",
        "payment_id",
        "functionality_plus_id",
        "is_active"
    ];

    // Verifica se o premium vai expirar em 15 dias
    public function isPremiumExpiringSoon(): bool
    {
        if (!$this->end_date) {
            return false;
        }

        return now()->diffInDays($this->end_date, false) === 15;
    }

    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function package()
    {
        return $this->belongsTo(FunctionalityPlus::class, 'functionality_plus_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}