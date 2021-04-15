

 
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                        <h2>RESTAURANTS LIST </h2>
                        <a href="{{route('restaurant.index', ['sort' => 'title'])}}" class="btn btn-outline-primary waves-effect">Sort by Title</a>
                        <a href="{{route('restaurant.index', ['sort' => 'restaurantMenu'])}}" class="btn btn-outline-primary waves-effect">Sort by Dish</a>
                        <a href="{{route('restaurant.index')}}" class="btn btn-outline-primary waves-effect">Default</a>
              </div>

               <div class="card-body">

                @foreach ($restaurants as $restaurant)
                <li class="list-group-item">
                        <div>
                          Restaurant Name: {{$restaurant->title}}
                        </div>

                        <div>
                          Dishes: {{$restaurant->restaurantMenu->title}}
                        </div>
                          
                        <div class="list-line__buttons">
                              <div>
                                <a href="{{route('restaurant.edit',[$restaurant])}}" class="btn btn-outline-primary waves-effect">EDIT </a>
                              </div>
                              <div> 
                              <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger waves-effect">DELETE</button>
                              </form>
                              </div>
                        </div>
                          <br>
                </li>
                @endforeach



               </div>
           </div>
       </div>
   </div>
</div>
@endsection
