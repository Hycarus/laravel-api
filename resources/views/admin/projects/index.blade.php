@extends('layouts.app')
@section('content')
    <section id="projects" class="border border-2 rounded m-3 w-50 overflow-y-auto ">
        <div class="d-flex align-items-center justify-content-between m-2">
            <h1>Project List</h1>
            <form action="{{ route('admin.projects.index') }}" method="GET">
                <select name="technologies" id="technologies">
                    <option value="">All</option>
                    @foreach ($technologies as $technology)
                        <option @if ($technology->name === $request->technologies) selected @endif value="{{ $technology->name }}">
                            {{ $technology->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </form>
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Create</a>
        </div>
        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @foreach ($projects as $project)
            <div class="d-flex align-items-center justify-content-between border border-2 rounded m-2 ">
                <h4>{{ $project->title }}</h4>
                <div class="d-flex m-2">
                    <a class="btn btn-primary mx-2 " href="{{ route('admin.projects.show', $project->slug) }}"><i
                            class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-item-title="{{ $project->title }}"
                            class="cancel-button btn btn-danger ms-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </section>
    @include('partials.modal_delete')
@endsection
