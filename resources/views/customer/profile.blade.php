@extends('customer.layouts.layout')
@section('customer_title')
EasyLib
@endsection
@section('customer_layout')
<div class="row d-flex justify-content-center">
    @foreach ($products as $product)
    <div class="col-12 col-md-4 mb-4">
        <div class="card">
            @if($product->images->first())
                <img src="{{ Storage::url('/' . $product->images->first()->img_path) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 200px;">
            @else
                <img src="{{ asset('default-product-image.jpg') }}" class="card-img-top" alt="Default Image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <a href="#" class="btn btn-primary mt-2">Rent Book</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
