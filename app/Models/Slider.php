<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['create_by', 'title', 'sub_title', 'url', 'start_date', 'end_date', 'image', 'status'];

    public function users()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name');
    }
}
