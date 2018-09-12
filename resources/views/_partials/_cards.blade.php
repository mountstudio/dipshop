<div class="row">
    @foreach($alcohols as $alcohol)
      <div class="col-3 mb-4">
        <div class="card hover-shadow transition-1000 px-4 pt-3 border-0">
            <img 
              class="card-img-top" 
              src="{{ asset('uploads/'.$alcohol->image) }}" 
              alt="Card image cap"
              height="400"
            >
            <div>
                <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                <div class="ml-auto text-muted">#21243</div>
            </div>
            <div class="card-body px-0 pb-0 pt-1 d-flex">
                <div class="card-title mr-auto">{{ $alcohol->name }}</div>
                <div class="card-title ml-auto font-weight-bold">{{ $alcohol->price }}$</div>
            </div>
            <div class="card-body px-0  text-center">
                <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
            </div>
        </div>
      </div>
    @endforeach
  </div>