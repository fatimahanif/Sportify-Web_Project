@extends('layout.adminTemplate')
@include('layout.partial.adminCheck')
{{-- vertical bar --}}
@section('linkOne', '/admin/')
@section('linkOneIcon', 'fa-house')
@section('linkTitleOne', 'Dashboard')

@section('linkTwo', '/admin/products')
@section('linkTwoIcon', 'fa-square-rss')
@section('linkTitleTwo', 'Products')

@section('linkThree', '/admin/categories')
@section('linkThreeIcon', 'fa-square-rss')
@section('linkTitleThree', 'Categories')



@section('page-content')
    <div class="col-10 mt-5" id="mainContentAdminPannel">
        <div class="row">
            <div class="col-12">
                <h5 class="font-one">Dashboard</h5>
                <p class="text-muted">
                    Do big things with Sportify, the ultimate admin pannel for you.
                </p>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mt-3 mt-lg-0">
                        <div class="d-flex align-items-center justify-content-center bg-blood text-white p-3 squareInfo">
                            <i class="fa-solid fa-earth-africa"></i>
                            <div class="d-flex flex-column align-items-center ml-2">
                                <small>TODAY'S VISITS</small>
                                <p class="font-one pt-2">1,975,224</p>
                                <small class="mb-2">24% higher yesterday</small>
                            </div>
                        </div>
                    </div>

                    <!-- ################ COLUMN TWO INFP ######## -->
                    <div class="col-sm-6 col-lg-3 mt-3 mt-lg-0">
                        <div class="d-flex align-items-center justify-content-center bg-teal text-white p-3 squareInfo">
                            <i class="fa-solid fa-lock"></i>
                            <div class="d-flex flex-column align-items-center ml-2">
                                <small>TODAY'S SALES</small>
                                <p class="font-one pt-2">$329,291</p>
                                <small class="mb-2">$390,212 before tax</small>
                            </div>
                        </div>
                    </div>

                    <!-- ############ THREE ############# -->
                    <div class="col-sm-6 col-lg-3 mt-3 mt-sm-3 mt-lg-0">
                        <div class="d-flex align-items-center justify-content-center bg-night text-white p-3 squareInfo">
                            <i class="fa-solid fa-tv"></i>
                            <div class="d-flex flex-column align-items-center ml-2">
                                <small>% UNIQUE VISITS</small>
                                <p class="font-one pt-2">54.45%</p>
                                <small class="mb-2">23% average duration</small>
                            </div>
                        </div>
                    </div>
                    <!-- ################ FOUR ############## -->
                    <div class="col-sm-6 col-lg-3 mt-3 mt-sm-3 mt-lg-0">
                        <div class="d-flex align-items-center justify-content-center bg-primary text-white p-3 squareInfo">
                            <i class="fa-solid fa-gauge"></i>
                            <div class="d-flex flex-column align-items-center ml-2">
                                <small> BOUNCE RATE</small>
                                <p class="font-one pt-2">32.16%</p>
                                <small class="mb-2">65.45% on average time </small>
                            </div>
                        </div>
                    </div>
                    <!-- ########## ROW OF INFO ENDS HERE########## -->
                </div>
            </div>

            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-12 col-lg-8">
                        <p class="font-one">Newly registered users</p>
                        <table class="table table-striped registeredUserTable">
                            <tbody>

                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{ asset('storage/images') }}/{{ $customer->image }}"
                                                alt="profile picture" />
                                        </th>
                                        <td class="pt-3">{{ $customer->FirstName }}</td>
                                        <td class="pt-3">{{ $customer->LastName }}</td>
                                        <td class="pt-3">{{ $customer->Email }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <p class="font-one">Recent Comments</p>
                            </div>
                            <div class="col-12 rounded" style="cursor: pointer">
                                <div class="p-3 bg-white">
                                    
                                    @foreach($comments as $comment)
                                    <div class="pickedPost d-flex flex-row">
                                        <div class="pickedPost_img">
                                        <img src="{{ asset('storage/images') }}/default.png"
                                                alt="profile picture" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center pickedPost_info">
                                            <p class="mt-2 pickedPost_title">{{$comment->FirstName}} {{$comment->LastName}}</p>
                                            <p class="text-muted">
                                                {{$comment->Message}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- <div class="pickedPost d-flex flex-row">
                                        <div class="pickedPost_img">
                                            <img src="{{ asset('img/Team/Quentin.jpg') }}" alt="" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center pickedPost_info">
                                            <p class="mt-2 pickedPost_title">Quentin D</p>
                                            <p class="text-muted">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto,
                                                voluptate.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pickedPost d-flex flex-row">
                                        <div class="pickedPost_img">
                                            <img src="{{ asset('img/Team/Roberts.jpg') }}" alt="" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center pickedPost_info">
                                            <p class="mt-2 pickedPost_title">Roberts</p>
                                            <p class="text-muted">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto,
                                                voluptate.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pickedPost d-flex flex-row">
                                        <div class="pickedPost_img">
                                            <img src="{{ asset('img/Team/Colt.png') }}" alt="" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center pickedPost_info">
                                            <p class="mt-2 pickedPost_title">Colt Drake</p>
                                            <p class="text-muted">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto,
                                                voluptate.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pickedPost d-flex flex-row">
                                        <div class="pickedPost_img">
                                            <img src="{{ asset('img/Team/Bard.jpeg') }}" alt="" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center pickedPost_info">
                                            <p class="mt-2 pickedPost_title">Brad Pitt</p>
                                            <p class="text-muted">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto,
                                                voluptate.
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- ############# COMMENT ENDS ############## -->

                                <!-- ################ MAIN  ###########-->
                            </div>

                            <!-- ################ MAIN comments ROW ENDS HERE #################### -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ############## MAIN CONTENT ROW ######### -->
        </div>
    </div>
@endsection
