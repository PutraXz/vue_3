<?php

namespace App\Http\Controllers\API\Furniture;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DetailFurniture extends Controller
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
