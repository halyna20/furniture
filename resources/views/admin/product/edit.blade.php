@extends('layouts.admin')

@section('content')

<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>
    </div>

    @include('layouts.success')
    @include('layouts.errors')
</div>
<div class="container">
    <h3>Edit product</h3>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['admin-product.update', $product], 'method' => 'PUT']) !!}

                @include('admin.product._form')

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
