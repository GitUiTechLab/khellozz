@extends('layouts.main-app')
@section('main-content')
    <div class="registration-area">
        <div class="container pt-3">
            
            <div class="heading">
                <div>
                    <h2>Registration Form</h2>
                </div>
            </div>
            <div class="content">
                <span class="fw-semibold">Payment: </span> <span>Total amount = </span><span>&#8377; </span><span
                    class="amount">1,000</span>
            </div>
            <div class="content my-4">
                <form action="" id="paymentForm">
                    <h6>Choose Payment Method</h6>
                    <div class="payment-method mb-5">
                        <label>
                            <input type="radio" name="payment" value="amazon">
                            <div>
                                <img src="assets/img/registration/1.png" alt="">
                                <span>Pay with Amazon Payment</span>
                            </div>
                        </label>
                        <label>
                            <input type="radio" name="payment" value="paypal">
                            <div>
                                <img src="assets/img/registration/2.png" alt="">
                                <span>Pay with PayPal</span>
                            </div>
                        </label>
                        <label>
                            <input type="radio" name="payment" value="visa">
                            <div>
                                <img src="assets/img/registration/3.png" alt="">
                                <span>Pay with Visa Card</span>
                            </div>
                        </label>
                        <label>
                            <input type="radio" name="payment" value="paytm">
                            <div>
                                <img src="assets/img/registration/4.png" alt="">
                                <span>Pay with Paytm Payment</span>
                            </div>
                        </label>
                    </div>
                    <h6>Credit Card Information</h6>
                    <div class="row">
                        <div class="col-lg-6 my-3">
                            <label for="">Card Holder Name<span class="color-red">*</span></label> <br>
                            <input type="text" id="" name="name" required>
                        </div>
                        <div class="col-lg-6 my-3">
                            <label for="">Card no.<span class="color-red">*</span></label> <br>
                            <input type="number" id="" name="name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 my-3">
                            <label for="expiryMonth">Expiry Date:<span class="color-red">*</span></label>
                            <div class="expiry-date">
                                <select id="expiryMonth" name="expiryMonth" required>
                                    <option value="" disabled selected>MM</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <span>/</span>
                                <select id="expiryYear" name="expiryYear" required>
                                    <option value="" disabled selected>YY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <label for="">CVV<span class="color-red">*</span></label> <br>
                            <input type="number" id="" name="name" required>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Save My Details For Future Purchases
                        </label>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" id="confirm-btn" class="btn-red">Confirm Payment</button>
                    </div>
                    <div class="popup">
                        <div class="success-popup">
                            <span class="close"><i class="fa-solid fa-circle-xmark"></i></span>
                            <img class="m-3" src="assets/img/registration/done.png" alt="">
                            <h6>Payment successful!</h6>
                            <p>Your registration is successful! We look forward to your participation.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
   
   