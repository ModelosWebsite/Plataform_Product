<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class company extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'company_id', 'id');
    }

    public function pacote()
    {
        return $this->hasMany(pacote::class);
    }
}
