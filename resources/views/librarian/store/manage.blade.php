@extends('librarian.layouts.layout')
@section('librarian_title')
    Manage Store
@endsection
@section('librarian_layout')
    <div class="card-style mb-30">
        <h6 class="mb-25">Manage Store</h6>
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
                            <th><h6>Store name</h6></th>
                            <th><h6>Slug</h6></th>
                            <th><h6>Description</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stores as $store)
                            <tr>
                                <td><p>{{$store->id}}</p></td>
                                <td><p>{{$store->store_name}}</p></td>
                                <td><p>{{$store->slug}}</p></td>
                                <td><p>{{$store->details}}</p></td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('show.store', $store->id) }}" class="btn btn-info me-2 text-white">
                                            Edit
                                        </a>
                                        <form action="{{ route('delete.store', $store->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <p class="text-muted">Currently, No Stores Available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
