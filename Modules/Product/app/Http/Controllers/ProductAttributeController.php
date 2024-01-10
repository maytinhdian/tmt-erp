<?php

namespace Modules\Product\app\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Product\app\Models\ProductAttribute ;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return ProductAttribute::all();
        return response()->json(ProductAttribute::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        return ProductAttribute::create($input);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ProductAttribute::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = ProductAttribute::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return ProductAttribute::destroy($id);
    }
}
