@extends('librarian.layouts.layout')
@section('librarian_title')
    Edit Store
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
        <form action="{{ route('update.store', $store_info->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h6 class="mb-25">Edit Store</h6>
            <div class="input-style-1">
                <label for="store_name">Name of the Store</label>
                <input type="text" value="{{$store_info->store_name}}" name="store_name">
            </div>
            <div class="input-style-1">
                <label for="details">Description of the Store</label>
                <textarea rows="5" name="details">{{$store_info->details}}</textarea>
              </div>
              <div class="input-style-1">
                <label for="slug">Slug</label>
                <input type="text" value="{{$store_info->slug}}" name="slug">
            </div>
            <button type="submit" class="main-btn primary-btn-light btn-hover">Update Store</button>
        </form>
    </div>
@endsection
