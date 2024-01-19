@extends('layouts.app')
@section('content')
    <section id="projects" class="border border-2 rounded m-3 w-50 overflow-y-auto ">
        <div class="d-flex align-items-center justify-content-between m-2">
            <h1>Category List</h1>
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Create</a>
        </div>
        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @foreach ($categories as $category)
            <div class="d-flex align-items-center justify-content-between border border-2 rounded m-2 ">
                <h4>{{ $category->name }}</h4>
                <div class="d-flex m-2">
                    <a class="btn btn-primary mx-2 " href="{{ route('admin.categories.show', $category->slug) }}"><i
                            class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->slug) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-item-title="{{ $category->name }}"
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
