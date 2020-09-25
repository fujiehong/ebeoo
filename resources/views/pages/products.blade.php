
@extends('layouts.app')
@section('title', '商品介绍')

@section('content')




<section class="text-center space--xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2 class="type--uppercase"><b>Meet our Cubes</b></h2>
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
                        <img alt="Image" src="/images/smart-cubes/cube-battery.png" width="100%" />
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

<section class="text-center space--xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2 class="type--uppercase"><b>Explore our kits</b></h2>
            </div>
        </div>
    </div>
</section>

<section class="text-center space--xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="#" class="block">
                    <div class="feature feature-1">
                        <img alt="Image" src="/images/smart-cubes/whacky-wheels-kit.png" width="100%"/>
                        <div class="feature__body boxed boxed--border">
                            <h5><strong>WACKY WHEELS KIT</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <a href="#" class="block">
                    <div class="feature feature-1">
                        <img alt="Image" src="/images/smart-cubes/bright-lights-kit.png" width="100%"/>
                        <div class="feature__body boxed boxed--border">
                            <h5><strong>BRIGHT LIGHTS KIT</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <a href="#" class="block">
                    <div class="feature feature-1">
                        <img alt="Image" src="/images/smart-cubes/smart-art-kit.png" width="100%"/>
                        <div class="feature__body boxed boxed--border">
                            <h5><strong>SMART ART KIT</strong></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


@stop
