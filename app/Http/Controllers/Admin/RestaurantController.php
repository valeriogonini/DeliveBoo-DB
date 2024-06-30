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
 
        // dd($form_data);
        $form_data['user_id']= Auth::id();
        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;

        do {
            // SELECT * FROM posts WHERE slug = ?
            $find = Restaurant::where('slug', $slug)->first(); // null | Post

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $new_restaurant = Restaurant::create($form_data);

        // controllo se c`è il parametro technologies
        if ($request->has('types')) {
            $new_restaurant->types()->attach($request->types);
        }

       

        return to_route('admin.restaurants.index', $new_restaurant);
    } 
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::with('dishes')->findOrFail($id);

        // dd($restaurant->dishes);
        return view('admin.restaurants.show',compact ('restaurant'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
