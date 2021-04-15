<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $menus = Menu::all();
        return view('restaurant.index', ['restaurants' => $restaurants, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all(); // paduodam visu patiekalu sarasa
        return view('restaurant.create', ['menus' => $menus]); // atvaizduoja menu sarasa restorane
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), //validatorius
        [
            'restaurant_title' => ['required', 'min:3', 'max:64'],
            'restaurant_customers' => ['required', 'numeric', 'min:1', 'max:50'],
            'restaurant_employees' => ['required', 'numeric', 'min:1', 'max:10'],
        ],
        [
            'restaurant_title.required' => 'Title is missing!',
            'restaurant_title.min' => 'Title is too short!',
            'restaurant_title.max' => 'Title is too long!',
            'restaurant_customers.required' => 'Customers are missing!',
            'restaurant_customers.min' => 'Customers are missing!',
            'restaurant_customers.max' => 'Can nor be more than 50 customers!',
            'restaurant_employees.required' => 'Employees numbers are missing!',
            'restaurant_employees.min' => 'Employees are missing!',
            'restaurant_employees.max' => 'Can not be more than 50 Employees!',

            
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }




        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;

        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.edit', ['restaurant' => $restaurant, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {


        $validator = Validator::make($request->all(), //validatorius
        [
            'restaurant_title' => ['required', 'min:3', 'max:64'],
            'restaurant_customers' => ['required', 'numeric', 'min:1', 'max:50'],
            'restaurant_employees' => ['required', 'numeric', 'min:1', 'max:10'],
        ],
        [
            'restaurant_title.required' => 'Title is missing!',
            'restaurant_title.min' => 'Title is too short!',
            'restaurant_title.max' => 'Title is too long!',
            'restaurant_customers.required' => 'Customers are missing!',
            'restaurant_customers.min' => 'Customers are missing!',
            'restaurant_customers.max' => 'Can nor be more than 50 customers!',
            'restaurant_employees.required' => 'Employees numbers are missing!',
            'restaurant_employees.min' => 'Employees are missing!',
            'restaurant_employees.max' => 'Can not be more than 50 Employees!',

            
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }




        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;

        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Stored successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {

        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('info_message', 'Can not be deleted');
       
    }
}
