<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $menus = Menu::all();  //nerusiuota, ima VISKA bet koki tvarka
        // $menus = Menu::orderby('title')->get(); // RUSIAVIMAS
        // $menus = Menu::orderby('price')->get(); // RUSIAVIMAS
        // $menus = Menu::orderby('title', 'desc')->get(); // RUSIAVIMAS i kita puse

        if ('title' == $request -> sort){
            $menus = Menu::orderBy('title')-> get();
        }
        elseif ('price' ==$request -> sort) {
            $menus = Menu::orderBy('price')-> get();
        }
        else {
            $menus = Menu::all();
        }
        
        

        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'master_name' => ['required', 'min:3', 'max:64'],
            'master_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'master_name.required' => 'Name is missing!',
            'master_name.min' => 'Name is too short!',
            'master_name.max' => 'Name is too long!',
            'master_surname.required' => 'Surname is missing!',
            'master_surname.min' => 'Surname is too short!',
            'master_surname.max' => 'Surname is too long!',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }



        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Stored successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurantsList->count()){
            return 'No no no ';
        }
        $menu->delete();
        return redirect()->route('menu.index');
    
    }
}
