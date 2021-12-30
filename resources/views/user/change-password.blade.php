@extends('layouts.app')


@section('css')
<style>
.field-icon {
    float: right;
    margin-right: 10px;
    margin-top: -30px;
    position: relative;
    z-index: 2;
    color: grey;
}
</style>
@endsection


@section('content')
<div class="container">
    <div class="row vh-100">
        @include('user.side-nav')
        <div class="col-md-9">
            <div class="card border-0 right">
                <div class="card-body">
                    <h3>Edit your password</h3>
                    <p>Update your current password</p>
                    <form action="{{ route('user.update.password') }}" method="POST" class="py-4">
                        @csrf
                        @if (auth()->user()->password != '')
                            <div class="form-group">
                                <label for="">CURRENT PASSWORD</label>
                                <input type="password" name="current_password"x class="form-control" placeholder="Old Password" aria-describedby="helpId">
                                {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                                @error('current_password')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">NEW PASSWORD</label>
                            <input type="password" name="new_password" id="password" class="form-control" placeholder="New Password" aria-describedby="helpId">
                            <span toggle="#password-field" id="togglePassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('new_password')
                                <b class="text-danger">{{ $message }} </b>
                            @enderror
                        </div>
                        <div class="py-3">
                            <button type="submit" class="btn btn-primary btn-block py-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('more_scripts')
<script>
    const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

    // $(".toggle-password1").click(function() {

    // $(this).toggleClass("fa-eye fa-eye-slash");
    // var input = $($(this).attr("toggle"));
    // if (input.attr("type") == "password") {
    //     input.attr("type", "text");
    // } else {
    //     input.attr("type", "password");
    // }
    // });

    // $(".toggle-password2").click(function() {

    //     $(this).toggleClass("fa-eye fa-eye-slash");
    //     var input = $($(this).attr("toggle"));
    //     if (input.attr("type") == "password") {
    //         input.attr("type", "text");
    //     } else {
    //         input.attr("type", "password");
    //     }
    // });
    </script>

@endpush
