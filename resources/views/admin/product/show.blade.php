@extends('layouts.admin')

@section('content')

@include('layouts.errors')
    <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h3>TITLE: {{$product->name}}</h3>
               <h3>ACTIVE: {{$product->active == 1 ? 'true' : 'false'}}</h3>
               <h3>PRICE: {{$product->price}}</h3>
               <h3>GROUP: {{$product->group->name}}</h3>
           </div>
       </div>
    </div>

@endsection
