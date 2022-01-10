@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Watch List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="d-flex justify-content-between border">
                            <div class="col-2 p-3 fw-bold">Symbol</div>
                            <div class="col-3 p-3 fw-bold">Company Name</div>
                            <div class="col-3 p-3 fw-bold">Industry</div>
                            <div class="col-2 p-3 fw-bold">Exchange</div>
                            <div class="col-2 p-3 fw-bold">Action</div>
                        </div>
                    </div>
                    @foreach($symbols as $symbol)
                        <div class="row">
                            <div class="d-flex justify-content-between border text-truncate">
                                <div class="col-2 p-3 "><a target="_blank" href="https://finance.yahoo.com/quote/{{$symbol->symbol}}"> {{$symbol->symbol}}</a></div>
                                <div class="col-3 p-3 text-truncate" title="{{$symbol->name}}">{{$symbol->name}}</div>
                                <div class="col-3 p-3 text-truncate" title="{{$symbol->industry}}">{{$symbol->industry}}</div>
                                <div class="col-2 p-3">{{$symbol->exchange}}</div>
                                <div class="col-2 p-3"><watch-button symbol-id="{{$symbol->id}}" is-watched="{{isset($watching[$symbol->id])}}"></watch-button></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
