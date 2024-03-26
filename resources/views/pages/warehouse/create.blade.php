@extends('adminlte::page')

@section('title', 'Warehouse')

@section('content_header')
    <h1>Add Warehouse</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
            <form method="POST" action="{{ route('warehouse.store') }}" class="w-full">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name Warehouse</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option selected disabled>-----Status-----</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
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