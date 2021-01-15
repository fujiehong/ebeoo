@extends('sbb.layouts.app')
@section('title', '首页')

@section('content')

    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h2>JOIN THE CLUB!</h2>
                    <p class="lead text-left">
                        Have you heard about the Circuit Cube Club? (It's free!) When you become a C³ member, you'll receive project ideas, insider updates, and members-only discounts delivered directly to you. You’ll also be the first to hear about our newest Cubes and kits as they come out. Plus, you’ll be able to share your Cube builds and projects with other C³ members on our community pages!
                        C³ newsletters offer special builds just for Circuit Cube Club members, complete with instructions, suggestions to mod your projects, and ideas for turning ordinary household items into cool new things.
                        Want to know about our plans for new kits? Of course you do! C³ members get first access to new products, and more.
                        Join our community today! We can’t wait to meet you.
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img alt="Image" src="/img/gallery-1.jpg" width="100%"/>

                    <br><br><br>
                    <a class="btn btn--primary type--uppercase" href="#">
                                    <span class="btn__text">
                                       Join the CLUB
                                    </span>
                    </a>

                </div>

            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>




    @stop
