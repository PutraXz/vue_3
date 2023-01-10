<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUploadRequest;
use App\Models\FurnitureItems as ModelsFurnitureItems;
class UploadFurniture extends Controller
{
    public function __invoke(StoreUploadRequest $request)
    { 
        try {
            $filename = time().'.'.$request->file->getClientOriginalName();
            $request->file->move(public_path('image/Items'), $filename);
            $reqEnd = $request->toArray();
            $reqEnd['file'] = $filename;
            $reqEnd['slug'] = str_slug($request->title);
            ModelsFurnitureItems::create($reqEnd);
                 return response()->json([
                    'success' => true,
                    'message' => 'berhasil upload' . $request->status,
                    'code' => 200,
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
