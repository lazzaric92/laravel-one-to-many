@extends('layouts.admin')

@section('page-title', )
    '#{{$type->id}}: {{$type->name}}'
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center rounded rounded-3 bg-light pt-4 pb-5">
            <article class="col-10 mb-4">
                <div class="row justify-content-center">
                    <div class="col-12 mb-4">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <h2 class="text-center fw-bold mb-3 p-3"> #{{$type->id}}: {{$type->name}} </h2>
                        <h3>Hex color: <em>{{$type->color}}</em></h3>
                        <div class="mb-3">
                            <h4>List of projects</h4>
                            <ul>
                                @foreach ($type->projects as $project)
                                    <li>
                                        <a class="text-dark text-decoration-none" href="{{route('admin.projects.show', $project)}}">#{{$project->id}} - {{$project->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
            <div class="col-8 d-flex justify-content-between">
                <a href="{{route('admin.types.index')}}" class="btn btn-info">Back to index</a>
                <a href="{{route('admin.types.edit', $type)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('admin.types.destroy', $type)}}" method="POST" class="d-inline-block delete-form" data-name="{{$type->name}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-secondary ms-1" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/confirm-action/confirm-delete.js')
@endsection
