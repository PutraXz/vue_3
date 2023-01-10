<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\FurnitureItems;
use Illuminate\Http\Request;

class ShowFurniture extends Controller
{
    public function __invoke(){
        $items = FurnitureItems::all(); 
         return response()->json([
             'Items' => $items,
         ]);
     }
}
