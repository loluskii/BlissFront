@extends('layouts.app')

@section('css')
    <style>
        /**
         * store.css
         * Stripe Payments Demo. Created by Romain Huet (@romainhuet).
         */

        * {
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-text-size-adjust: none;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto,
                Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            font-size: 15px;
            line-height: 1.4em;
            color: #525f7f;
        }

        label {
            display: inline-block;
            margin-bottom: 0;
        }

        #payment-form {
            border-radius: 4px;
            border: 1px solid #e8e8fb;
        }


        */
        /* Overall Container */

        #main {
            width: 100%;
            height: 100vh;
            text-align: center;
            transition: width 0.3s ease-in-out;
        }

        #main.checkout:not(.success):not(.error) {
            width: calc(100% - 450px);
        }

        /* Checkout */

        #checkout {
            max-width: 480px;
            margin: 0 auto;

            /* opacity: 0; */
            transition: visibility 0s, opacity 0.5s linear 0.5s;
        }

        #main.checkout #checkout {
            visibility: visible;
            opacity: 1;
        }

        section {
            display: flex;
            flex-direction: column;
            position: relative;
            text-align: left;
        }

        h1 {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: 500;
        }

        h2 {
            margin: 15px 0;
            color: #32325d;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            font-size: 13px;
            font-weight: 500;
        }

        /* Payment Request */

        #payment-request {

            opacity: 0;
            min-height: 100px;
            padding: 20px 0;
            transition: visibility 0s, opacity 0.3s ease-in;
        }

        #payment-request.visible {
            visibility: visible;
            opacity: 1;
        }


        /* Form */

        fieldset {
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 1px 3px 0 rgba(50, 50, 93, 0.15),
                0 4px 6px 0 rgba(112, 157, 199, 0.15);
            border-radius: 4px;
            border: none;
            font-size: 0;
        }

        fieldset label {
            position: relative;
            display: flex;
            flex-direction: row;
            height: 42px;
            padding: 10px 0;
            align-items: center;
            justify-content: center;
            color: #8898aa;
            font-weight: 400;
        }

        fieldset label:not(:last-child) {
            border-bottom: 1px solid #f0f5fa;
        }

        fieldset label.state {
            display: inline-flex;
            width: 75%;
        }

        fieldset:not(.with-state) label.state {
            display: none;
        }

        fieldset label.zip {
            display: inline-flex;
            width: 25%;
            padding-right: 60px;
        }

        fieldset:not(.with-state) label.zip {
            width: 100%;
        }

        fieldset label span {
            min-width: 105px;
            padding: 0 15px;
            text-align: right;
        }

        fieldset .redirect label span {
            width: 100%;
            text-align: center;
        }

        .field {
            flex: 1;
            padding: 0 15px;
            background: transparent;
            font-weight: 400;
            color: #31325f;
            outline: none;
            cursor: text;
        }

        .field::-webkit-input-placeholder {
            color: #aab7c4;
        }

        .field::-moz-placeholder {
            color: #aab7c4;
        }

        .field:-ms-input-placeholder {
            color: #aab7c4;
        }

        fieldset .select::after {
            content: '';
            position: absolute;
            width: 9px;
            height: 5px;
            right: 20px;
            top: 50%;
            margin-top: -2px;
            background-image: url(/images/dropdown.svg);
            pointer-events: none;
        }

        input {
            flex: 1;
            border-style: none;
            outline: none;
            color: #313b3f;
        }

        select {
            flex: 1;
            border-style: none;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            color: #313b3f;
            cursor: pointer;
            background: transparent;
        }

        select:focus {
            color: #2b6f7d;
        }

        ::-webkit-input-placeholder {
            color: #cfd7e0;
        }

        ::-moz-placeholder {
            color: #cfd7e0;
            opacity: 1;
        }

        :-ms-input-placeholder {
            color: #cfd7e0;
        }

        input:-webkit-autofill,
        select:-webkit-autofill {
            -webkit-text-fill-color: #2b6f7d;
            transition: background-color 100000000s;
            -webkit-animation: 1ms void-animation-out 1s;
        }

        .StripeElement--webkit-autofill {
            background: transparent !important;
        }

        #card-element {
            margin-top: -1px;
        }

        button {
            display: block;
            background: #2b6f7d;
            color: #fff;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            border: 0;
            font-weight: 700;
            width: 100%;
            height: 50px;
            outline: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        button:focus {
            background: #2b6f7d;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 14px 0 rgba(50, 50, 93, 0.1),
                0 3px 6px 0 rgba(0, 0, 0, 0.08);
        }

        button:active {
            background: #2b6f7d;
        }

        #country {
            display: flex;
            align-items: center;
        }


        @media only screen and (max-width: 1024px) {
            #main.checkout:not(.success):not(.error) {
                width: calc(100% - 320px);
            }
        }

        @media only screen and (max-width: 800px) {
            #main.checkout:not(.success):not(.error) {
                width: 100%;
            }

            fieldset label span {
                min-width: 125px;
                padding: 0 15px;
                text-align: right;
            }

            #payment-form {
                border-radius: 4px;
                border: none;
            }
        }

        @media only screen and (max-width: 500px) {
            fieldset {
                margin-bottom: 15px;
            }

            fieldset label.state,
            fieldset label.zip {
                display: flex;
                width: inherit;
                padding: 10px 0;
            }

            #country::before {
                display: none;
            }

            #checkout {
                margin-bottom: 0;
            }

            fieldset label span {
                min-width: 75px;
                padding: 0 15px;
                text-align: right;
            }

            #payment-form {
                border-radius: 4px;
                border: none;
            }
        }

    </style>
