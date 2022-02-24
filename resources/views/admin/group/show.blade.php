@extends('layouts.admin')

@section('content')

@include('layouts.errors')
    <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h3>TITLE: {{$group->name}}</h3>
               <h3>ACTIVE: {{$group->active == 1 ? 'true' : 'false'}}</h3>
           </div>
       </div>
    </div>

@endsection
