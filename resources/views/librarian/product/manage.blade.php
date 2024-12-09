@extends('librarian.layouts.layout')
@section('librarian_title')
    Manage Product
@endsection
@section('librarian_layout')
    <div class="card-style mb-30">
        <h6 class="mb-25">Manage Product</h6>
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
                            <th><h6>Product name</h6></th>
                            <th><h6>Price</h6></th>
                            <th><h6>Stocks</h6></th>
                            <th><h6>Slug</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td><p>{{$product->id}}</p></td>
                                <td><p>{{$product->product_name}}</p></td>
                                <td><p>{{$product->discounted_price}}</p></td>
                                <td><p>{{$product->stock_quantity}}</p></td>
                                <td><p>{{$product->slug}}</p></td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('show.product', $product->id) }}" class="btn btn-info me-2 text-white">
                                            Edit
                                        </a>
                                        <form action="{{ route('delete.product', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="text-muted">Currently, No Products Available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
