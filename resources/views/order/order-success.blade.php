@extends('layouts.app')

@section('css')
<style>
#confirmation h1 {
  font-size: 42px;
  font-weight: 300;
  color: #6863d8;
  letter-spacing: 0.3px;
  margin-bottom: 30px;
}

#confirmation .status {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 75px 0 275px;
  max-width: 75%;
  height: 350px;
  margin: 100px auto;
  background: #fff url(/images/order.svg) 75px center no-repeat;
  box-shadow: 0 1px 3px 0 rgba(50, 50, 93, 0.15);
  border-radius: 6px;
}
</style>
@endsection


@section('content')
<div id="confirmation">

    <div class="status success">
      <h1>Thanks for your order!</h1>
      <p>Woot! You successfully made a payment with Stripe.</p>
      <p class="note">We just sent your receipt to your email address, and your items will be on their way shortly.</p>
    </div>

@endsection
