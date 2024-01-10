<?php

namespace Modules\Product\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Product\app\Models\ProductAttributeValue;

class ProductAttributeValueController extends Controller
{
    public array $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //

        return response()->json(ProductAttributeValue::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'value' => 'required|min:6', //Giá trị của thuộc tính sản phẩm
            'product_attribute_id'=>'required|integer', //Thuộc tính của sản phẩm
            'product_id'=>'required|integer', //Mã sản phẩm
        ]);

        //  ProductAttributeValue::create($request->all());

        return response()->json(ProductAttributeValue::create($request->all()),201);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $status = ProductAttributeValue::destroy($id);

        if ($status) {
            $repsonse=[
                'status'=>'success',
                'id'=>$id,
            ];
        }else {
            $repsonse=[
                'status'=>'error',
            ];
        }

        return $repsonse;
    }
}
