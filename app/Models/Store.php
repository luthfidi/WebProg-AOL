<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'slug',
        'details',
        'user_id'
    ];

    /**
     * Boot method for automatic slug generation
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug before creation if not provided
        static::creating(function ($store) {
            if (empty($store->slug)) {
                $store->slug = Str::slug($store->store_name);

                // Ensure unique slug
                $originalSlug = $store->slug;
                $count = 1;
                while (self::where('slug', $store->slug)->exists()) {
                    $store->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }
}
