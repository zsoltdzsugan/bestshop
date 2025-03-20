<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'logo',
        'slug',
        'name',
        'brand_url',
        'featured',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'logo' => 'string',
            'slug' => 'string',
            'name' => 'string',
            'type' => 'string',
            'brand_url' => 'string',
            'featured' => 'boolean',
            'status' => 'boolean',
        ];
    }
}
