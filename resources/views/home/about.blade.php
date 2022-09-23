@extends('layout.template')

@section('nav-background')
    <div class="about-bg">
        <img src="img/sectionBg/banner-top.jpg" alt="about bg" class="about-bg-img" width="100%">
    </div>
@endsection

@section('page-layout')
    <!--about-->
    <div class="container-fluid text-center about-head ">

        <h1 class="about-head-text">About Us</h1>

        <hr class="about-hr offset-1 col-10">

    </div>

    <!--story div-->
    <div class="container">

        <div class="story-div row align-items-center">

            <div class="col-md-6 col-sm-12">
                <h3 class="about-small-head">Our Story</h3>

                <p class="about-story-p">
                    Sportify is Pakistan's best sports store. We provide sports equipment for all major sports played all
                    across the country. We also provide the best quality sportswear for each sport.
                </p>

                <p class="about-story-p">
                    Our mission is to provide the best quality sports eqipment at thr lowest and most affordable rates. We
                    ensure you will be amazed by our services. We give amzing discounts on each occassion for your
                    convenience. Special discoubts for registered members
                    increase their trust in our services
                </p>

                <p class="about-story-p">
                    Our registered shippers will deliver each order to your doorstep. We will ensure quality in each
                    product. You guarantee you will use sportify once and continue using it in the future
                </p>

                <!-- <p class="about-story-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commyolk augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a est. Lorem ipsum dolor sit amet.</p>
                    <p class="about-story-p">Duis dictum, neque at hendrerit euismod, elit nulla mattis mi, vel auctor sem dolor nec nisl. Etiam hendrerit arcu pretium, aliquet nulla eu, placerat ipsum. Nullam suscipit nulla a sapien gravida euismod. Fusce quis ligula quis dui aliquam posuere vel sed lectus. Duis dictum, neque at hendrerit euismod, elit nulla mattis mi</p>
                    <p class="about-story-p">Etiam nulla nunc, aliquet vel metus nec, scelerisque tempus enim. Sed eget blandit lectus. Donec facilisis ornare turpis id pretium. Maecenas scelerisque interdum dolor in vestibulum. Proin euismod dui purus, non lacinia ligula luctus aIn volutpat cursus quam, a blandit neque accumsan vitae. Maecenas scelerisque interdum dolor in vestibulum.</p> -->

            </div>

            <div class="col-md-6 col-sm-12">
                <img src="img/about_images/cms-img.jpg" alt="" width="100%">
            </div>

        </div>

        <hr class="about-hr offset-1 col-10">


        <div class="skills-div row align-items-center">

            <div class="col-md-6 col-sm-12">
                <h3 class="about-small-head">Statistics</h3>

                <div class="progress-div">
                    <p class="progress-text">Customer Satisfaction: 97%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 97%" aria-valuenow="97" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress-div">
                    <p class="progress-text">Product Quality: 83%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress-div">
                    <p class="progress-text">On-Time Delivery: 89%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress-div">
                    <p class="progress-text">Reasonable Price: 80%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-sm-12">
                <p class="about-p">
                    The statistics prove that our quality, price delivery and most importantly customer satisfaction are the
                    best you can get. These statistics are based on the data collected from various customer surveys in the
                    past year.
                </p>
                <p class="about-p">
                    Our quality is proven by the fact that 83% of our customers are satisfied with the product quality. Best
                    quality means best customer satisfaction rate which is rated at 97%. These are the best delivery
                    satisfaction rates you can get in any e-commerce
                    application.
                </p>
                <p class="about-p">
                    We have and will always continue to work for the best quality so these stats remain the same throughout
                    your journey as our customer. We hope that we will never disappoint any of our customers
                </p>

                <!-- <p class="about-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commyolk augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a est. Lorem ipsum dolor sit amet.</p>
                    <p class="about-p">Duis dictum, neque at hendrerit euismod, elit nulla mattis mi, vel auctor sem dolor nec nisl. Etiam hendrerit arcu pretium, aliquet nulla eu, placerat ipsum. Nullam suscipit nulla a sapien gravida euismod. Fusce quis ligula quis dui aliquam posuere vel sed lectus. Duis dictum, neque at hendrerit euismod, elit nulla mattis mi</p>
                    <p class="about-p">Etiam nulla nunc, aliquet vel metus nec, scelerisque tempus enim. Sed eget blandit lectus. Donec facilisis ornare turpis id pretium. Maecenas scelerisque interdum dolor in vestibulum. Proin euismod dui purus, non lacinia ligula luctus aIn volutpat cursus quam, a blandit neque accumsan vitae. Maecenas scelerisque interdum dolor in vestibulum.</p> -->
            </div>


        </div>

        <hr class="about-hr offset-1 col-10">

        <div class="container-fluid text-center about-head ">

            <h2 class="about-head-text team-head">Our Team</h2>

            <div class="row team-row">

                <div class="col-md-3 col-sm-6 img-div">
                    <img src="img/about_images/profile.png" alt="" class="team-img">
                    <h4>Dawood Saeed</h4>
                    <p>Chief Executive Officer</p>
                </div>

                <div class="col-md-3 col-sm-6 img-div">
                    <img src="img/about_images/profile.png" alt="" class="team-img">
                    <h4>Dawood Saeed</h4>
                    <p>Marketing Representative</p>
                </div>

                <div class="col-md-3 col-sm-6 img-div">
                    <img src="img/about_images/profile.png" alt="" class="team-img">
                    <h4>Fatima Hanif</h4>
                    <p>Manager HR</p>
                </div>

                <div class="col-md-3 col-sm-6 img-div">
                    <img src="img/about_images/profile.png" alt="" class="team-img">
                    <h4>Fatima Hanif</h4>
                    <p>Qaulity Assurance Lead</p>
                </div>


            </div>
        </div>

    </div>
@endsection
