@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-md-6 mx-auto">
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <form method="POST" action="">
                        <div class="top mb-4">
                            <h3>Get in Touch</h3>
                            <p>Having problems? Send us a message and we'll reach out to you as soon as possible.</p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="email" type="text" name="email" placeholder="Email">
                        </div>

                        <div class="form-group" data-validate = "Phone is required">
                            <input class="form-control" id="phone" type="text" name="phone" placeholder="Phone">
                        </div>

                        <div class="form-group" data-validate = "Message is required">
                            <textarea class="form-control" name="message" placeholder="Your message..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Send Email
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

{{-- <script src="{{ secure_asset('js/app.js') }}"></script> --}}
<!--===============================================================================================-->
<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>

@endsection
