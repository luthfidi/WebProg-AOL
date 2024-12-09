@extends('admin.layouts.layout')
@section('admin_title')
    Edit Sub Category
@endsection
@section('admin_layout')
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
        <form action="{{ route('update.subcat', $subcategory_info->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h6 class="mb-25">Edit Sub Category</h6>
            <div class="input-style-1">
                <label for="subcategory_name">Name of the Sub Category</label>
                <input type="text" placeholder="Sub Category Name" name="subcategory_name" value="{{$subcategory_info->subcategory_name}}">
            </div>
            <button type="submit" class="main-btn primary-btn-light btn-hover">Edit Sub Category</button>
        </form>
    </div>
@endsection
