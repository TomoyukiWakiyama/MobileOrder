<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Category;
use App\Models\Heading;
use App\Models\Prefecture;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'information',
        'price',
        'category_id',
        'heading_id',
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function heading()
    {
        return $this->hasMany(Heading::class);
    }

    public function prefecture()
    {
        return $this->belongsToMany(Prefecture::class);
    }
}
