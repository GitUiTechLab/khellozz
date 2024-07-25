@extends('layouts.main-app')
    @section('main-content')
    <div class="contact-area contact-page">
        <div class="contact-banner display-none">
            <img class="banner-img" src="assets/img/contact/contact-banner.png" alt="">
            <div class="heading mb-3">
                <div>
                    <h1>Contact Us</h1>
                </div>
                <p>Have some suggestions or just want to say hi? Our support team are ready to help you.</p>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="row content">
                <div class="col-lg-4 contact-info contact-div1 ps-5">
                    <div class="mb-5">
                        <h2 class="mb-1">Contact Information</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text.</p>
                    </div>
                    <div class="m-4">
                        <i class="fa-solid fa-phone me-3"></i>
                        <span>Phone:</span><br>
                        &emsp;&emsp;<span>+91- 9999011452</span>
                    </div>
                    <div class="m-4">
                        <i class="fa-solid fa-envelope me-3"></i>
                        <span>Email:</span><br>
                        &emsp;&emsp;<span>example@gmail.com</span>
                    </div>
                    <div class="m-4">
                        <i class="fa-solid fa-location-dot me-3"></i>
                        <span>Address:</span><br>
                        &emsp;&emsp;<span>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.</span>
                    </div>
                </div>
                <div class="col-lg-5 contact-form contact-div2">
                    <h3>Get In Touch</h3>
                    <form action="">
                        <div>
                            <input type="text" name="name" id="" placeholder="Name">
                        </div>
                        <div>
                            <input type="email" name="email" id="" placeholder="Email">
                        </div>
                        <div>
                            <input type="tel" name="tel" id="" placeholder="Phone number">
                        </div>
                        <div>
                            <textarea rows="4" name="" id="" placeholder="Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn-red" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 bg-pink"></div>
            </div>
        </div>
        <div class="container contact-map p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8354345094473!2d144.956054315316!3d-37.81621897975186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5777aefb227cbd7!2sGoogle%20Australia!5e0!3m2!1sen!2sus!4v1624086849592!5m2!1sen!2sus"
                height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>

        </div>
    </div>
    @endsection

    
    