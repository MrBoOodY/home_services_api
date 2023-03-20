<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use FilesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ValidatorHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::all();


        return  ResponseHelper::setResponse('success', CategoryResource::collection($categories));
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
        // Tell the validator that this file should be an image
        $rules = array(
            'name' => 'required|unique:categories,name',
            'image' => 'required|mimes:jpg,bmp,png,jpeg,gif|max:2048',
        );
        $messages = [
            'name.required' => 'A name is required.',
            'name.unique' => 'A name is taken before.',
            'image.required' => 'image is required.',
            'image.mimes' => 'Only jpg,bmp,png,jpeg and gif images are allowed.',
            'image.max' => 'Sorry! Maximum allowed size for an image is 2MB.',
        ];
        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }


        if ($request->hasFile('image')) {
            $path = FilesHelper::saveFile($request->file('image'), 'category_images/');
            $request['images'] = $path;
        }
        $category =  Category::create([
            'images' => $request->images,
            'name' => $request->name,
        ]);

        if ($category) {
            return  ResponseHelper::setResponse('success', new CategoryResource($category));
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Category::with('services')->firstWhere('id', '=', $id);

        if (!$category) {
            return ResponseHelper::setError('visit request not found', ResponseStatusCodes::$error_status_code);
        }
        return  ResponseHelper::setResponse('success', new CategoryResource($category, true));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $category = Category::firstWhere('id', '=', $id);

        if (!$category) {
            return ResponseHelper::setError('category not found', ResponseStatusCodes::$error_status_code);
        }
        // Tell the validator that this file should be an image
        $rules = array(
            'name' => "nullable|unique:categories,name,". $id,
            'image' => 'nullable|mimes:jpg,bmp,png,jpeg,gif|max:2048',
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }


        if ($request->hasFile('image')) {
            $path = FilesHelper::saveFile($request->file('image'), 'category_images/');
            $request['images'] = $path;
        }
        $category =  Category::create([
            'images' => $request->images,
            'name' => $request->name,
        ]);
        return $category;
        if ($category) {
            return  ResponseHelper::setResponse('success', new CategoryResource($category));
        } else {
            return ResponseHelper::setError('some thing went wrong', ResponseStatusCodes::$error_status_code, null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
