@extends('librarian.layouts.layout')
@section('librarian_title')
    Create Store
@endsection
@section('librarian_layout')
    <div class="card-style mb-30">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <form action="{{ route('create.store') }}" method="POST">
            @csrf
            <h6 class="mb-25">Create Store</h6>
            <div class="input-style-1">
                <label for="store_name">Name of the Store</label>
                <input type="text" placeholder="Store Name" name="store_name">
            </div>
            <div class="input-style-1">
                <label for="details">Description of the Store</label>
                <textarea placeholder="Description" rows="5" name="details"></textarea>
              </div>
              <div class="input-style-1">
                <label for="slug">Slug</label>
                <input type="text" placeholder="slug-name" name="slug">
            </div>
            <button type="submit" class="main-btn primary-btn-light btn-hover">Add Store</button>
        </form>
    </div>
@endsection
