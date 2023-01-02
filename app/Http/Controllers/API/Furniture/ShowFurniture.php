<?php

namespace App\Http\Controllers\API\Furniture;

use App\Http\Controllers\Controller;
use App\Models\FurnitureItems;

class ShowFurniture extends Controller
{
    public function __invoke(){
       $items = FurnitureItems::paginate(16); 
        return response()->json([
            'Items' => $items,
        ]);
    }
}
