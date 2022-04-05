@extends('nin.layout')


@section('content')
<div class="container" style="padding-top: 100px">
    <form action="">
        @csrf
        <h3>Section 1: NIN Service</h3>
        <p>Please select service. Kindly ensure that you select the same service location and centre. We open from 9.30am in all service centres.</p>
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <select class="form-control" name="location" id="">
                        <option value="1">1 to 3 Atwell Rd, Off Rye Lane, Peckham, London SE15 4TW</option>
                        <option value="2">Suite G/1, Park Lane House, 47 Broad Street, Glasgow G40 2QW</option>
                        <option value="3">OlReliance Freight UK Ltd, Unit 9 17 Argall Avenue, London E10 7QE</option>
                        <option value="5">277A Green Street (2nd Floor), Daminis Mall (Opposit East Shopping Mall)
                            London E7 8LJ.</option>
                        <option value="7">Peepul Centre Orchardson Avenue LE4 6DP</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category" id="">
                        <option value="0">Select category</option>
                        <option value="2">NIN Registration for Nigerians in Diaspora</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Service</label>
                    <select class="form-control" name="service" id="">
                        <option value="0">Select service</option>
                        <option value="1">NIN Registration for Nigerians in Diaspora - Adult</option>
                        <option value="2">NIN Registration for Nigerians in Diaspora - Children</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Service Center</label>
                    <select class="form-control" name="service_center" id="">
                        <option value="0">Eh-Led Resources Argall Avenue</option>
                        <option value="5">Ehled Global Resources Limited</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <h3>Section 2: Your Time Slot</h3>
        <p>Please select a date and time slot to proceed with booking.</p>
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Time Slot</label>
                    <input type="time" class="form-control" name="time" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
        </div>
        <br>
        <h3>Section 3: Your Details</h3>
        <p>Please provide your details in the form below to proceed with booking.</p>
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Email</label>
                    <input type="text" class="form-control" name="c_email" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                  <label for="" class="form-label">Additional Notes</label>
                  <textarea class="form-control" name="notes" id="" rows="3"></textarea>
                </div>
            </div>
        </div>
        <br>
        <h3>Section 4: Payment</h3>
        <div class="row mt-3">
            <div class="col">
                <p>Payment is required for this service at a total fee of £40. Are you willing to proceed?</p>
                <a href="" class="btn btn-lg btn-dark">Proceed to Payment</a>
            </div>
        </div>

    </form>
</div>
@endsection
2
