@extends('layouts.admin')

@section('page-title', 'Recycle Bin')
{{-- @dd(Route::currentRouteName()) --}}
@section('content')
    <div class="container">
        <h1 class="text-center text-white fw-bold mb-4">Recycle Bin</h1>

        @if (session('message'))
            <div class="alert alert-warning">
                {{session('message')}}
            </div>
        @endif

        <table class="table table-hover table-striped text-center mb-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Languages</th>
                    <th scope="col">Date</th>
                    <th scope="col">Add. devs</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td> {{$project->id}} </td>
                        <td> {{$project->title}} </td>
                        <td> {{$project->languages}} </td>
                        <td> {{$project->date}} </td>
                        <td>
                            @if ($project->add_devs)
                                {{$project->add_devs}}
                            @endif
                        </td>
                        <td>
                            <form action="{{route('admin.projects.restore', $project->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="submit" class="btn btn-primary btn-sm ms-1" value="Restore">
                            </form>
                            <form action="{{route('admin.projects.hardDelete', $project->id)}}" method="POST" class="d-inline-block delete-form" data-name="{{$project->title}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-secondary btn-sm ms-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->links() }}
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/confirm-action/confirm-delete.js')
@endsection
