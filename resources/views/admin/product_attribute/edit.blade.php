@extends('admin.layouts.layout')
@section('admin_title')
    Edit Attribute
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
        <form action="{{ route('update.attribute', $attributes->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h6 class="mb-25">Edit Attribute</h6>
            <div class="input-style-1">
                <label for="attribute_value">Name of the Attribute</label>
                <input type="text" placeholder="Full Name" name="attribute_value" value="{{$attributes->attribute_value}}">
            </div>
            <button type="submit" class="main-btn primary-btn-light btn-hover">Edit Attribute</button>
        </form>
    </div>
@endsection
