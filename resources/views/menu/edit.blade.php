@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>Edit Dishes</h2></div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('menu.update',[$menu->id])}}">

                    <div class="form-group">
                        <label>Dish name: </label>
                        <input type="text" name="menu_title" value="{{$menu->title}}" class="form-control">
                        <small class="form-text text-muted">Please edit Dish name / title</small>
                    </div>

                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="menu_price" value="{{$menu->price}}" class="form-control">
                        <small class="form-text text-muted">Please edit price</small>
                    </div>

                    <div class="form-group">
                        <label>Weight:</label>
                        <input type="text" name="menu_weight"value="{{$menu->weight}}" class="form-control">
                        <small class="form-text text-muted">Please edit dish weight</small>
                    </div>

                    <div class="form-group">
                        <label>Meat: </label>
                        <input type="text" name="menu_meat"value="{{$menu->meat}}" class="form-control">
                        <small class="form-text text-muted">Please edit meat weight</small>
                    </div>

                    <div class="form-group">
                        <label>About: </label>
                        <textarea name="menu_about" id="summernote">{!$menu->about!}</textarea>
                        <small class="form-text text-muted">Please edit additional info</small>
                      </div>
                      @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">EDIT</button>
                </form>



               </div>
           </div>
       </div>
   </div>
</div>

    <script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection
