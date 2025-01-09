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
     * @var list<string>
     */
    protected $fillable = [
        'logo',
        'name',
        'email',
        'mobile',
        'services',
        'branches',
    ];

    protected $casts = [
        'services' => 'array',
        'branches' => 'array',
    ];
}
