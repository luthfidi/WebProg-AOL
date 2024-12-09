@extends('admin.layouts.layout')
@section('admin_title')
    Manage Attribute
@endsection
@section('admin_layout')
    <div class="card-style mb-30">
        <h6 class="mb-25">Manage Attribute</h6>
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
            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><h6>ID</h6></th>
                            <th><h6>Attribute name</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allattributes as $attribute)
                            <tr>
                                <td><p>{{$attribute->id}}</p></td>
                                <td><p>{{$attribute->attribute_value}}</p></td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('show.attribute', $attribute->id) }}" class="btn btn-info me-2 text-white">
                                            Edit
                                        </a>
                                        <form action="{{ route('delete.attribute', $attribute->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <p class="text-muted">Currently, No Attribute Available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
