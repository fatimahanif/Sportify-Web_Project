@extends('layout.template')

@section('nav-background')
    <div class="about-bg">
        <img src="img/sectionBg/banner-top.jpg" alt="about bg" class="about-bg-img" width="100%">
    </div>
@endsection

@section('page-layout')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <h1 class="text-center page-head">Contact Us</h1>
            </div>

            <div class="col-12 col-lg-6 contact-text">
                <h2 class="contact-h2 ">How Can We Help?</h2>
                <div class="contact-text-div">
                    <h3 class="contact-h3">Training</h3>
                    <p>Request a personalized demo, or request a training video for using Sportify and learn how to use
                        within 15 minutes!</p>
                </div>
                <div class="contact-text-div">
                    <h3 class="contact-h3">Request a product</h3>
                    <p>Suggest what new products or categories we should add to make your experience even more amazing </p>
                </div>
                <div class="contact-text-div">
                    <h3 class="contact-h3">Suggestions</h3>
                    <p>Send us your suggestions and feedbacks. Your valuable feedbacks will help us in improving your
                        experience.</p>
                </div>
                <div class="contact-text-div">
                    <h3 class="contact-h3">Report an issue</h3>
                    <p>In case of any issue or problem, feel free to report so we can take timely action.</p>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <form action="/comment/{$fName}/{$lName}/{$email}/{$phoneNo}/{$subject}/{$message}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fName">First Name:</label>
                        <input class="form-control" type="text" name="fName" id="fName" required>
                    </div>

                    <div class="form-group">
                        <label for="lName">Last Name:</label>
                        <input class="form-control" type="text" name="lName" id="lName">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phoneNo">Phone Number:</label>
                        <input class="form-control" type="tel" name="phoneNo" id="phoneNo">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input class="form-control" type="text" name="subject" id="subject"  required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" id="message" rows="5"  required></textarea>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Send Message">

                </form>

            </div>

        </div>

    </div>
@endsection
