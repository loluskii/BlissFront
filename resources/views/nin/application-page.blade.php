@extends('nin.layout')


@section('content')
<div class="container" style="padding-top: 100px">
    <form action="{{ route('nin.submit') }}" method="POST">
        @csrf
        <h3>Section 1: NIN Service</h3>
        <p>Please select service. Kindly ensure that you select the same service location and centre. We open from
            9.30am in all service centres.</p>
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <select class="form-control" name="location" id="location">
                        <option>Select location</option>
                        @foreach ($locations as $location)
                        <option value={{ $location->id }}>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category" id="">
                        <option>Select category</option>
                        <option value="NIN Registration for Nigerians in Diaspora">NIN Registration for Nigerians in
                            Diaspora</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Service</label>
                    <select class="form-control" name="service" id="">
                        <option>Select service</option>
                        <option value="NIN Registration for Nigerians in Diaspora - Adult">NIN Registration for
                            Nigerians in Diaspora - Adult</option>
                        <option value="NIN Registration for Nigerians in Diaspora - Children">NIN Registration for
                            Nigerians in Diaspora - Children</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Service Center</label>
                    <select class="form-control" name="service_center_id" id="service_center">
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
                    <input type="date" class="form-control" name="booking_date" id="date" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Time Slot</label>
                    <select class="form-control" name="booking_time_id" id="time">
                    </select>
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
                    <input type="text" class="form-control" name="fname" id="" required aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="" required aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="" required aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Email</label>
                    <input type="text" class="form-control" name="c_email" id="" required aria-describedby="helpId"
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
                <button type="submit" id="submit" class="btn btn-lg btn-dark">Proceed to Payment</button>

            </div>
        </div>

    </form>
</div>
@endsection

@push('more_scripts')
<script>
    $(document).ready(function (){
        $('#location').on('change', function(){
            let location = $(this).val();
            $.ajax({
                url: "/get-location",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    location: location,
                },
                success: function(response) {
                    loadCenters(response.message);
                },
                error: function(response) {},
            })
        })

        function loadCenters(params) {
            $('#service_center').empty();
            $('#service_center').append('<option value="">Select a center...</option>');

            params.forEach(function(entry){
                $('#service_center').append('<option value="' + entry.id+ '">' + entry.service_center + '</option>');
            });
        }

        $('#date').on('change', function(){
            let date = $(this).val();
            $.ajax({
                url: "/get-time",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    date: date,
                },
                success: function(response) {
                    loadTimes(response.message);
                },
                error: function(response) {},
            })
        })

        function loadTimes(params) {
            $('#time').empty();
            $('#time').append('<option value="">Select a time slot...</option>');

            params.forEach(function(entry){
                $('#time').append('<option value="' + entry.id+ '">' + entry.time + '</option>');
            });
        }
    })
</script>
@endpush
