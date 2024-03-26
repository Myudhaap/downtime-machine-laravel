@extends('adminlte::page')

@section('title', 'Type Downtime')

@section('content_header')
    <h1>Add Type Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('type-downtime.store') }}" class="w-full">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop