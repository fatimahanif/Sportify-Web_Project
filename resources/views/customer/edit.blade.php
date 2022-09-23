@include('layout.partial.userCheck')
@extends('layout.adminTemplate')


@section('title', "Edit $customer->UserName Profile")

{{-- vertical bar --}}
@section('linkOne', '')
@section('linkOneIcon', 'fa-user')
@section('linkTitleOne', 'Profile Setting')

@section('linkTwo', "orders")
@section('linkTwoIcon', 'fa-square-rss')
@section('linkTitleTwo', 'Orders')


@section('scriptOne')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection
@section('scriptTwo')
    <script src="{{ asset('scripts/customerAjax.js') }}"></script>
@endsection



@section('page-content')
    <div class="col-10 mt-3 bg-white py-5" id="mainContentAdminPanel">
        <div class="container">
            <div class="" id="infoBox">

            </div>
            <div class="row">
                <div class="col">
                    <h4 class="primaryColor">EDIT PROFILE</h4>
                </div>
                <div class="col">

                </div>
            </div>

            <div class="row bg-white">
                <div class="col-12">
                    <form action="{{ route('customer.update', ['customer' => $userId]) }}" class="row" method="POST"
                        id="userForm" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="userId" value="{{ $userId }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <img src="{{ asset('storage/images' ) }}/{{ $customer->image }}" alt=""
                                        class="userProfileImage img-fluid">
                                    <label for="fileUpload" class="ml-4 mt-3">
                                        Image Upload
                                    </label>
                                    <input type="file" name="userImage" class="fileUpload" id="fileUpload"
                                        accept="image/*">
                                </div>

                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="">First Name: </label>
                                        <input type="text" name="fname" class="form-control" id="fname" value="{{$customer->FirstName}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name: </label>
                                        <input type="text" name="lname" class="form-control" id="lname" value="{{$customer->LastName}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Username: </label>
                                        <input type="text" name="uname" class="form-control" id="uname" value="{{$customer->UserName}}">
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="primaryColor">CHANGE PASSWORD</h4>
                                    <div class="form-group">
                                        <label for="pwd">Password: </label>
                                        <input type="password" class="form-control" name="pwd" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Confrim Password: </label>
                                        <input type="password" class="form-control" name="cpwd" id="cpwd">
                                    </div>
                                </div>
                            </div>

                            <hr class="hr mt-5">

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="primaryColor">EXTRA INFORMATION</h4>
                                    <div class="form-group">
                                        <label for="phone">Phone Number: </label>
                                        <input type="tel" class="form-control" name="phone" id="phone" value="0{{$customer->PhoneNumber}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address: </label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{$customer->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <input type="submit" class="btn btn-primary-update mr-3" value="Update"
                                        id="formSubmissionUser">
                                    <input type="reset" class="btn btn-danger" value="Reset">
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
