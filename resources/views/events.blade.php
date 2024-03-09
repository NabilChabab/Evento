@extends('layouts.my_layout')


@section('nav')
    <nav id="navbar" class="navbar">
        <ul>
            <li><a href="index.html" class="active">Home</a></li>
            @auth
                <li><a href="events">Events</a></li>
                <li class="dropdown">
                    <a href="#"><span>My Tickets</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @if ($reservations->isNotEmpty())
                            @foreach ($reservations as $reservation)
                                <li class="d-flex justify-content-between" style="width:300px">
                                    <a href="{{ route('home.show', $reservation->id) }}"><img
                                            src="{{ $reservation->getFirstMediaUrl('media/events') }}"
                                            style="width: 40px;height:40px;" class="rounded-circle me-2">
                                        {{ $reservation->title }}</a>
                                    <a href="{{ route('ticket', $reservation->id) }}"><i class="bi bi-arrow-down-circle"
                                            style="font-size: 22px;color:rgb(129, 0, 0)"></i></a>
                                </li>
                            @endforeach
                        @else
                            <li><a>No tickets available!!.</a></li>
                        @endif
                    </ul>
                </li>
            @endauth
            <li><a href="about.html">About</a></li>

            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
@endsection

@section('hero_head')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2><span>Evento</span> Where Creativity Meets Collaboration</h2>
                <p>Dynamic online platform dedicated to fostering collaboration and innovation within the artistic
                    community. </p>
                <a href="contact.html" class="btn-get-started">Available for hire</a>
                <h2 class="mt-5"><span>Our Events</span></h2>
                <input type="search" id="searchInput" placeholder="Search by title or category"
                    class="form-control mt-5 text-dark p-2"
                    style="background-color: rgb(236, 236, 236);width:400px;margin-left:20%;">

            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="gallery" class="gallery">
        <div class="container-fluid">
            <div class="row gy-4 justify-content-center" id="events-list">
                <!-- Dynamically populate this div with fetched data -->
            </div>
            <div class="row gy-4 justify-content-center" id="events-listt">
                @foreach ($events as $event)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gallery-item h-100">
                            <img src="{{ $event->getFirstMediaUrl('media/events') }}" class="img-fluid" alt=""
                                style="width: 500px;height:350px;object-fit:cover;">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="{{ route('home.show', $event->id) }}" class="details-link"><i
                                        class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $events->links() }}
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            var searchInput = document.getElementById('searchInput');

            var eventsList = document.getElementById('events-list');
            var eventsList1 = document.getElementById('events-listt');

            searchInput.addEventListener('input', async function() {
                var query = this.value;

                try {
                    const response = await fetch(`/user/search?query=${query}`);

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const data = await response.json();
                    console.log(data);

                    eventsList1.style.display = 'none';
                    eventsList.innerHTML = '';


                    data.forEach(event => {
                        const eventCard = `
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gallery-item h-100">
                            <img src="${event.media_url}" class="img-fluid" alt="" style="width: 500px;height:350px;object-fit:cover;">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="../user/home/${event.id}" class="details-link"><i class="bi bi-eye"></i></a>

                            </div>
                        </div>
                    </div>
                `;
                        eventsList.insertAdjacentHTML('beforeend', eventCard);
                    });
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
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
