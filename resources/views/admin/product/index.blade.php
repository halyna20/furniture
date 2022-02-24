@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Products</h3>
    <a href="{{ route('admin-product.create')}}" class="btn btn-success">Create</a>
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>PRICE</td>
                        <td>ACTIVE</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name ?? ''}}</td>
                            <td>{{$product->price ?? ''}}</td>
                            <td>{{$product->active ?? ''}}</td>
                            <td>
                                <a href="{{ route('admin-product.show', $product->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin-product.edit', $product)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin-product.destroy', $product->id], 'id' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr colspan="2">
                            <h1 class="text-center">Groups don't exist</h1>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
