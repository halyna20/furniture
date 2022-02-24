@extends('layouts.admin')

@section('content')

<div class="container">
    <h3>Groups</h3>
    <a href="{{ route('group.create')}}" class="btn btn-success">Create</a>
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>TITLE</td>
                        <td>ACTIVE</td>
                        <td>ACTION</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name ?? ''}}</td>
                            <td>{{$group->active ?? ''}}</td>
                            <td>
                                <a href="{{ route('group.show', $group->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('group.edit', $group)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['group.destroy', $group->id], 'id' => 'delete']) !!}
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
