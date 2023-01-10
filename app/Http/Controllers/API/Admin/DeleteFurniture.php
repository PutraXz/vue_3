<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\FurnitureItems;
use Illuminate\Http\Request;

class DeleteFurniture extends Controller
{
    public function __invoke($slug)
    {
        try {
            FurnitureItems::where('slug', $slug)->delete();
            return response()->json([
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }
}
