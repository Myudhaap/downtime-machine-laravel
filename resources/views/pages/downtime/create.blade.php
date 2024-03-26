@extends('adminlte::page')

@section('title', 'Downtime')

@section('content_header')
    <h1>Add Downtime</h1>
@stop

@section('content')
    <div class="bg-white w-full p-3 shadow-sm rounded-3 my-4">
        <div>
            <form class="w-full" id="formDowntime">
                @csrf
                <input type="text" class="form-control" id="userId" name="userId" value="{{Auth::user()->id}}" hidden>

                <div class="mb-3">
                  <label for="date" class="form-label">Date Downtime</label>
                  <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="mb-3">
                  <label for="machine" class="form-label">Machine</label>
                  <select class="form-control" name="machine" id="machine">
                    <option selected disabled>-----Machine-----</option>
                    @foreach ($machine as $val)
                        <option value="{{$val['id']}}">{{$val['machine_name']}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" id="submitDowntime">Submit</button>
            </form>
        </div>
    </div>

    <div id="detailDowntime">

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $("#formDowntime").submit(function(e){
                e.preventDefault();

                const date = $("#date").val()
                const userId = $("#userId").val()
                const machineId = $("#machine").val()

                const formData = new FormData()
                formData.append("date", date)
                formData.append("userId", userId)
                formData.append("machineId", machineId)


                $.ajax({
                    method: "POST",
                    url: '{{route("downtime.store")}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        date: date,
                        userId: userId,
                        machineId: machineId
                    },
                    success: function(res){
                        $("#detailDowntime").html(res.html)
                        $("#date").prop("disabled", true)
                        $("#machine").prop("disabled", true)
                        $("#submitDowntime").prop("disabled", true)
                    }
                })
            })
        })
    </script>
@stop