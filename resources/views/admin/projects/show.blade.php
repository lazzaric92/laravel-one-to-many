@extends('layouts.admin')

@section('page-title', )
    '#{{$project->id}}: {{$project->title}}'
@endsection

@section('head-cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <article class="col-12 mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 mb-4">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <h2 class="text-center mb-3 p-3"> #{{$project->id}}: {{$project->title}} </h2>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <p class="mb-0"> {{$project->date}} </p>
                            <p class="mb-0"> <span><i class="fa-brands fa-github me-2"></i></span> {{$project->github}} </p>
                        </div>
                        <p>Languages: {{$project->languages}}</p>
                        <p> {{$project->description}} </p>
                    </div>
                    <div class="col-10 mb-4">
                        <p>Dev/s: <br>
                        {{$project->author}} <br>
                        @if ($project->add_devs != 'NULL')
                            {{$project->add_devs}}
                        @endif
                        </p>
                    </div>
                    @if ($project->image)
                        <div class="col-10 text-center mb-4 p-3">
                            <img src=" {{$project->image}} " alt=" {{$project->title}} screen">
                        </div>
                    @endif
                </div>
            </article>
            <div class="col-12 d-flex justify-content-between">
                <a href="{{route('admin.projects.index')}}" class="btn btn-info">Back to index</a>
                <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block delete-form" data-project-title="{{$project->title}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-secondary ms-1" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/projects/confirm-delete.js')
@endsection
