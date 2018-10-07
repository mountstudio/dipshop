<div class="d-flex  flex-row h-50">
    <span id="search-box" class="collapse input-group-sm">
        <input class="form-control d-inline-flex" style="height: calc(1.68125rem + 5px);" type="search" id="search" placeholder="Search..." aria-label="Search">
    </span>
    <button class="btn btn-outline-light border-0 btn-sm mt-1 ml-2 align-top" type="button" data-toggle="collapse" data-target="#search-box" aria-expanded="false" aria-controls="search-box">
        <i class="fas fa-search"></i>
    </button>
    <div class="position-absolute" style="top: 33px" id="result">

    </div>
</div>


{{--<div class="container">--}}
    {{--<div class="row" id="search-results"></div>--}}
{{--</div>--}}

@push('scripts')
    <script type="text/javascript">
        let result = $('#result');
        $('#search').on('keyup', function(){
            // let container = $('#search-results');
            let value = $(this).val();

            if (value !== '') {
                $.ajax({
                    type: 'get',
                    url: '{{ route('search')  }}',
                    data: {'search': value},
                    success: function (data) {
                        // container.html(data);
                        result.html(data)
                    }
                })
            } else {
                // container.empty();
                result.empty();
            }
        });
        $('#search-box').on('hide.bs.collapse', function () {
            result.empty();
        });

    </script>
@endpush