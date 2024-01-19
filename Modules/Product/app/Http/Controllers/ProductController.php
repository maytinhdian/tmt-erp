<?php

namespace Modules\Product\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Modules\Product\app\Http\Requests\ProductRequest;
use Modules\Product\app\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Modules\Product\app\Http\Requests\ProductRequest;
use Modules\Product\app\Models\Product;

class ProductController extends Controller
{
    public  $data = [];


    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Product::all();

        return response()->json($this->data);
    }
    public function index(): JsonResponse
    {
        $this->data = Product::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(ProductRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $this->data = Product::created($input);
        return response()->json($this->data);

    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse

    {
        $this->data = Product::find($id);

        return response()->json($this->data);

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ProductRequest $request, $id): JsonResponse
    {
        //
        $product = Product::find($id);
        $this->data = $product->update($request->all());
        return response()->json($this->data);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //
        $this->data = Product::destroy($id);
        return response()->json($this->data);
    }


    public function search($name)
    {
        //
        return Product::where('name', 'like', '%' . $name . '%')->get();

    }
}
