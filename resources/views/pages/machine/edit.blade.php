@extends('adminlte::page')

@section('title', 'Machine')

@section('content_header')
    <h1>Update Machine</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('machine.update',['id' => $data['id']]) }}" class="w-full">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="id" class="form-label">Id</label>
                  <input type="text" class="form-control" id="id" name="id" value="{{$data['id']}}" disabled>
                  <input type="text" class="form-control" id="id_hidden" name="id_hidden" value="{{$data['id']}}" hidden>
                </div>
                <div class="mb-3">
                  <label for="machine_name" class="form-label">Name Machine</label>
                  <input type="text" class="form-control" id="machine_name" name="machine_name" value="{{$data['machine_name']}}">
                </div>
                <div class="mb-3">
                  <label for="warehouse" class="form-label">Warehouse</label>
                  <select class="form-control" name="warehouse" id="status">
                    @foreach ($warehouse as $val)
                      <option class="text-center" value="{{$val['id']}}" {{$val['id'] == $data['warehouse_id'] ? 'selected' : ''}}>{{$val['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option class="text-center" value="Active" {{$data['status'] == 'Active' ? 'selected' : ''}}>Active</option>
                    <option class="text-center" value="Inactive" {{$data['status'] == 'Inactive' ? 'selected' : ''}}>Deactive</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop