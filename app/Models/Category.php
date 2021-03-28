<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['root', 'create_by', 'name', 'slug', 'status'];

    protected $with = ['users', "sub_category"];

    public const CategoryRoot = 0;

    public function sub_category()
    {
        return $this->hasMany(self::class, 'root');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name');
    }

    public const ROOT_ITEMS = '0';

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public const ActiveItems = 'active';
}
