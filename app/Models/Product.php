<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id', 'brand_id', 'model', 'buying_price',
        'selling_price', 'special_price', 'special_price_form', 'special_price_to',
        'quantity', 'sku_code', 'color', 'size', 'description', 'warranty', 'warranty_duration',
        'warranty_condition', 'thumbnail', 'image', 'status', 'create_by'];


    protected $with = ['category', 'brand', 'users'];
    /**
     * @var mixed
     */
    private $brand_id;


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->select('id', 'name');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeFEATUREPRODUCT($query)
    {
        return $query->where('feature_pro', 1);
    }

}
