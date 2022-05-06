@extends('nin.layout')


@section('content')

<section>
    <div class="container">
        <p>Please take note of the list of required documents for any desired service. We open from 9.30am - 4pm, Monday
            to Friday in all service centres.</p>
        <ul>
            <li>Nigerian International Passport (Valid or Expired)</li>
            <li>Nigerian Birth Certificate</li>
            <li>Attestation Letter from Nigerian Embassy / Mission</li>
            <li>Government ID for staff of FGN</li>
            <li>BVN number (if you have any)you must bring it along with you</li>
        </ul>
        {{-- <a href="{{ route('nin.apply') }}" class="btn btn-lg btn-dark">Proceed to Application</a> --}}
        <form action="{{ route('nin.submit') }}" method="POST">
            @csrf

            <h2>Section 1</h2>
            <p>Please select service.</p>
            <div class="row mt-3">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control" name="category" id="">
                            <option>Select category</option>
                            <option value="NIN Registration for Adults">NIN Registration for Adults</option>
                            <option value="NIN Registration for Children">NIN Registration for Children (0-15 years)
                            </option>
                            <option value="New Passport for Adults">New Passport for Adults</option>
                            <option value="New Passport for Children">New Passport for Children</option>
                            <option value="Passport Renewal for Adult">Passport Renewal for Adult</option>
                            <option value="Passport Renewal for Children">Passport Renewal for Children</option>
                            <option value="Visa for Adults">Visa for Adults</option>
                            <option value="Visa for Children">Visa for Children</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Service</label>
                        <select class="form-control" name="service" id="">
                            <option>Select service</option>
                            <option value="NIN Registration">NIN Registration </option>
                            <option value="Passport Services">Passport Services</option>
                            <option value="Passport Services">Visa Services</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Service Center</label>
                        <select class="form-control" name="service_center" id="service_center">
                            <option value="">Select Service Center</option>
                            <option
                                value="London - Golden Cross House, 8 Duncannon Street London, Greater London, WC2N 4JF United Kingdom">
                                London - Golden Cross House, 8 Duncannon Street London, Greater London, WC2N 4JF United
                                Kingdom</option>
                            <option
                                value="London - Jennies Cash n Carry, 195 Newton Row Moorsom Street, B6 4NT, London">
                                London - Jennies Cash n Carry, 195 Newton Row Moorsom Street, B6 4NT, London</option>
                            <option value="Scotland - 100 West George street, Glasgow, G2 1PP, GBR">Scotland - 100 West
                                George street, Glasgow, G2 1PP, GBR</option>
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
                        <input type="date" class="form-control" name="booking_date" id="date" aria-describedby="helpId"
                            placeholder="">
                        <small>Please note that we don't open on weekends</small>
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
                        <input type="text" class="form-control" name="fname" id="" required aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="" required aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="" required aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_no" id="" required aria-describedby="helpId"
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
            <button type="submit" id="submit" class="btn btn-lg btn-dark">Submit</button>
        </form>
    </div>
</section>
@endsection

@push('more_scripts')
<script>
    $(document).ready(function (){
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
        });



        function loadTimes(params) {
            $('#time').empty();
            $('#time').append('<option value="">Select a time slot...</option>');

            params.forEach(function(entry){
                $('#time').append('<option value="' + entry.time+ '">' + entry.time + '</option>');
            });
        }


        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#date').attr('min', maxDate);
    })
</script>
@endpush
