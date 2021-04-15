


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>EDIT RESTAURANT</h2></div>

               <div class="card-body">

                <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">

                    <div class="form-group">
                        <label>Restaurant name: </label>
                        <input type="text" class="form-control" name="restaurant_title" value="{{old('restaurant_title', $restaurant->title)}}" >
                        <small class="form-text text-muted">Please edit name</small>
                    </div>

                    <div class="form-group">
                        <label>Customers:  </label>
                        <input type="text" class="form-control" name="restaurant_customers" value="{{old('restaurant_customers', $restaurant->customers)}}" >
                        <small class="form-text text-muted">Please edit Customers</small>
                    </div>

                    <div class="form-group">
                        <label>Employees:  </label>
                        <input type="text" class="form-control" name="restaurant_employees" value="{{old('restaurant_employees', $restaurant->employees)}}">
                        <small class="form-text text-muted">Please edit Employees</small>
                    </div>

                    <select name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                                {{$menu->title}}
                            </option>
                        @endforeach
                    </select>

                    @csrf

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary waves-effect">EDIT</button>
                    </div>


                   
                </form>




               </div>
           </div>
       </div>
   </div>
</div>
@endsection
