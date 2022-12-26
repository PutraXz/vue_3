<?php

namespace App\Http\Controllers\API\Furniture;

use App\Http\Controllers\Controller;
use App\Models\FurnitureItems;
use Illuminate\Http\Request;
use App\Models\User;

class ShowFurniture extends Controller
{
    public function __invoke(){
       $items = FurnitureItems::paginate(16);
       return response()->json([
        'Items' => $items,
       ]);
    }
}
