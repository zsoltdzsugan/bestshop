<?php

namespace App\Models;

use App\Models\Product\ImageGallery;
use App\Models\Product\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImageGallery::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function flashitems(): HasMany
    {
        return $this->hasMany(FlashSaleItem::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'thumb_image',
        'shop_id',
        'category_id',
        'sub_category_id',
        'child_category_id',
        'brand_id',
        'sku',
        'price',
        'sale_price',
        'sale_start',
        'sale_end',
        'quantity',
        'short_description',
        'long_description',
        'video_link',
        'is_top',
        'is_new',
        'is_best',
        'is_featured',
        'is_approved',
        'status',
        'seo_title',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'thumb_image' => 'string',
            'sale_start' => 'datetime',
            'sale_end' => 'datetime',
            'is_top' => 'boolean',
            'is_new' => 'boolean',
            'is_best' => 'boolean',
            'is_featured' => 'boolean',
            'is_approved' => 'integer',
            'status' => 'boolean',
        ];
    }
}
