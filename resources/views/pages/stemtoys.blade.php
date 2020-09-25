@extends('layouts.app')
@section('title', '电子积木')

@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8">
                <img alt="Image" width="80px" src="/images/smart-cubes/logo.png" />
                <div class="heading-block text-center">
                    <h1 class="h1--large">meet <b><font color="#4285F4">Smart Cubes</font></b></h1>
                    <p class="lead">Smart Cubes are electronic building blocks that add sound, motion, light, and sensors to young Makers' creations.</p>
                    <a class="btn btn--primary type--uppercase" href="#">
                        <span class="btn__text">Shop now</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-center space--xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2 class="type--uppercase"><b>What are Smart Cubes?</b></h2>
            </div>
        </div>
    </div>
</section>

<section class="pace--xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="feature feature-1">
                    <div class="feature__body boxed boxed--border">
                        <img alt="Image" src="/images/smart-cubes/cube-battery.png" width="100%"/>
                        <h5><b>BATTERY CUBE</b></h5>
                        <p>The battery is the power supply that drives the motor to rotate the gears, lights the LED, spins the propeller, buzzes the buzzer, and engages the switch. It puts the move in the motor, and the light in the LED.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-1">
                    <div class="feature__body boxed boxed--border">
                        <img alt="Image" src="/images/smart-cubes/cube-motor.png" width="100%"/>
                        <h5><b>MOTOR CUBE</b></h5>
                        <p>The motor cube is powerful and can drive a number of fun designs from monster trucks to sci-fi spacewalkers. Strap together color markers with the motor and battery cubes to create brilliant graphic designs, suitable for framing!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-1">
                    <div class="feature__body boxed boxed--border">
                        <img alt="Image" src="/images/smart-cubes/cube-led.png" width="100%"/>
                        <h5><b>LED CUBE</b></h5>
                        <p>Light up just about everything with the LED cube. Make a powerful flashlight with only a toilet tissue roll, a battery and an LED cube! The LED cube is probably the most versatile cube and puts the bright in every creation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
