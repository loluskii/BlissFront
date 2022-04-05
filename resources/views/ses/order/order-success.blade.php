@extends('layouts.app')


@section('content')
<div id="confirmation">
    <div class="row mt-5 pt-sm-5">
        <div class="col-10 mx-auto align-items-center justify-content-center">z
            <main class="pt-4">
                <div id="confirmation card">
                    <div class="status success card-body text-center">
                        <h1 style="color: #2A707D;">Thanks for your order! 🙂</h1>
                        <p>Woot! You successfully made a payment with Stripe.</p>
                        <p class="note">We just sent your receipt to your email address, and your items will be on their way shortly.</p>

                        <p><a href="/" class="btn btn-lg">Back to Home</a></p>
                    </div>

                </div>
            </main>
        </div>
    </div>



@endsection
