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
                                    <a href="{{ route('home.show', $reservation->id) }}"><img src="{{$reservation->getFirstMediaUrl('media/events')}}" style="width: 40px;height:40px;" class="rounded-circle me-2"> {{ $reservation->title }}</a>
                                    <a href="{{route('ticket' , $reservation->id)}}"><i class="bi bi-arrow-down-circle"  style="font-size: 22px;color:rgb(129, 0, 0)"></i></a>
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

<div class="page-header d-flex align-items-center">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2><span>Event Detail</span></h2>
                <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                    consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                    sint. Sit quaerat ipsum dolorem.</p>

                <a class="cta-btn" href="contact.html">Available for hire</a>

            </div>
        </div>
    </div>
</div><!-- End Page Header -->

<!-- ======= Gallery Single Section ======= -->
<section id="gallery-single" class="gallery-single">
    <div class="container">
        <div>
            <img src="{{ $event->getFirstMediaUrl('media/events') }}" alt="" style="width:100%;height:700px;object-fit:cover;" class="rounded">
        </div>

        <div class="row justify-content-between gy-4 mt-4">

            <div class="col-lg-8">
                <div class="portfolio-description">
                    <h2>{{ $event->title }}</h2>
                    <p>
                        {{ $event->description }}
                    </p>



                    <div class="testimonial-item">
                        <h2 class="text-danger">Creator</h2>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                            cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                            legam anim culpa.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <div class="d-flex gap-3 align-items-center">
                            @if ($event->creater->hasMedia('media/users'))
                            <img src="{{ $event->creater->getFirstMediaUrl('media/users') }}"
                            class="testimonial-img" alt=""
                            style="width: 70px;height:70px;object-fit:cover">
                            @else
                            <img src="{{ asset('images/avatar.jfif')}}"
                            class="testimonial-img" alt=""
                            style="width: 70px;height:70px;object-fit:cover">
                            @endif
                            <div class="mb-4">
                                <h3>{{ $event->creater->name }}</h3>
                                <h4>{{ $event->created_at }}</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="portfolio-info">
                    <h3>Event information</h3>
                    <ul>
                        <li><strong>Category</strong> <span>{{$event->category->name}}</span></li>
                        <li><strong>Event date</strong> <span>{{$event->date}}</span></li>
                        <li><strong>Event Location</strong> <a href="#">{{$event->location}}</a></li>
                        <li>
                            {{-- <a href="{{route('mollie.payment')}}" class="btn-visit align-self-start" type="submit" style="border:none;">Get Your Ticket</a> --}}
                            <form action="/session" method="POST">
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button class="btn-visit align-self-start" type="submit" style="border:none;">Get Your Ticket</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
