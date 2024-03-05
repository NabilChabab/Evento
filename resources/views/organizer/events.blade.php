@extends('layouts.org-dashboard')


@section('Events-active', 'active')


@section('recent-tables')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="background-color:#161718;">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center"
                    style="background-color:#161718;">
                    <h6>Evento Users </h6>
                    <a href="{{route('event.create')}}" class="btn btn-primary">Create Event</a>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Event</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Location</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total Seats</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Reserved Seats</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Automatic</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Craeted_at</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>

                                                <img src="{{ asset('images/avatar.jfif') }}" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm text-light"> qsdf
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    qsdf</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-secondary text-center">
                                            sdfgh </p>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-secondary text-center">
                                            sdfgh </p>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-secondary text-center">
                                            sdfgh </p>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-secondary text-center">
                                            sdfgh </p>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-secondary text-center">
                                            sdfgh </p>
                                    </td>

                                    <td class="text-center align-middle">

                                        <a href="#" class="status-badge">
                                            <span class="badge badge-sm bg-gradient-warning text-center">test</span>
                                        </a>

                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">484848</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="" class="text-danger text-xs me-3">Delete</a>
                                        <a href="" class="text-primary text-xs">Edit</a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
