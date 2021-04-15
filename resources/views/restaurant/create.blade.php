



 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>RESTAURANTS</h2></div>

               <div class="card-body">
          
                <form method="POST" action="{{route('restaurant.store')}}">


                    <div class="form-group">
                        <label>Restaurant name:</label>
                        <input type="text" name="restaurant_title" class="form-control" value="{{old('restaurant_title')}}">
                        <small class="form-text text-muted">please input restaurant name</small>
                    </div>

                    <div class="form-group">
                        <label>Customers: </label>
                        <input type="text" name="restaurant_customers" class="form-control" value="{{old('restaurant_customers')}}">
                        <small class="form-text text-muted">please inout customers number</small>
                    </div>

                    <div class="form-group">
                        <label> Employees:</label>
                        <input type="text" name="restaurant_employees" class="form-control" value="{{old('restaurant_employees')}}">
                        <small class="form-text text-muted">please input emploees number</small>
                      </div>

                    <select name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->title}}  </option>
                        @endforeach
                    </select>
                
                    @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">ADD</button>
                </form>



               </div>
           </div>
       </div>
   </div>
</div>
@endsection
