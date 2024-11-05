<?php

namespace App\Models;

use App\Enums\EmploymentType;
use Database\Factories\ListingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'employment_type', 'company_name',
        'company_logo', 'role', 'apply_url', 'description', 'salary',
    ];

    protected function casts(): array
    {
        return [
            'employment_type' => EmploymentType::class,
        ];
    }
}
