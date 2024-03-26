@extends('adminlte::page')

@section('title', 'Warehouse')

@section('content_header')
    <h1>Update Warehouse</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('warehouse.update',['id' => $data['id']]) }}" class="w-full">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="id" class="form-label">Id</label>
                  <input type="text" class="form-control" id="id" name="id" value="{{$data['id']}}" disabled>
                  <input type="text" class="form-control" id="id_hidden" name="id_hidden" value="{{$data['id']}}" hidden>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Name Warehouse</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$data['name']}}">
                </div>
                <div class="mb-3">
                  <label for="location" class="form-label">Location</label> 
                  <input type="text" class="form-control" id="location" name="location" value="{{$data['location']}}">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1" {{$data['isActive'] == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$data['isActive'] == 0 ? 'selected' : ''}}>Deactive</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop