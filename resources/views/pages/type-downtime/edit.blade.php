@extends('adminlte::page')

@section('title', 'Type Downtime')

@section('content_header')
    <h1>Update Type Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('type-downtime.update',['id' => $data['id']]) }}" class="w-full">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="id" class="form-label">Id</label>
                  <input type="text" class="form-control" id="id" name="id" value="{{$data['id']}}" disabled>
                  <input type="text" class="form-control" id="id_hidden" name="id_hidden" value="{{$data['id']}}" hidden>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Type Downtime</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$data['name']}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop