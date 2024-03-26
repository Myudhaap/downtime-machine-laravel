@extends('adminlte::page')

@section('title', 'Machine')

@section('content_header')
    <h1>Add Machine</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('machine.store') }}" class="w-full">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Machine Name</label>
                  <input type="text" class="form-control" id="machine_name" name="machine_name">
                </div>
                <div class="mb-3">
                  <label for="warehouse" class="form-label">Warehouse</label>
                  <select class="form-control" name="warehouse" id="warehouse">
                    <option class="text-center" selected disabled>-----Select Warehouse-----</option>
                    @foreach ($warehouse as $val)
                      <option class="text-center" value="{{$val['id']}}">{{$val['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option class="text-center" selected disabled>-----Select Status-----</option>
                    <option class="text-center" value="Active">Active</option>
                    <option class="text-center" value="Inactive">Deactive</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop