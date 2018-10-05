<div class="container my-5">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="container">
    <div class="row" id="search-resalts"></div>
</div>

@push('scripts')
    <script> type="text/javascript"
        $('#search').on('keyup', function(){
           $value = $(this).val();
           $.ajax({
               type : 'get',
               url  : '{{ URL::to('search')  }}',
               data : {'search': $value},
               success : function(data) {
                   console.log(data);
                   $('#search-resalts').html(data)
               }
           })
        });
    </script>
@endpush
