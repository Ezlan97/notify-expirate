@extends('layouts.master') @section('title','Notify Me') @section('content')

<!-- Header -->
<header class="masthead" style="height: 600px;">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Notify Me!</div>
            <div class="intro-heading text-uppercase">Your personal reminder!</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('register') }}">Register</a>
        </div>
    </div>
</header>

<!-- Services -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Our Main Focus.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="typcn typcn-edit text-primary" style="font-size: 100px;"></i>
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Simple</h4>
                <p class="text-muted">Register, save reminder and get email notification.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="typcn typcn-edit text-primary" style="font-size: 100px;"></i>
                    <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Responsive Design</h4>
                <p class="text-muted">Desktop or mobile phone we can handle it.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="typcn typcn-edit text-primary" style="font-size: 100px;"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Free</h4>
                <p class="text-muted">Good service with zero cost.</p>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">About Us</h2>
                <h3 class="section-subheading text-muted">Your trusted personal reminder. Never miss any importance date, set the date and email will be sent to remind you!</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2018</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">The year of this system created with a mission to provide reliable personal assistant, that can remind every special date that you need!</p>
                            </div>
                        </div>
                    </li>                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Goal!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    @endsection
