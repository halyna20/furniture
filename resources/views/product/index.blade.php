@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Products</h3>
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>PRICE</td>
                        <td>ACTIVE</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name ?? ''}}</td>
                            <td>{{$product->price ?? ''}}</td>
                            <td>{{$product->active ?? ''}}</td>
                        </tr>
                    @empty
                        <tr colspan="2">
                            <h1 class="text-center">Products don't exist</h1>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
