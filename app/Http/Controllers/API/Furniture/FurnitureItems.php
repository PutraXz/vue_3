<?php

namespace App\Http\Controllers\API\Furniture;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadRequest;
use App\Models\FurnitureItems as ModelsFurnitureItems;

class FurnitureItems extends Controller
{
    public function __invoke(StoreUploadRequest $request)
    {
        try {
            ModelsFurnitureItems::create($request->toArray());
                 return response()->json([
                    'success' => true,
                    'message' => 'berhasil upload' . $request->status,
                    'code' => 200
                ]);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'success' => false,
                'message' => 'tidak berhasil upload'. $request->status,
                'error' => $th,
                'code' => 500
            ]);
        }
    }
}
