@extends('layouts.app')
@section('content')
    <section id="technologies" class="border border-2 rounded m-3 w-50 overflow-y-auto ">
        <div class="d-flex align-items-center justify-content-between m-2">
            <h1>Technology List</h1>
            <a class="btn btn-success" href="{{ route('admin.technologies.create') }}">Create</a>
        </div>
        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @foreach ($technologies as $technology)
            <div class="d-flex align-items-center justify-content-between border border-2 rounded m-2 ">
                <h4>{{ $technology->name }}</h4>
                <div class="d-flex m-2">
                    <a class="btn btn-primary mx-2 " href="{{ route('admin.technologies.show', $technology->slug) }}"><i
                            class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.technologies.edit', $technology->slug) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-item-title="{{ $technology->name }}"
                            class="cancel-button btn btn-danger ms-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
    @include('partials.modal_delete')
@endsection
