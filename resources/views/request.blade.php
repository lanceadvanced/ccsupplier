@php
    $defaults = [
        'uri' => env('EXAMPLE_URL'),
        'token' => env('EXAMPLE_TOKEN'),
        'reference' => env('EXAMPLE_REFERENCE'),
    ]
@endphp
@extends('layout')
@section('content')
    <h1 class="ms-3 mt-3">Send example request as supplier</h1>
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-sm-6">
                <form class="p-3" method="post" action="{{route('sendExampleRequest')}}">
                    @csrf
                    <label for="uri">URI: </label>
                    <input class="form-control" type="text" name="uri" id="uri" value="{{$defaults['uri']}}">
                    @foreach($errors->get('uri') as $error)
                        {{$error}}<br>
                    @endforeach
                    <br>
                    <label for="token">Token: </label>
                    <input class="form-control" type="text" name="token" id="token" value="{{$defaults['token']}}">
                    @foreach($errors->get('token') as $error)
                        {{$error}}<br>
                    @endforeach
                    <br>
                    <label for="reference">Product reference: </label>
                    <input class="form-control" type="text" name="reference" id="reference" value="{{$defaults['reference']}}">
                    @foreach($errors->get('reference') as $error)
                        {{$error}}<br>
                    @endforeach
                    <br>
                    <label class="form-check-label" for="onlyResponseData">Only show example response &nbsp;</label>
                    <input class="form-check-input" type="checkbox" name="onlyResponseData" id="onlyResponseData">
                    <br>
                    <br>
                    <input type="submit" value="Send request" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

