<div class="row">
	<div class="col-2 border-right border-light">
		<h5>Sort by: </h5>
		<h5 class="mt-4 pt-2">Filter by: </h5>
	</div>
	<div class="col">
		<div class="d-flex align-items-baseline pl-3">
			{{-- Price --}}
		  	<div id="price-wall-content">
		  		<div class="row align-items-center">
		  			<div class="col-1">Price: </div>
		  			<div class="input-group-sm col-3">
						<input type="text" class="form-control" aria-label="min" aria-describedby="inputGroup-sizing-sm" placeholder="min">	
					</div>
					<span>
						-
					</span>
					<div class="input-group-sm col-3">
						<input type="text" class="form-control" aria-label="max" aria-describedby="inputGroup-sizing-sm" placeholder="max">
			  		</div>
		  		</div>
		 	</div>

		 	{{-- Sort button group --}}
		 	<div class="btn-group btn-group-sm" role="group">
		 		<button type="button" class="btn btn-outline-dark">
		 			Order &nbsp; <i class="fas fa-sort-down"></i>
		 		</button>
		 		<button type="button" class="btn btn-outline-dark">
		 			Newest &nbsp; <i class="fas fa-sort-down"></i>
		 		</button>
		 		<button type="button" class="btn btn-outline-dark">
		 			Price &nbsp; <i class="fas fa-sort"></i>
		 		</button>
		 	</div>
		</div>
		<div class="d-flex my-3">
			<!-- Example single danger button -->
			<div class="dropdown dropdown-filter">
			  	<div class="btn bg-white dropdown-toggle">
			    Category
			  	</div>
			  	<div class="dropdown-menu pl-1" style="min-width: 2rem">
			  		<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Vodka</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="customCheck2">
						<label class="custom-control-label" for="customCheck2">Whiskey</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Wine</label>
					</div>
			  	</div>
			</div>
			<div class="dropdown dropdown-filter">
			  	<div class="btn bg-white dropdown-toggle">
			    Grade
			  	</div>
			  	<div class="dropdown-menu pl-1" style="min-width: 2rem">
			  		<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="gradeCheck1">
						<label class="custom-control-label" for="gradeCheck1">5%</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="gradeCheck2">
						<label class="custom-control-label" for="gradeCheck2">6%</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="gradeCheck3">
						<label class="custom-control-label" for="gradeCheck3">10%</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="gradeCheck4">
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
					  	<input type="checkbox" class="custom-control-input" id="maturaionCheck1">
						<label class="custom-control-label" for="maturaionCheck1">5 years</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="maturaionCheck2">
						<label class="custom-control-label" for="maturaionCheck2">10 years</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="maturaionCheck3">
						<label class="custom-control-label" for="maturaionCheck3">20 years</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="maturaionCheck4">
						<label class="custom-control-label" for="maturaionCheck4">80 years</label>
					</div>
					<div class="dropdown-item custom-control custom-checkbox">
					  	<input type="checkbox" class="custom-control-input" id="maturaionCheck5">
						<label class="custom-control-label" for="maturaionCheck5">100 years</label>
					</div>
			  	</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
    <script>
        $('.dropdown-filter').hover(
        	function() {
        		$(this).toggleClass('show')
        		$(this).find('.dropdown-menu').toggleClass('show')
        	}
    	)
    </script>
@endpush