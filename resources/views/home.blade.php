@extends('layouts.my_layout')


@section('nav')

<nav id="navbar" class="navbar">
    <ul>
        <li><a href="index.html" class="active">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li class="dropdown"><a href="#"><span>Gallery</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                <li><a href="gallery.html">Nature</a></li>
                <li><a href="gallery.html">People</a></li>
                <li><a href="gallery.html">Architecture</a></li>
                <li><a href="gallery.html">Animals</a></li>
                <li><a href="gallery.html">Sports</a></li>
                <li><a href="gallery.html">Travel</a></li>
                <li class="dropdown"><a href="#"><span>Sub Menu</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Sub Menu 1</a></li>
                        <li><a href="#">Sub Menu 2</a></li>
                        <li><a href="#">Sub Menu 3</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>
@endsection

@section('hero_head')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <h2><span>Evento</span> Where Creativity Meets Collaboration</h2>
            <p>Dynamic online platform dedicated to fostering collaboration and innovation within the artistic community. </p>
            <a href="contact.html" class="btn-get-started">Available for hire</a>
            <h2 class="mt-5"><span>Recent Projects</span></h2>
        </div>
    </div>
</div>

@endsection
@section('content')
<section id="gallery" class="gallery">
    <div class="container-fluid">

        <div class="row gy-4 justify-content-center">

            @foreach ($events as $event)
            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="gallery-item h-100">
                    <img src="{{$event->getFirstMediaUrl('media/events')}}" class="img-fluid" alt="" style="width: 500px;height:350px;object-fit:cover;">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                        <a href="{{route('home.show' , $event->id)}}" class="details-link"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div><!-- End Gallery Item -->
            @endforeach


        </div>

    </div>
</section>
@endsection

@section('footer')
<footer id="footer" class="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>
@endsection