@endsection

@section('content')
    <main id="main" class="loading">
        {{-- <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div id="checkout">
                    <h3>Payment Information</h3>
                    <form class="p-sm-4 p-2" id="payment-form" method="POST" action="{{ route('subscription.create', $plan->id) }}">
                    @csrf
                        <section>
                            <h2>Shipping Information</h2>
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <h5>{{ $order->shipping_fname }} {{ $order->shipping_lname }}</h5>
                                    <p class="mb-2">{{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
                                    <p class="mb-2">{{ $order->shipping_phone }}</p>
                                    <p class="mb-0">{{ $order->shipping_landmark }}</p>
                                </div>
                            </div>
                            <fieldset class="with-state">
                                <label>
                                    <span>Plan</span>
                                    <input name="plan" class="field" disabled value="{{ $plan->name }}">
                                </label>
                                <input type="hidden" name="amount" value="{{ $cartTotal }}">
                            </fieldset>
                        </section>
                        <section>
                            <div class="payment-info cards visible">
                                <fieldset>
                                    <label class="card_holder">
                                        <span>Name</span>
                                        <input name="card_holder_name" id="card_holder_name" class="field" required>
                                    </label>
                                    <label>
                                        <span>Card</span>
                                        <div id="card-element" class="field"></div>
                                    </label>
                                    <div id="card-errors" class="text-danger py-2 text-center" role="alert" style=""></div>
                                </fieldset>
                            </div>
                        </section>
                        <button class="payment-button" id="card-button" class="btn btn-dark" type="submit" data-secret="{{ $intent->client_secret }}" type="submit">Pay £{{ number_format($cartTotal,2) }} </button>
                    </form>
                    <div id="card-errors" class="element-errors"></div>
                    <div><img src="https://paymentsplugin.com/assets/blog-images/stripe-badge-transparent.png" class="img-fluid" srcset=""></div>
                </div>
            </div>
        </div>
    </div> --}}

        <div class="container py-5">
            <!-- For demo purpose -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                            class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Pay with
                                            Flutterwave </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#stripe" class="nav-link ">
                                            Pay with Stripe </a> </li>
                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- Flutterwave -->
                                <div id="flutterwave" class="tab-pane fade show active pt-3">
                                    <div class="card border-0 shadow-sm mb-4">
                                        <div class="card-body">
                                            <h5>{{ $order->shipping_fname }} {{ $order->shipping_lname }} |
                                                {{ $plan->name }}</h5>
                                            <p class="mb-2">{{ $order->shipping_address }},
                                                {{ $order->shipping_city }}</p>
                                            <p class="mb-2">{{ $order->shipping_phone }}</p>
                                            <p class="mb-0">{{ $order->shipping_landmark }}</p>
                                        </div>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('stripe.checkout') }}">
                                        @csrf
                                        <input type="hidden" name="amount" value="{{ $cartTotal }}">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name"
                                                required class="form-control "> </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Email</h6>
                                            </label>
                                            <input type="email" name="email" placeholder="Email" required
                                                class="form-control ">
                                        </div>
                                        <p> <button type="submit" class="btn btn-primary ">Continue</button> </p>
                                        <p class="text-muted"> Note: After clicking on the button, you will be directed
                                            to a secure gateway for payment. After completing the payment process, you will
                                            be redirected back to the website to view details of your order. </p>

                                    </form>
                                </div>

                                <!-- Stripe -->
                                <div id="stripe" class="tab-pane fade pt-3">
                                    <div class="card border-0 shadow-sm mb-4">
                                        <div class="card-body">
                                            <h5>{{ $order->shipping_fname }} {{ $order->shipping_lname }} |
                                                {{ $plan->name }}</h5>
                                            <p class="mb-2">{{ $order->shipping_address }},
                                                {{ $order->shipping_city }}</p>
                                            <p class="mb-2">{{ $order->shipping_phone }}</p>
                                            <p class="mb-0">{{ $order->shipping_landmark }}</p>
                                        </div>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('stripe.checkout') }}">
                                        @csrf
                                        <input type="hidden" name="amount" value="{{ $cartTotal }}">
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name"
                                                required class="form-control "> </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Email</h6>
                                            </label>
                                            <input type="email" name="email" placeholder="Email" required
                                                class="form-control ">
                                        </div>
                                        <p> <button type="submit" class="btn btn-primary ">Continue to Checkout</button> </p>
                                        <p class="text-muted"> Note: After clicking on the button, you will be directed
                                            to a secure gateway for payment. After completing the payment process, you will
                                            be redirected back to the website to view details of your order. </p>

                                    </form>


                                </div> <!-- End -->
                                <!-- Paypal info -->
                            </div>
                        </div>
                    </div>
                </div>
    </main>
    <!-- Stripe.js v3 for Elements -->
    </body>

    </html>
@endsection
@push('more_scripts')
    {{-- <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ env('STRIPE_KEY') }}', {
            locale: 'en'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        const cardHolderName = document.getElementById('card_holder_name');

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
                cardButton.textContent = "Pay"
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            cardButton.textContent = "Processing..."
            cardButton.disabled = true;
            stripe.handleCardSetup(clientSecret, cardElement, {
                    payment_method_data: {
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        // Send the token to your server.
                        stripeTokenHandler(result.setupIntent.payment_method);
                    }
                });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(paymentMethod) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', paymentMethod);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script> --}}
@endpush
