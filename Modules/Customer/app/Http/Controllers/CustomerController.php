<?php

namespace Modules\Customer\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Customer\app\Http\Requests\CustomerRequest;
use Modules\Customer\app\Models\Customer;
use Modules\Product\app\Models\Product;

class CustomerController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Customer::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $this->data = Customer::created($input);
        return response()->json($this->data);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        $this->data = Customer::find($id);

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, $id): JsonResponse
    {
        $product = Customer::find($id);
        $this->data = $product->update($request->all());
        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $this->data = Customer::destroy($id);
        return response()->json($this->data);
    }
    public function search($name)
    {
        //
        return Customer::where('name', 'like', '%' . $name . '%')->get();

    }
}
