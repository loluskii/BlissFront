@extends('layouts.app')

@section('content')
<div class="container" style="height: 90vh">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 my-auto">
            <div class="">
                <div class="text-center">
                    <p style="font-size: 25px; font-weight: bold">Create your Account<p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                  <label for=""><small>First Name</small></label>
                                  <input type="text" name="fname" id="" class="rounded-0 form-control form-control-lg @error('fname') is-invalid @enderror" required aria-describedby="helpId">
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for=""><small>Last Name</small></label>
                                    <input type="text" name="lname" id="" class="rounded-0 form-control form-control-lg @error('lname') is-invalid @enderror" required aria-describedby="helpId">
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                          <label for=""><small>Email Address</small></label>
                          <input type="email" name="email" id="" class="rounded-0 form-control form-control-lg @error('email') is-invalid @enderror" aria-describedby="helpId">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password"><small>Password</small></label>
                            <input type="password" name="password" class="rounded-0 form-control form-control-lg @error('password') is-invalid @enderror" required aria-describedby="helpId">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><small>Confirm Password</small></label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg rounded-0" name="password_confirmation" required >
                        </div>

                        <p><small>Creating an account means you’re okay with our Terms of Service and Privacy Policy.</small></p>

                        {{-- <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">


                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <p class="text-center">Already have an account?
                            <a class="text-center" href="{{ route('login') }}">
                               Sign In
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
