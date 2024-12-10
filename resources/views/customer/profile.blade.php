@extends('customer.layouts.layout')
@section('customer_title')
    EasyLib
@endsection
@section('customer_layout')
    <div class="row d-flex justify-content-center">
        @foreach ($products as $product)
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    @if ($product->images->isNotEmpty())
                    @php
                        $imagePath = $product->images->first()->img_path;
                    @endphp

                    @if (filter_var($imagePath, FILTER_VALIDATE_URL))
                        <!-- If the image path is a URL -->
                        <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 250px; object-fit:cover;">
                    @else
                        <!-- If the image path is a local storage path -->
                        <img src="{{ Storage::url('/' . $imagePath) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 250px;object-fit:cover;">
                    @endif
                @else
                    <img src="{{ asset('default-product-image.jpg') }}" class="card-img-top" alt="Default Image" style="height: 250px;object-fit:cover;">
                @endif
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 250px; overflow: hidden;">
                        <h6 class="card-title" style="height: 39px">{{ $product->product_name }}</h6>
                        <p class="card-text">{{ Str::words($product->description, 15, '...') }}</p>
                        <a href="{{ route('show.dashboard', $product->id) }}" class="btn btn-primary mt-2">Rent Book</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
