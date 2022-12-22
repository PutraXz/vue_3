<?php

namespace App\Http\Controllers\API\Furniture;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadRequest;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(StoreUploadRequest $request)
    {
        try {
            $this->model->create($request);
                 return response()->json([
                    'success' => true,
                    'message' => 'berhasil upload'
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'tidak berhasil upload',
            ]);
        }
        
    }
}
