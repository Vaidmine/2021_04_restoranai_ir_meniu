

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>Add New Dish</h2></div>

               <div class="card-body">
          
                  <form method="POST" action="{{route('menu.store')}}">

                     <div class="form-group">
                        <label>Dish name: </label>
                        <input type="text" name="menu_title" class="form-control">
                        <small class="form-text text-muted">Please enter Dish name / title</small>
                    </div>

                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="menu_price"  class="form-control">
                        <small class="form-text text-muted">Please enter price</small>
                    </div>

                    <div class="form-group">
                        <label>Weight:</label>
                        <input type="text" name="menu_weight"  class="form-control">
                        <small class="form-text text-muted">Please enter dish weight</small>
                    </div>

                    <div class="form-group">
                        <label>Meat: </label>
                        <input type="text" name="menu_meat" class="form-control">
                        <small class="form-text text-muted">Please enter meat weight</small>
                    </div>

                    <div class="form-group">
                        <label>About: </label>
                        <textarea name="menu_about" id="summernote"></textarea>
                        <small class="form-text text-muted">Please add additional info</small>
                      </div>
                      @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">ADD</button>
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