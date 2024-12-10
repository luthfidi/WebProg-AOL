@extends('customer.layouts.layout')

@section('customer_title')
    {{$books->product_name}}
@endsection

@section('customer_layout')
@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-5">
    <!-- Back Button -->
    <button onclick="window.history.back()" class="btn btn-primary mb-3">Back</button>

    <div class="row">
        <!-- Product Image Section -->
        <div class="col-md-4">
            @if ($books->images->isNotEmpty())
                @php
                    $imagePath = $books->images->first()->img_path;
                @endphp

                @if (filter_var($imagePath, FILTER_VALIDATE_URL))
                    <!-- If the image path is a URL -->
                    <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $books->product_name }}">
                @else
                    <!-- If the image path is a local storage path -->
                    <img src="{{ Storage::url('/' . $imagePath) }}" class="card-img-top" alt="{{ $books->product_name }}">
                @endif
            @else
                <img src="{{ asset('default-product-image.jpg') }}" class="card-img-top" alt="Default Image">
            @endif
        </div>

        <!-- Product Details Section -->
        <div class="col-md-8">
            <h1>{{ $books->product_name }}</h1>
            <p><strong>Description:</strong> {{ $books->description }}</p>
            <p><strong>SKU:</strong> {{ $books->sku }}</p>
            <p><strong>Category:</strong> {{ $books->category ? $books->category->category_name : 'Anonymous' }}</p>
            <p><strong>Subcategory:</strong> {{ $books->subcategory ? $books->subcategory->subcategory_name : 'Anonymous' }}</p>
            <p><strong>Store:</strong> {{ $books->store ? $books->store->store_name : 'Anonymous' }}</p>
            <p><strong>Librarian:</strong> {{ $books->librarian ? $books->librarian->name : 'Anonymous' }}</p>
            <p><strong>Regular Price:</strong> ${{ number_format($books->regular_price, 2) }}</p>

            @if($books->discounted_price)
                <p><strong>Discounted Price:</strong> ${{ number_format($books->discounted_price, 2) }}</p>
            @endif

            <p><strong>Tax Rate:</strong> {{ $books->tax_rate }}%</p>
            <p><strong>Stock Quantity:</strong> {{ $books->stock_quantity }}</p>
            <p><strong>Stock Status:</strong> {{ $books->stock_status }}</p>
            <p><strong>Visibility:</strong> {{ $books->visibility ? 'Visible' : 'Hidden' }}</p>
            <p><strong>Meta Title:</strong> {{ $books->meta_title ?? 'Anonymous' }}</p>
            <p><strong>Meta Description:</strong> {{ $books->meta_description ?? 'Anonymous' }}</p>
            <p><strong>Status:</strong> {{ $books->status }}</p>
            <p><strong>Slug:</strong> {{ $books->slug }}</p>
        </div>
    </div>

    <!-- Product Purchase Section -->
    <div class="mt-4">
        <form action="{{ route('dashboard.rent', $books->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Rent this Book</button>
        </form>
    </div>
</div>

@endsection
