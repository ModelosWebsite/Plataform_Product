<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionalityPlus extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "amount",
        "image",
    ];

    public function activePackage()
    {
        return $this->hasMany(pacote::class);
    }
}