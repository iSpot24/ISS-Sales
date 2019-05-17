@extends('layouts.app')

@section('content')
    <div class="card-body">
        <h2>Product Details</h2>

        <form method="post" class="topSpace" action="/product/{{ Route::input('product.id') }}"
              enctype="multipart/form-data"
              id="#edit_form">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ Route::input('product.name') }}" placeholder="Product Name" required
                           autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                           value="{{ Route::input('product.price') }}" placeholder="Product Price" required
                           autocomplete="price" autofocus>

                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-9">
                    <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock"
                           value="{{ Route::input('product.stock') }}" placeholder="Product Stock" required
                           autocomplete="stock" autofocus>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-1">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>

            </div>
        </form>

        <form method="post" action="/product/{{ Route::input('product.id') }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')

            <div class="deleteButton">
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete Product: {{ $product->name }}?')">
                    Delete Product
                </button>
            </div>
            <div class="margin-top-negative-35">
            <a class="btn float-right btn-outline-primary back-btn" href="{{ route('home') }}"> Back </a>
            </div>
        </form>
    </div>
    @include('messages.flashMessage');
@endsection