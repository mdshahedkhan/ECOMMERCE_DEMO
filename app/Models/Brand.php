<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['create_by', 'name', 'slug', 'status'];

    protected $with = ['users'];

    public function users()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id')->where('status', 'active');
    }

    /**
     * Brand Active
     *
     * @const
     */
    public const ACTIVE_BRAND = 'active';
}
