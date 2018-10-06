<div class="container my-5">
    <div class="col-12">
        <form class="my-2 w-50 my-lg-0 ml-auto mr-auto">
            <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search..." aria-label="Search">
        </form>
    </div>
</div>

<div class="container">
    <div class="row" id="search-results"></div>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function(){
            let container = $('#search-results');
            let value = $(this).val();

            if (value !== '') {
                $.ajax({
                    type: 'get',
                    url: '{{ route('search')  }}',
                    data: {'search': value},
                    success: function (data) {
                        container.html(data);
                    }
                })
            } else {
                container.empty();
            }
        });
    </script>
@endpush
