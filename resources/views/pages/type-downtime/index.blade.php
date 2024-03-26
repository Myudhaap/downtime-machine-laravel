@extends('adminlte::page')

@section('title', 'Type Downtime')

@section('content_header')
    <h1>Type Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
        <div class="row pb-3 justify-content-end">
            <a href="{{ route('type-downtime.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success opacity-25" role="alert">
            {{session('success')}}
        </div>
        @endif

        <div class="row">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @forelse ($data as $val)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$val['name']}}</td>
                            <td class="row justify-content-center">
                                <a class="d-block btn btn-primary text-white" href="{{ url("/type-downtimes"."/".$val['id']) }}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="mx-2" method="POST" action="{{ route('type-downtime.destroy', ['id'=>$val['id']]) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger text-white" href=""><i class="fas fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Data Type Downtime tidak ada.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop