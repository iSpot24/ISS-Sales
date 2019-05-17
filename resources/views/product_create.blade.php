@extends('layouts.app')

@section('content')
    <div class="card-body">

        <h2>Product Details</h2>

        <form method="post" class="topSpace" action="/product" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" placeholder="Product Name" required autocomplete="name" autofocus>
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
                           value="{{ old('price') }}" placeholder="Product Price" required autocomplete="price" autofocus>
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
                           value="{{ old('stock') }}" placeholder="Product Stock" required autocomplete="stock" autofocus>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-8">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
                <a class="btn float-right btn-outline-primary back-btn" href="/home"> Back </a>
            </div>
        </form>
    </div>
    @include('messages.flashMessage');
@endsection