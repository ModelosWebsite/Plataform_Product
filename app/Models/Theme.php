<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $table = 'themes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'version',
        'image',
        'folder',
        'author',
    ];

    // Um tema pode estar em várias empresas
    public function companies()
    {
        return $this->hasMany(company::class, 'theme_id', 'id');
    }

}
