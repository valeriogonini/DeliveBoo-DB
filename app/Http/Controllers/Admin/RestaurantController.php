<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->all();


        $form_data['user_id'] = Auth::id();
        $base_slug = Str::slug($form_data['name']);
        $form_data['slug'] = $this->generateUniqueSlug($form_data['name']);

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $form_data['image'] = $image_path;
        }

        $new_restaurant = Restaurant::create($form_data);
        if ($request->has('types')) {
            $new_restaurant->types()->attach($request->types);
        }

        return to_route('admin.restaurants.index', $new_restaurant);
    }


    public function show($slug)
    {
        $restaurant = Restaurant::with('dishes')->firstOrFail();
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    private function generateUniqueSlug($name)
    {
        $base_slug = Str::slug($name);
        $slug = $base_slug;
        $n = 0;

        while (Restaurant::where('slug', $slug)->exists()) {
            $n++;
            $slug = $base_slug . '-' . $n;
        }

        return $slug;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
