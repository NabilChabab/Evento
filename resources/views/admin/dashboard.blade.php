@extends('layouts.dashboard')

@section('dashboard-active', 'active')
@section('recent-cards')
<div class="row">
    @foreach ($users as $user)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" style="background-color:#161718;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 font-weight-bold">
                                    {{ $user->email }} </p>
                                <h5 class="font-weight-bolder">
                                    {{ $user->name }}
                                </h5>
                                <p class="mb-0">
                                    @foreach ($user->roles as $role)
                                    <span class="text-success text-sm font-weight-bolder">{{$role->name}}</span>
                                    @endforeach
                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <a href="">
                                    @if ($user->hasMedia('media/users'))
                                    <img src="{{ $user->getFirstMediaUrl('media/users') }}"
                                        alt="" srcset=""
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    @else
                                    <img src="{{ asset('images/avatar.jfif') }}"
                                    alt="" srcset=""
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('recent-tables')
<div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card " style="background-color:#161718;">
        <div class="card-header pb-0 p-3" style="background-color:#161718;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Statistics</h6>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center ">
                <tbody>
                    <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                    <img src="{{ asset('images/avatar.jpg') }}" alt="Country flag"
                                        style="width: 80px;height:50px;border-radius:10px;">
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                        aaaaa </p>
                                    <h6 class="text-sm mb-0">United States</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0"> Budget</p>
                                <h6 class="text-sm mb-0"><span class="text-success">$ </span>aaaaaa
                                </h6>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Start_Date</p>
                                <h6 class="text-sm mb-0">bbbbbbbbb</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm">
                            <div class="col text-center">
                                <p class="text-xs font-weight-bold mb-0">End_Date</p>
                                <h6 class="text-sm mb-0">aaaaaaaaaaaa</h6>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-5">
    <div class="card" style="background-color:#161718;">
        <div class="card-header pb-0 p-3 d-flex justify-content-between align-items-center"
            style="background-color:#161718;">
            <h6 class="mb-0">Events</h6>
            <h6 class="mb-0">Users</h6>
        </div>
        <div class="card-body p-3" style="background-color:#161718;">
            <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
                    style="background-color:#161718;">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                            <img src="{{ asset('images/bg.jfif') }}" alt=""
                                style="width: 40px;height:40px;border-radius:10px;">
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">zertgh </h6>

                            <span class="text-xs">zerty </span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="#"><img src="{{ asset('images/avatar.jpg') }}"
                                style="width: 40px;height:40px;border-radius:10px;"></a>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div>
@endsection
