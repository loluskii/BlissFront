@extends('layouts.app')


@section('css')
<style>
    .border-left-primary {
        border-left: 3px solid #2A707D;
    }
    .side-nav .active{
        border-left: 3px solid #2A707D;
    }
    .h-90{
        height: 90%;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row vh-100">
        @include('user.side-nav')
        <div class="col-md-9 h-90">
            <div class="card border-0 h-100 shadow-sm">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>Your Details</h3>
                    <p>Feel free to edit any of your details below so your account is totally up to date.</p>

                    <div class="py-4">
                        <form action="{{ route('user.update') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="fname" class="form-control" value="{{ $user->fname }}" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="lname" class="form-control" value="{{ $user->lname }}" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="">Email Address</label>
                              <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_no" id="" class="form-control" value="09084780270" aria-describedby="helpId">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
