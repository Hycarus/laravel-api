@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $project->title }}</h1>
        <p>{!! $project->body !!}</p>
        <p>Category:
            @if ($project->category)
                {{ $project->category->name }}
            @else
                Uncategorized
            @endif
        </p>
        <div>
            <img class="w-50" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        </div>
        @forelse ($project->technologies as $technology)
            <div class="d-inline-block m-2 ">
                <img class="square" src="{{ $technology['image'] }}" alt="{{ $technology['name'] }}">
            </div>
        @empty
            <div>No Technologies</div>
        @endforelse
        <div class="d-flex mt-2 ">
            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" data-item-title="{{ $project->title }}"
                    class="cancel-button btn btn-danger">Delete</button>
            </form>
            <a class="btn btn-primary ms-2 " href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
            <a class="btn btn-warning ms-2 " href="{{ route('admin.projects.index') }}">Back</a>
        </div>
    </section>
    @include('partials.modal_delete')
@endsection
