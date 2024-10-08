<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller

{

    // public function __construct()
    // {
    //     $this->middleware('check.access')->only(['show', 'edit', 'update', 'destroy']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();

        return view('admin.dishes.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = auth()->user();

        $restaurant = $user->restaurant;

        return view('admin.dishes.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $form_data = $request->all();


        $user = Auth::user();
        $restaurant = $user->restaurant;

        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;

        do {
            // SELECT * FROM posts WHERE slug = ?
            $find = Dish::where('slug', $slug)->first(); // null | Post

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        if ($request->hasFile('image')) {

            //
            $image_path = $request->file('image')->store('uploads', 'public');
            $form_data['image'] = $image_path;

            // dd($image_path);
        }

        /* 
        $new_dish = Dish::create($form_data); */
        $new_dish = new Dish($form_data);

        $new_dish->restaurant()->associate($restaurant);
        $new_dish->save();
        return to_route('admin.dishes.index', $new_dish);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dish = Dish::with('restaurant')->findOrFail($id);

        if ($dish->restaurant->user->isNot(Auth::user())) {
            return view('admin.abort');
        }

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        // if (Auth::guest()) {
        //     return redirect('admin.dishes.index');
        // }

        if ($dish->restaurant->user->isNot(Auth::user())) {
            return view('admin.abort');
        }


        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        $form_data = $request->all();
        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;

        do {
            $find = Dish::where('slug', $slug)->first();

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);
        $form_data['slug'] = $slug;
        if ($request->hasFile('image')) {

            //
            $image_path = $request->file('image')->store('uploads', 'public');
            $form_data['image'] = $image_path;

            // dd($image_path);
        }
        $dish->update($form_data);


        return to_route('admin.dishes.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        // if (Auth::guest()) {
        //     return redirect('admin.dishes.index');
        // }

        if ($dish->restaurant->user->isNot(Auth::user())) {
            return view('admin.abort');
        }
        $dish->delete();

        return to_route('admin.dishes.index');
    }
}
