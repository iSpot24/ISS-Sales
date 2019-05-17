@extends('layouts.app')

@section('content')
<div class="card-body">

    <h2>Order Details</h2>

    <form method="post" class="topSpace" action="/order/product/{{Route::input('product.id')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="client_name" class="col-sm-3 col-form-label">Client Name</label>
            <div class="col-sm-9">
                <input id="clien_name" type="text" class="form-control @error('clien_name') is-invalid @enderror" name="client_name"
                       value="{{ old('client_name') }}" placeholder="Client Name" required autocomplete="client_name" autofocus>
                @error('client_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="client_address" class="col-sm-3 col-form-label">Client Address</label>
            <div class="col-sm-9">
                <input id="client_address" type="text" class="form-control @error('client_address') is-invalid @enderror" name="client_address"
                       value="{{ old('client_address') }}" placeholder="Client Address" required autocomplete="client_address" autofocus>
                @error('client_address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                       value="{{ Route::input('product.stock') }}" placeholder="Desired Quantity" required autocomplete="quantity" autofocus>
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-8">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
            <a class="btn float-right btn-outline-primary back-btn" href="/home"> Back </a>
        </div>
    </form>
</div>
    @include('messages.flashMessage');
@endsection