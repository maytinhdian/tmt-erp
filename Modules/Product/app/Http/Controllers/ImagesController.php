<?php

namespace Modules\Product\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Product\app\Models\Image;
use Modules\Product\app\Http\Requests\ImageRequest;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product::create');
    }
    public function imageUpload(Request $req) {
        $postObj = new Image();

        if($req->hasFile('image')) {
            $filename = $req->file('image')->getClientOriginalName(); // get the file name
            $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME); // get the file name without extension
            $getfileExtension = $req->file('image')->getClientOriginalExtension(); // get the file extension
            $createnewFileName = time().'_'.str_replace(' ','_', $getfilenamewitoutext).'.'.$getfileExtension; // create new random file name
            $img_path = $req->file('image')->storeAs('public/post_img', $createnewFileName); // get the image path
            $postObj->image = $createnewFileName; // pass file name with column
        }

        if($postObj->save()) { // save file in databse
            return ['status' => true, 'message' => "Image uploded successfully"];
        }
        else {
            return ['status' => false, 'message' => "Error : Image not uploded successfully"];

        }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('image');
        $data = Image::create($validatedData);

        return response($data, Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
