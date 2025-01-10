<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'logo',
        'name',
        'email',
        'mobile',
        'country_id',
        'state_id',
        'city_id',
        'services',
        'branches',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'services' => 'array',
        'branches' => 'array',
    ];
    
    /**
     * Get the country associated with the company.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the state associated with the company.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the city associated with the company.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
