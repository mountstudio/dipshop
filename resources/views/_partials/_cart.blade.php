    <a href="#" class="nav-link text-light position-relative font-weight-light cart" data-toggle="modal" data-target="#cartModal" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="badge badge-pill badge-light position-absolute" id="cart-qty" style="top: 0; right: -7px;">0</span>
    </a>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartleModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="shadow cart-result" id="cart-result" style="left: -70px!important;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
