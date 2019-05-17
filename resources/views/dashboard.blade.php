@extends('layouts.app')

@section('content')
    <div class="card-body">
        @if(Auth::guest())
            <a href="/login" class="btn btn-primary">login</a>
        @endif
        @if(Auth::check())
            @if(Auth::user()->role->id == \App\Role::findOrFail(2)->id)
                <a class="btn btn-outline-primary float-right" href="/product"> Add New Product </a>
            @endif
            <form action="/search" method="GET" role="search">
                @csrf
                <div class="input-group col-sm-5 noPaddingLeft">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search products">
                    <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">
                <span> Search </span>
            </button>
                        <button class="btn btn-secondary" onclick="$('form').reset();" name="reset">
                            <span> Reset </span>
                        </button>
            </span>
                </div>
            </form>
            <table class="table table-bordered table-striped mb-none topSpace" id="datatables_default">

                <thead>
                <tr>
                    <th> @sortablelink('name')</th>
                    <th> @sortablelink('price')</th>
                    <th> @sortablelink('stock')</th>
                    <th style="color:#3490dc">Actions</th>
                </tr>
                </thead>

                @if(!empty($products))
                    <tbody>

                    @foreach($products as $product)
                        <tr class="gradeX">
                            <td>
                                <a @if(Auth::user()->role->id == \App\Role::findOrFail(2)->id)
                                   href="/product/{{ $product->id }}" title="Edit"
                                   @else
                                   href="order/product/{{ $product->id }}" title="Order"
                                   @endif
                                   data-toggle="tooltip" data-placement="top"> {{ $product->name }}
                                </a>
                            </td>
                            <td> {{ $product->price }} </td>
                            <td> {{ $product->stock }} </td>
                            <td>
                                @if($product->stock > 0)
                                    <span>
                                        <a class="fas fa-truck noPaddingLeft"
                                           href="/order/product/{{$product->id}}"
                                           data-toggle="tooltip" data-placement="top" title="Order">
                                        </a>
                                    </span>
                                @endif
                                @if(Auth::user()->role->id == \App\Role::findOrFail(2)->id)
                                    <span>
                                        <a class="fas fa-edit" href="/product/{{$product->id}}"
                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                        </a>
                                    </span>
                                    <span>
                                        @csrf
                                        <a class="fas fa-trash-alt" id="{{ $product->id }}"
                                           onclick="return confirm('Are you sure you want to delete Product: {{ $product->name }}?')"
                                           href="{{ action('HomeController@delete', ['id' => $product->id]) }}"
                                           data-toggle="tooltip" data-placement="top" title="Delete">
                                        </a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                    <tr class="gradeX">
                        <td> Unfortunatelly there are no Products to order right now...</td>
                    </tr>
                    </tbody>
                @endif

                @include('messages.flashMessage')

                <div class="customPagination">
                    {!! $products->appends(\Request::except('page'))->render() !!}
                </div>
            </table>
        @endif
    </div>
@endsection

