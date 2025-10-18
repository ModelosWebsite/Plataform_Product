<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class company extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'companyname',
        'companyemail',
        'companynif',
        'companybusiness',
        'companyhashtoken',
        'delivery_method',
        'payment_type',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'company_id', 'id');
    }

    public function heroes() 
    { 
        return $this->hasMany(hero::class, 'company_id'); 
    }
    public function products() 
    { 
        return $this->hasMany(Produt::class, 'company_id'); 
    }
    public function infoWhy() 
    { 
        return $this->hasMany(infowhy::class, 'company_id'); 
    }
    public function details() 
    { 
        return $this->hasMany(Detail::class, 'company_id'); 
    }
    public function about() 
    { 
        return $this->hasMany(About::class, 'company_id'); 
    }
    public function contacts() 
    { 
        return $this->hasMany(contact::class, 'company_id'); 
    }
    public function color() 
    { 
        return $this->hasOne(Color::class, 'company_id'); 
    }
    public function fundos() 
    { 
        return $this->hasMany(Fundo::class, 'company_id'); 
    }
    public function packages() 
    { 
        return $this->hasMany(pacote::class, 'company_id'); 
    }
    public function termsCompany() 
    { 
        return $this->hasOne(TermsCompany::class, 'company_id'); 
    }
    public function termpbHasCompany() 
    { 
        return $this->hasMany(Termpb_has_Company::class, 'company_id'); 
    }
    public function elements() 
    { 
        return $this->hasMany(Element::class, 'company_id'); 
    }
    public function skills() 
    { 
        return $this->hasMany(Skill::class, 'company_id'); 
    }
    public function services()
    { 
        return $this->hasMany(Service::class, 'company_id'); 
    }
    public function projects()
    { 
        return $this->hasMany(Project::class, 'company_id'); 
    }
    public function themeActive()
    { 
        return $this->hasMany(ThemeHasCompany::class, 'company_id'); 
    }
    public function customDomains()
    {
        return $this->hasMany(CustomDomain::class);
    }
}