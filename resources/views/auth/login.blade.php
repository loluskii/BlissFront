@extends('layouts.app')
@section('title')
Sign In
@endsection
@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container" style="height: 80vh;">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 my-auto">
            <div class="">
                <div class="text-center">
                    <p style="font-size: 25px; font-weight: bold;">Sign in to your Account</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                          <label for=""><small>Email Address</small></label>
                          <input type="email" name="email" class="rounded-0 form-control form-control-lg @error('email') is-invalid @enderror" required aria-describedby="helpId">
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
                        <div class="form-row">
                            <div class="col">
                                @if (Route::has('password.request'))
                                    <a class="rounded-0 btn btn-link" style="float: right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <p class="mt-2 text-center">Don't have an account?
                            <a class="text-center" href="{{ route('register') }}">
                               Register
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
