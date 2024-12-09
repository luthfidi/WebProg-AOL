@extends('librarian.layouts.layout')
@section('librarian_title')
    Edit Product
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
    <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h6 class="mb-25">Edit Product</h6>
        <div class="input-style-1">
            <label for="product_name">Name of the Product</label>
            <input type="text" value="{{$product->product_name}}" name="product_name">
        </div>
        <div class="input-style-1">
            <label for="description">Description of the Store</label>
            <textarea rows="5" name="description">{{$product->description}}</textarea>
          </div>
          <div class="input-style-1">
            <label for="product_name">Upload Your Images</label>
            <input type="file" name="images[]" multiple>
        </div>
        <div class="input-style-1">
            <label for="sku">SKU</label>
            <input type="text" value="{{$product->sku}}" name="sku">
        </div>
        <livewire:category-subcategory/>
        <div class="select-style-1">
            <label for="store_id">Select A Store</label>
            <div class="select-position">
                <select name="store_id" id="store_id">
                    <option >Select a store</option>
                    @foreach ($stores as $store)
                    <option value="{{ $store->id }}"
                        {{ $store->id == $product->store_id ? 'selected' : '' }}>
                        {{ $store->store_name }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="input-style-1">
            <label for="regular_price">Regular Price</label>
            <input type="number" value="{{$product->regular_price}}" name="regular_price">
        </div>
          <div class="input-style-1">
            <label for="discounted_price ">Discounted Price (if any)</label>
            <input type="number" value="{{$product->discounted_price}}" name="discounted_price">
        </div>
          <div class="input-style-1">
            <label for="tax_rate ">Tax Rate (if any)</label>
            <input type="number" value="{{$product->tax_rate}}" name="tax_rate" value="0">
        </div>
          <div class="input-style-1">
            <label for="stock_quantity">Stock Quantity </label>
            <input type="number" value="{{$product->stock_quantity}}" name="stock_quantity">
        </div>
        <div class="input-style-1">
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{$product->slug}}">
        </div>
        <div class="input-style-1">
            <label for="meta_title">Meta Title</label>
            <input type="text" value="{{$product->meta_title}}" rows="5" name="meta_title"></input>
          </div>
          <div class="input-style-1">
            <label for="meta_description">Meta Description</label>
            <textarea rows="5" name="meta_description">{{$product->meta_description}}</textarea>
          </div>

          <button type="submit" class="main-btn primary-btn-light btn-hover">Edit Product</button>
    </form>
</div>
@endsection
