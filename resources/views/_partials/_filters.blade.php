<div class="row">
    <div class="col-2 border-right border-light">
        <h5>Sort by: </h5>
        <h5 class="mt-4 pt-2">Filter by: </h5>
    </div>
    <div class="col">
        <form action="/product/sort" method="POST">
            {{ csrf_field() }}
            <div class="d-flex align-items-baseline">
                <select
                        id="sortParam"
                        name="param"
                        class=" form-control
			  						form-control-sm 
			  						col-2 ml-3 
			  						custom-select 
			  						my-1 mr-sm-2"
                >
                    <option value="price" selected>Price</option>
                    <option value="order">Order</option>
                    <option value="newest">Newest</option>
                </select>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sort" value="asc" id="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Asc</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sort" value="desc" id="customRadioInline2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Desc</label>
                </div>

            </div>
            <div class="d-flex my-3">
                <!-- Example single danger button -->
                <select id="kind" name="kind" class=" form-control form-control-sm col-2 ml-3 custom-select my-1 mr-sm-2">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="dropdown dropdown-filter">
                    <div class="btn bg-white dropdown-toggle">
                        Grade
                    </div>
                    <div class="dropdown-menu pl-1" style="min-width: 2rem">
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="grade5" class="custom-control-input" id="gradeCheck1">
                            <label class="custom-control-label" for="gradeCheck1">5%</label>
                        </div>
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="grade6" class="custom-control-input" id="gradeCheck2">
                            <label class="custom-control-label" for="gradeCheck2">6%</label>
                        </div>
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="grade10" class="custom-control-input" id="gradeCheck3">
                            <label class="custom-control-label" for="gradeCheck3">10%</label>
                        </div>
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="grade15" class="custom-control-input" id="gradeCheck4">
                            <label class="custom-control-label" for="gradeCheck4">15%</label>
                        </div>
                    </div>
                </div>
                <div class="dropdown dropdown-filter">
                    <div class="btn bg-white dropdown-toggle">
                        Maturation
                    </div>
                    <div class="dropdown-menu pl-1" style="min-width: 2rem">
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="maturation5" class="custom-control-input" id="maturaionCheck1">
                            <label class="custom-control-label" for="maturaionCheck1">5 years</label>
                        </div>
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="maturation10" class="custom-control-input"
                                   id="maturaionCheck2">
                            <label class="custom-control-label" for="maturaionCheck2">10 years</label>
                        </div>
                        <div class="dropdown-item custom-control custom-checkbox">
                            <input type="checkbox" name="maturation20" class="custom-control-input"
                                   id="maturaionCheck3">
                            <label class="custom-control-label" for="maturaionCheck3">20 years</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Accept</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $('.dropdown-filter').hover(
            function () {
                $(this).toggleClass('show')
                $(this).find('.dropdown-menu').toggleClass('show')
            }
        );
    </script>
@endpush