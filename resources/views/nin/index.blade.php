
@extends('nin.layout')


@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 100px">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h1>NIN Pre-enrollment Form</h1>
            {{-- <button class="btn btn-dark btn-lg mt-3">Start Enrollment</button> --}}
        </div>
        <div class="col-md-6">
            <img src="{{ secure_asset('images/nigerian-nin-card.jpeg') }}" class="img-fluid" alt="" srcset="">
        </div>
    </div>
</div>

<hr width="auto">
<section>
    <div class="container">
        <h1>Booking Form</h1>
        <p>Please take note of the list of required documents for NIN Enrolment. NOTE YOU ARE REQUIRED TO BRING ONLY ONE OF THE LISTED DOCUMENTS ALONG WITH YOUR BVN IF YOU DO HAVE ONE</p>
        <ul>
            <li>Nigerian International Passport (Valid or Expired)</li>
            <li>Nigerian Birth Certificate</li>
            <li>Attestation Letter from Nigerian Embassy / Mission</li>
            <li>Government ID for staff of FGN</li>
            <li>BVN number (if you have any)you must bring it along with you</li>
        </ul>
        <a href="{{ route('nin.apply') }}" class="btn btn-lg btn-dark">Proceed to Application</a>
    </div>
</section>
@endsection
