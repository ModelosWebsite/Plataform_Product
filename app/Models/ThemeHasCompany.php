<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeHasCompany extends Model
{
    use HasFactory;

    protected $fillable = ['theme_id', 'company_id'];

    public function theme()
    { 
        return $this->belongsTo(Theme::class, 'theme_id'); 
    }
}
