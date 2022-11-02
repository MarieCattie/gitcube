@extends('layouts.index')

@section('title', 'error')

@section('main')
    <div class="container container-row">
        <h2 style="padding: 5vh 2vw;">{{$error}}</h2>
    </div>
@endsection
