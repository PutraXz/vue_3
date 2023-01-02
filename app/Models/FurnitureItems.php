<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureItems extends Model
{
    // public function categoryfurniture(){
    //     return $this->belongsTo(CategoryFurniture::class);
    // }
    use HasFactory;
    protected $table = 'furniture_items';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'file', 'price', 'description', 'category', 'slug'];
}
