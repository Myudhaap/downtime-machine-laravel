@extends('adminlte::page')

@section('title', 'Downtime')

@section('content_header')
    <h1>Edit Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3 my-4">
        <div>
            <form class="w-full" id="formDowntime">
                @csrf
                <input type="text" class="form-control" id="userId" name="userId" value="{{Auth::user()->id}}" hidden>

                <div class="mb-3">
                  <label for="date" class="form-label">Date Downtime</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{$data['date']}}" disabled>
                </div>
                <div class="mb-3">
                  <label for="machine" class="form-label">Machine</label>
                  <select class="form-control" name="machine" id="machine" disabled>
                    @foreach ($machine as $val)
                        <option value="{{$val['id']}}" {{$data['machine_id'] == $val['id'] ? 'selected' : ''}}>{{$val['machine_name']}}</option>
                    @endforeach
                  </select>
                </div>
            </form>
        </div>
    </div>

    <div id="detailDowntime">
        <x-add-detail-downtime dowtimeId="{{$data['id']}}"/>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop