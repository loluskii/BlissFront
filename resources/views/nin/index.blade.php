
@extends('nin.layout')


@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 100px">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 mx-auto">
            <h1>Blissitech Hub Services</h1>
            <p>Please fill the form below and we will reach out to you as soon as possible</p>
            {{-- <button class="btn btn-dark btn-lg mt-3">Start Enrollment</button> --}}
        </div>

    </div>
</div>

<hr width="auto">
<section>
    <div class="container">
        <p>Please take note of the list of required documents for NIN Enrolment. NOTE YOU ARE REQUIRED TO BRING ONLY ONE OF THE LISTED DOCUMENTS ALONG WITH YOUR BVN IF YOU DO HAVE ONE</p>
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
            <p>Please select service. Kindly ensure that you select the same service location and centre. We open from
                9.30am in all service centres.</p>
            <div class="row mt-3">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control" name="category" id="">
                            <option>Select category</option>
                            <option value="NIN Registration for Adults">NIN Registration for Adults</option>
                            <option value="NIN Registration for Children">NIN Registration for Children (0-16 years)</option>
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
                        <option value="London - Golden Cross House, 8 Duncannon Street London, Greater London, WC2N 4JF United Kingdom">London - Golden Cross House, 8 Duncannon Street London, Greater London, WC2N 4JF United Kingdom</option>
                        <option value="London - Jennies Cash n Carry, 195 Newton Row Moorsom Street, B6 4NT, Birmingham">London - Jennies Cash n Carry, 195 Newton Row Moorsom Street, B6 4NT, Birmingham</option>
                        <option value="Scotland - 100 West George street, Glasgow, G2 1PP, GBR">Scotland - 100 West George street, Glasgow, G2 1PP, GBR</option>
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

