@extends('admin.layouts.layout')
@section('admin_title')
    Create Default Attribute
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
        <form action="{{ route('attribute.create') }}" method="POST">
            @csrf
            <h6 class="mb-25">Create Default Attribute</h6>
            <div class="input-style-1">
                <label for="attribute_value">Name of the Default Attribute</label>
                <input type="text" placeholder="Attribute Name" name="attribute_value">
            </div>
            <button type="submit" class="main-btn primary-btn-light btn-hover">Add Default Attribute</button>
        </form>
    </div>
@endsection
