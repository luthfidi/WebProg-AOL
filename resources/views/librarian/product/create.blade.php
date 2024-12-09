@extends('librarian.layouts.layout')
@section('librarian_title')
Add Product
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
    <form action="{{ route('librarian.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h6 class="mb-25">Add Product</h6>
        <div class="input-style-1">
            <label for="product_name">Name of the Product</label>
            <input type="text" placeholder="Product Name" name="product_name">
        </div>
        <div class="input-style-1">
            <label for="description">Description of the Store</label>
            <textarea placeholder="Description" rows="5" name="description"></textarea>
          </div>
          <div class="input-style-1">
            <label for="product_name">Upload Your Images</label>
            <input type="file" name="images[]" multiple>
        </div>
        <div class="input-style-1">
            <label for="sku">SKU</label>
            <input type="text" placeholder="Product SKU" name="sku">
        </div>
        <livewire:category-subcategory/>
        <div class="select-style-1">
            <label for="store_id">Select A Store</label>
            <div class="select-position">
                <select name="store_id" id="store_id">
                    <option >Select a store</option>
                    @foreach ($stores as $store)
                    <option value="{{$store->id}}">{{$store->store_name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="input-style-1">
            <label for="regular_price">Regular Price</label>
            <input type="number" placeholder="Input price" name="regular_price">
        </div>
          <div class="input-style-1">
            <label for="discounted_price ">Discounted Price (if any)</label>
            <input type="number" placeholder="Discounted price" name="discounted_price">
        </div>
          <div class="input-style-1">
            <label for="tax_rate ">Tax Rate (if any)</label>
            <input type="number" placeholder="Tax rate" name="tax_rate" value="0">
        </div>
          <div class="input-style-1">
            <label for="stock_quantity">Stock Quantity </label>
            <input type="number" placeholder="Input price" name="stock_quantity">
        </div>
        <div class="input-style-1">
            <label for="slug">Slug</label>
            <input type="text" name="slug" placeholder="slug-name">
        </div>
        <div class="input-style-1">
            <label for="meta_title">Meta Title</label>
            <input type="text" placeholder="Title" rows="5" name="meta_title"></input>
          </div>
          <div class="input-style-1">
            <label for="meta_description">Meta Description</label>
            <textarea placeholder="Description" rows="5" name="meta_description"></textarea>
          </div>

          <button type="submit" class="main-btn primary-btn-light btn-hover">Add Product</button>
    </form>
</div>

@endsection
