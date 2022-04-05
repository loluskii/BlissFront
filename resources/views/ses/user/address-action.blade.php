<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.address.update', $item->id) }}" method="post">
                    @csrf
                    <div class="checkout_details_area clearfix">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="street_address">First Name</label>
                                <input type="text" class="form-control" name="shipping_fname" placeholder="First Name"
                                    value="{{ $item->shipping_fname }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Last Name</label>
                                <input type="text" class="form-control" name="shipping_lname" placeholder="Last Name"
                                    value="{{ $item->shipping_lname }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" name="shipping_street_address"
                                    placeholder="Street Address" value="{{ $item->shipping_address }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" name="shipping_city" placeholder="Town/City"
                                    value="{{ $item->shipping_city}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apartment_suite">Landmark</label>
                                <input type="text" class="form-control" name="shipping_landmark"
                                    placeholder="Apartment, suite, unit etc" value="{{ $item->shipping_landmark}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="shipping_state" placeholder="State"
                                    value="{{ $item->shipping_state}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="text" class="form-control" name="shipping_postcode"
                                    placeholder="Postcode / Zip" value="{{ $item->shipping_zipcode}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" name="shipping_phone_number" min="0"
                                    value="{{ $item->shipping_phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
