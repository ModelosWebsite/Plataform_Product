<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected $fillable = [
        'cost',
        'title',
        'status',
        'html_embed',
        'company_id',
        'description',
    ];
}