@extends('layout')
@section('content')
    <code style="white-space: pre">{{json_encode($response, JSON_PRETTY_PRINT)}}</code>
@endsection
