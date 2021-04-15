@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>DISHES LIST</h2>
                    <a href="{{route('menu.index', ['sort' => 'title'])}}" class="btn btn-outline-primary waves-effect">Sort by title</a>
                    <a href="{{route('menu.index', ['sort' => 'price'])}}" class="btn btn-outline-primary waves-effect">Sort by price</a>
                    <a href="{{route('menu.index')}}" class="btn btn-outline-primary waves-effect">Default</a>
              </div>

               <div class="card-body">

                @foreach ($menus as $menu)
                    <li class="list-group-item">
                            <div>
                              Name: {{$menu->title}}
                            </div>
                            <div>
                              Price: <a href="{{route('menu.edit',[$menu])}}"></a>{{$menu->price}} EUR
                            </div>
                            <div>
                              Weight: <a href="{{route('menu.edit',[$menu])}}"></a>{{$menu->weight}} g
                            </div>
                            <div>
                              Meat: <a href="{{route('menu.edit',[$menu])}}"></a>{{$menu->meat}}  g
                            </div>
                            <div>
                                About: <a href="{{route('menu.edit',[$menu])}}"></a>{{$menu->about}}
                            </div>

                            <div class="list-line__buttons">
                                    <div>
                                      <a href="{{route('menu.edit',[$menu])}}"class="btn btn-outline-primary waves-effect">EDIT</a>
                                    </div>
                                    
                                    <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                                      @csrf
                                      <button type="submit" class="btn btn-outline-danger waves-effect">DELETE</button>
                                    </form>
                                    <br>
                            </div>
                  </li>
                            
                @endforeach


               </div>
           </div>
       </div>
   </div>
</div>
@endsection

 
