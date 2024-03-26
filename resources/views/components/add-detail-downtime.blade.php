<div class="bg-white shadow-m rounded-3 p-3 w-full">
    <h3>{{$downtime->id.'-'.$downtime->machine->machine_name}}</h3>
    <hr>
    <form id="formDetail">
        <input type="text" class="form-control" id="downtime_id" name="downtime_id" value="{{$downtime->id}}" hidden>
        <div class="mb-3">
          <label for="start_time" class="form-label">Start Time</label>
          <input type="time" class="form-control" name="start_time" id="start_time">
        </div>
        <div class="mb-3">
          <label for="end_time" class="form-label">End Time</label>
          <input type="time" class="form-control" name="end_time" id="end_time">
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">End Time</label>
          <select class="form-control" name="type" id="type">
            <option selected disabled>---Type Downtime---</option>
            @foreach ($typeDowntime as $val)
                <option value="{{$val['id']}}">{{$val['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" >
    </form>

    <div id="tableDetail" class="mt-3">
        <x-table-detail-downtime downtimeId="{{$downtime->id}}"/>
    </div>
</div>

<script>
        $(document).ready(function(){
    
            const clearForm = () => {
                $("#start_time").val("")
                $("#end_time").val("")
                $("#type").val("")
                $("#description").val("")
            }
    
            $("#formDetail").submit(function(e){
                e.preventDefault()
    
                const downtimeId = $("#downtime_id").val()
                const startTime = $("#start_time").val()
                const endTime = $("#end_time").val()
                const type = $("#type").val()
                const description = $("#description").val()
    
                $.ajax({
                    method: "POST",
                    url: "{{route('downtime-detail.store')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        downtimeId: downtimeId,
                        startTime: startTime,
                        endTime: endTime,
                        type: type,
                        description: description
                    },
                    success: function(res){
                        clearForm();
                        $("#tableDetail").html(res.html)
                    }
                })
            })
        })
</script>