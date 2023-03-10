<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\FurnitureItems;
use Illuminate\Http\Request;

class EditFurniture extends Controller
{
    public function __invoke($slug)
    {
        try {
            $content =  FurnitureItems::where('slug', $slug)->firstOrFail();
             return response()->json([
                 'content' => $content,
             ]);
         } catch (\Throwable $th) {
             return response()->json([
                 'code' => 500,
             ]);
         }
    }
}
