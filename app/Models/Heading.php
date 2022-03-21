<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Menu;

class Heading extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'price',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

}
