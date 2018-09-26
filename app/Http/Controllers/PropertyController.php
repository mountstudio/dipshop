<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PropertyRequest;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('property.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('property.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $validated = $request->validated();

        $property = new Property($validated);

        $property
            ->fill(['slug' => str_slug($validated['name'], '-')])
            ->save();

        $property->categories()->attach($request->category);

        return redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property $property
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->back();
    }

    public function getPropertiesByCategory(int $id)
    {
        $category = Category::find($id);
        $properties = $category->properties;

        return response()->json(['properties' => $properties]);
    }
}
