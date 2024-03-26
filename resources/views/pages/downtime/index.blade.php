@extends('adminlte::page')

@section('title', 'Downtime')

@section('content_header')
    <h1>Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3">
        <div class="row pb-3 justify-content-end">
            <a href="{{ route('downtime.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
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
                    <th scope="col">Machine Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Downtime</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @forelse ($data as $val)
                    <tr>
                        <th scope="row">{{$count++}}</th>
                        <td>{{$val->machine->machine_name}}</td>
                        <td>{{$val->user->username}}</td>
                        <td>{{$val->date}}</td>
                        <td>{{$val->date}}</td>
                        <td class="row justify-content-center">
                            <button class="d-block btn btn-primary text-white show mx-2" data-id="{{$val['id']}}"><i class="fas fa-eye"></i>Show</button>
                            <div>
                                <a class="d-block btn btn-primary text-white" href="{{ url("/downtimes"."/".$val['id']) }}"><i class="fas fa-edit"></i>Edit</a>
                            </div>
                            <form class="mx-2" method="POST" action="{{ route('downtime.destroy', ['id'=>$val['id']]) }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger text-white" href=""><i class="fas fa-trash"></i>Delete</button>
                            </form>
                        </td>
                    </tr>   
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">Data Downtime tidak ada.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="tableDetail" class="bg-white mt-3 shadow-m">
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function(){

        const shows = document.querySelectorAll(".show")
        shows.forEach(function(el){
            el.addEventListener("click", function(e){
                const downtimeId = $(this).data('id')

                $.ajax({
                method: "GET",
                url: "/downtime-details/"+downtimeId,
                success: function(res){
                    $("#tableDetail").html(res.html)
                }
            })
            })
        })
    })
    </script>
@stop