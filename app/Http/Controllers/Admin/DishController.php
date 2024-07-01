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
        $form_data = $request->validated();

        $user = Auth::user();
        $restaurant = $user->restaurant;

        // Modifica aggiunta: Generazione slug unico
        $form_data['slug'] = $this->generateUniqueSlug($form_data['name']);

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $form_data['image'] = $image_path;
        }

        $new_dish = new Dish($form_data);
        $new_dish->restaurant()->associate($restaurant);
        $new_dish->save();

        return to_route('admin.dishes.index', $new_dish);
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)

    {
        $dish = Dish::with('restaurant')->where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $form_data = $request->validated();

        // Modifica aggiunta: Controllo per aggiornamento slug
        if ($form_data['name'] !== $dish->name) {
            $form_data['slug'] = $this->generateUniqueSlug($form_data['name']);
        } else {
            $form_data['slug'] = $dish->slug;
        }

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $form_data['image'] = $image_path;
        }

        $dish->update($form_data);

        return to_route('admin.dishes.show', $dish);
    }

    // Modifica aggiunta: Metodo per generare slug unico
    private function generateUniqueSlug($name)
    {
        $base_slug = Str::slug($name);
        $slug = $base_slug;
        $n = 0;

        while (Dish::where('slug', $slug)->exists()) {
            $n++;
            $slug = $base_slug . '-' . $n;
        }

        return $slug;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return to_route('admin.dishes.index');
    }
}
