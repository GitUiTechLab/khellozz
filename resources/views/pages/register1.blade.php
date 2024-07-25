@extends('layouts.main-app')
@section('main-content')
    <div class="registration-area">
        <div class="container sports-list-area bg-pink py-3 my-3">
            <h4 class="text-center">School Sports Highlights</h4>
            <div class="container sports-list my-4 text-center">
                <div class="row">
                    <span class="color-primary2 fw-semibold col-4">Sports Names</span>
                    <span class="color-primary2 fw-semibold col-4">Number of players</span>
                    <span class="color-primary2 fw-semibold col-4">Age Categories</span>
                </div>
                <div class="row">
                    <span class="col-4">Kho-Kho</span>
                    <span class="col-4">5</span>
                    <span class="col-4">21</span>
                </div>
                <div class="row">
                    <span class="col-4">Cricket</span>
                    <span class="col-4">15</span>
                    <span class="col-4">23</span>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{route('page.registertwo')}}"><button type="button" class="btn-red" data-text="Next">Pay Now</button></a>
            </div>
        </div>

        <div class="container pt-3">
            <div class="heading">
                <div>
                    <h2>Registration Form</h2>
                </div>
            </div>

            <form action="">
                <div class="row">
                    <div class="col-lg-6 my-3">
                        <label for="">School Name<span class="color-red">*</span></label> <br>
                        <select id="" class="form-select" aria-label="Default select example">
                            <option selected>Select School Name</option>
                            <option value="1">School 1</option>
                            <option value="2">School 2</option>
                            <option value="3">School 3</option>
                        </select>
                    </div>
                    <div class="col-lg-6 my-3">
                        <label for="">Age<span class="color-red">*</span></label> <br>
                        <select id="" class="form-select" aria-label="Default select example">
                            <option selected>Select Age</option>
                            <option value="1">14</option>
                            <option value="2">15</option>
                            <option value="3">16</option>
                            <option value="4">17</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 my-3">
                        <label for="">Sports/Game<span class="color-red">*</span></label> <br>
                        <select id="" class="form-select" aria-label="Default select example">
                            <option selected>Select Sports</option>
                            <option value="1">Sports 1</option>
                            <option value="2">Sports 2</option>
                            <option value="3">Sports 3</option>
                        </select>
                    </div>
                    <div class="col-lg-6 my-3">
                        <label for="">Gender<span class="color-red">*</span></label> <br>
                        <select id="" class="form-select" aria-label="Default select example">
                            <option selected>Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="container p-0 mb-3">
                    <h5 class="mb-0 my-3">Players Details</h5>
                    <div class="row">
                        <div class="col-12 m-0 p-0">
                            <div class="table-container">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" class="col-no">No.</th>
                                            <th scope="col">Player Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Phone No.</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Father/Mother Name</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Upload Photo</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="col-no">1</th>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><input type="tel"></td>
                                            <td><input type="email"></td>
                                            <td><input type="text"></td>
                                            <td><input type="number"></td>
                                            <td><input type="file"></td>
                                            <td><button class="removeRowButton">Remove</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="col-no">2</th>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><input type="tel"></td>
                                            <td><input type="email"></td>
                                            <td><input type="text"></td>
                                            <td><input type="number"></td>
                                            <td><input type="file"></td>
                                            <td><button class="removeRowButton">Remove</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="col-no">3</th>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><input type="tel"></td>
                                            <td><input type="email"></td>
                                            <td><input type="text"></td>
                                            <td><input type="number"></td>
                                            <td><input type="file"></td>
                                            <td><button class="removeRowButton">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container text-center my-3">
                                <button class="btn-trans bg-pink w-100 add-btn fw-semibold" id="addRowButton"><i
                                        class="fa-solid fa-plus mx-3"></i>Add Rows</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <h6><span class="color-primary2">Imported update: </span><span>One sport, 16 Team entries
                            allowed.</span>
                    </h6>
                </div>
                <div class="d-flex justify-content-center btn-container">
                    <div class="text-center">
                        <a href="register1.html"><button type="button" class="btn-trans me-5">Add More
                                Games</button></a>
                    </div>
                    <div class="text-center">
                        <a href="{{route('page.registertwo')}}"><button type="button" class="btn-red ms-5">Pay Now</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
