<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadRequest;
use App\Models\FurnitureItems;
use Illuminate\Http\Request;

class UpdateFurniture extends Controller
{
    public function __invoke(StoreUploadRequest $request, $slug)
    {
        try {
            $reqEnd = $request->toArray();
            $reqEnd['slug'] = str_slug($request->title);
            FurnitureItems::where('slug', $slug)->update($reqEnd);
            return response()->json([
                'message' => 'success',
            ]);
        } catch (\Throwable $th) {
        //    throw $th;
            return response()->json([
                'message' => 'failed',
            ]);
        }
    }
}
