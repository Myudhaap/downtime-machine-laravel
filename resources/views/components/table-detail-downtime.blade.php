<div class="w-full">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Type Downtime</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Description</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $count = 1 ?>
            @forelse ($downtimeDetail as $val)
            <tr>
                <th scope="row">{{$count++}}</th>
                <th scope="col">{{$val->typeDowntime->name}}</th>
                <th scope="col">{{$val->start_time}}</th>
                <th scope="col">{{$val->end_time}}</th>
                <th scope="col">{{$val->description}}</th>
                <td class="row justify-content-center">
                    <button data-id="{{$val['id']}}" class="btn btn-danger text-white formDelete"><i class="fas fa-trash"></i>Delete</button>
                </td>
            </tr>   
            @empty
                <tr>
                    <th colspan="6" class="text-center">Data Detail Downtime tidak ada.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        let deleteBtn = document.querySelectorAll(".formDelete");
        deleteBtn.forEach(function(el){
            el.addEventListener("click", function(){
                let downtimeId = $(this).data("id")

                $.ajax({
                    method: "DELETE",
                    url: "/downtime-details/"+downtimeId,
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(res){
                        $("#tableDetail").html(res.html)
                    }
                })
            })
        })
    })
    
</script>