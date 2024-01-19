@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $category->name }}</h1>
        <ul>
            @forelse ($category->projects as $project)
                <li>
                    {{ $project->title }}
                </li>
            @empty
                <li>No projects</li>
            @endforelse
        </ul>
        <div class="d-flex mt-2 ">
            <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" data-item-title="{{ $category->name }}"
                    class="cancel-button btn btn-danger">Delete</button>
            </form>
            <a class="btn btn-primary ms-2 " href="{{ route('admin.categories.edit', $category->slug) }}">Edit</a>
            <a class="btn btn-warning ms-2 " href="{{ route('admin.categories.index') }}">Back</a>
        </div>
    </section>
    @include('partials.modal_delete')
@endsection
