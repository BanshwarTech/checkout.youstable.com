<?php
$page = 'shared-hosting';
include('inc/header.php');
?>


<style>
    .hidden {
        display: none;
    }

    .contact-hosting {
        font-size: 20px;
        font-weight: 400;
        line-height: 38.73px;
        color: #292929;

    }

    section.rating-section {
        padding: 0;
        margin: 78px 0;
    }

    .high-q-server {
        /*margin-top: 70px;*/
        margin-bottom: 70px;
    }

    section.customer-support {
        margin-bottom: 30px;
        margin-top: 0;
    }



    .section-p {
        height: 30vh !important;
        top: 300px !important;
        margin-top: 80px;
    }

    section.established {
        padding-bottom: 25px;
    }

    .review-content {
        margin: 70px 0;
    }

    button.nav-link.teb-bg-purple {
        background: #f6f6f6;
        font-size: 17px;
        font-weight: 600;
        line-height: 30px;
        padding: 20px 0;
        color: #292929;
        width: 100%;
    }

    button.nav-link.active.teb-bg-purple {
        background: #fff;
        font-size: 17px;
        font-weight: 500;
        line-height: 30px;
        padding: 20px 0;
        width: 100%;
    }

    div.price-container {
        margin-bottom: 16px;
    }

    section.faq {
        margin-bottom: 0;
    }

    section.table-comparison {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background-color: #fff;
        z-index: 99999;
        margin-bottom: 0;
    }

    .free_setup {
        position: absolute;
        top: 6rem;
        right: -61px;
        transform: rotate(-90deg);
        padding: 10px 16px;
        border-radius: 10px 10px 0 0;
        width: 162px;
    }

    .row.nav.nav-pills.wid-more {

        margin-bottom: 10px;
    }

    @media only screen and (min-width: 320px) and (max-width: 767px) {
        section.explore-section {
            margin: 0px 0px;
        }

        .row.flex_unset.shared-hosting-m-set {
            margin-top: 0px;
        }
    }
</style>

<!-- Banner section (shared hosting) -->
<section class="banner-sec share-bg">
    <div class=" container">
        <div class="row align-items-center reverse-column">
            <div class="col-md-6">
                <div class="banner-left-content">
                    <p class="experience">Affordable Linux Shared Hosting</p>
                    <h1 class="Banner-Heading padding-heading robust">Affordable Shared Web Hosting</h1>
                    <p class="Banner-title p-0">Looking for affordable shared Linux hosting? Enjoy fast, reliable, and
                        cost-effective web hosting with outstanding website performance.</p>
                    <div class="d-flex gap-3 lists-hosting">
                        <ul class="banner-list list-unstyled">
                            <li class="purple-text_dark mb-3"><img
                                    src="assets/img/newImages/Single-click-script-installs.svg" alt="tick"
                                    class="tick-square">Single-click script installs</li>
                            <li class="purple-text_dark"><img src="assets/img/newImages/Easy-to-use-control-panel.svg"
                                    alt="tick" class="tick-square">Easy to use control panel</li>
                        </ul>
                        <ul class="banner-list list-unstyled">
                            <li class="purple-text_dark mb-3"><img src="assets/img/newImages/Top-notch-security.svg"
                                    alt="tick" class="tick-square">Top notch security</li>
                            <li class="purple-text_dark"><img src="assets/img/newImages/Real-Human-support.svg"
                                    alt="tick" class="tick-square">Real Human support</li>
                        </ul>
                    </div>
                </div>
                <a href="#explore" class="link-color-black"><button class="btn-yellow btn-explore-plan">Get Started
                        Today <i class="fa-solid fa-arrow-right"></i></button></a>
                <p class="Money-Back-Guarantee"><img src="assets/img/ic-shield.png" alt="shield">30-Day Money-Back
                    Guarantee</p>
            </div>
            <div class="col-md-6">
                <img class="banner_img floatings" src="assets/img/newImages/ultra-smooth-hosting.png" alt="Banner"
                    srcset="">
            </div>
        </div>
    </div>
</section>

<!-- (Rating section) -->
<section class="rating-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 rating-cols">
                <div class="rating-outer-card">
                    <img class="rating-img" src="assets/img/trustpilot.png" alt="trust pilot">
                    <div>
                        <p class="mb-2 mt-1">Rated <span class="rating-count">4.7/5</span></p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 rating-cols margin--top">
                <div class="rating-outer-card">
                    <img class="rating-img-host" src="assets/img/host-advice.png" alt="host advice">
                    <div>
                        <p class="mb-2 mt-1">Rated <span class="rating-count">4.6/5</span></p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 rating-cols margin--top">
                <div class="rating-outer-card">
                    <img class="rating-img" src="assets/img/google-logo.png" alt="google">
                    <div>
                        <p class="mb-2 mt-1">Rated <span class="rating-count">4.6/5</span></p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Explore Section-->
<section class="explore-section plans-mobile-one shared-explore review-margin" id="explore">
    <div class="text-center shared-hosting-plan-heading shared-hosting-plan-heading-one">
        <h2 class="server-heading shared-heading-plan">Shared Web Hosting Plans and Pricing</h2>
        <p class="server-title choose">We’ve got the perfect hosting solutions for you! Our shared hosting platform
            combines efficiency, <br>security, and plenty of resources to meet all your needs.</p>
    </div>
    <?php include 'inc/sharedWpPlans.php' ?>
</section>


<!-- ninth section (Hosting rating) -->
<section class="hosting-rating">
    <div class="container">

        <div class="d-flex justify-content-between">
            <span class="text-start">
                <img src="assets/img/yellow-circle.png" class="floating yellow-circle">
            </span>
            <span class="text-end">
                <img src="assets/img/cloud-circle.png" class="movingcloud">
            </span>
        </div>
        <?php include('animate-text.php') ?>
        <div class="d-flex justify-content-between">
            <span class="text-start">
                <img src="assets/img/cloud-wave.png" class="movingclouds">
            </span>
            <span class="text-end">
                <img src="assets/img/wave-yellow.png" class="floating">
            </span>
        </div>


    </div>
</section>
<section class="established">
    <div class="container">
        <div class="border text-center gap-top ">
            <div class=" years-with-customer">
                <div class="row row-up">
                    <div class="col-md-4">
                        <div class="customer-rating-hosting">
                            <img src="assets/img/happy.png" alt="" class="customer-attach-img">
                            <p class="purple-text_dark fw-bold working-counter mb-1">100k</p>
                            <p class="how-much-time">Happy Customers</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="customer-rating-hosting">
                            <img src="assets/img/newImages/supp-1.svg" alt="" class="customer-attach-img">
                            <p class="purple-text_dark fw-bold working-counter mb-1">24/7</p>
                            <p class="how-much-time">Expert Support</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="customer-rating-hosting">
                            <img src="assets/img/established.png" alt="" class="customer-attach-img">
                            <p class="purple-text_dark fw-bold working-counter mb-1">2015</p>
                            <p class="how-much-time">Established</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="sea">
    <div class="wave"></div>
</div>

<!-- section (High quality Server) -->
<section class="high-q-server">
    <div class=" container">
        <div class="bg-purple">
            <div class="text-center">
                <h2 class="server-heading">Technologies YouStable Works With</h2>
                <p class="server-title title_sides-width">To provide you with best in class services. We use
                    industry-leading
                    technologies that will make your website really fast!</p>
                <div class="width-slider">
                    <div class="row autoplay autoplay_slider">
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/directadmin.png" alt="directadmin">
                            </div>
                        </div>
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/CloudLinux.png" alt="CloudLinux">
                            </div>
                        </div>
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/encrypt.png" alt="encrypt">
                            </div>
                        </div>
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/directadmin.png" alt="directadmin">
                            </div>
                        </div>
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/CloudLinux.png" alt="CloudLinux">
                            </div>
                        </div>
                        <div class="col-md-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/encrypt.png" alt="encrypt">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Feature in Market-->
<section class="awesome-youstable affiliate-two affiliate-four">
    <div class="container">
        <div class="right-cols-awesome">
            <div class="text-center">
                <h2 class="ay_heading ">What Makes Shared Web Hosting with YouStable Awesome?</span></h2>
                <p class="server-title title_sides_width pb-3">YouStable’s remarkably designed Linux Shared Web Hosting
                    features make it worth
                    using.</p>
                <p class="purple-text_dark see-yourself">See for yourself!</p>
            </div>
            <div class=" ">
                <div class="row text-left">
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/NVMe-SSD-Storage.svg" alt="ssd-storage">
                            <h5 class="ay-heading">NVMe SSD Storage</h5>
                            <p class="ay-title m-0 w-100">Get access to the best quality NVMe SSD hardwares to ensure a
                                smooth data
                                transfer between the server and your customers!</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/Free-SSL-Certificate.svg" alt="ssl-certificate">
                            <h5 class="ay-heading">Free SSL Certificate</h5>
                            <p class="ay-title m-0 w-100">Enjoy impenetrable website security with our encrypted network
                                hosting. Get
                                free SSL for full protection against online threats.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/LiteSpeed-Web-Server.svg" alt="speed-web-server">
                            <h5 class="ay-heading">LiteSpeed Web Server</h5>
                            <p class="ay-title m-0 w-100">Boost your website's speed with LiteSpeed web server – 5x
                                faster. Stay ahead
                                with our cutting-edge hosting technologies.</p>
                        </div>
                    </div>
                </div>
                <div class="row text-left mt-4">
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/99.9-Server-Uptime.svg" alt="Free Migration">
                            <h5 class="ay-heading">99.9% Server Uptime</h5>
                            <p class="ay-title m-0 w-100">Ensure peace of mind with our 99.9% uptime guarantee, keeping
                                your website
                                seamlessly available for your customers.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/Auto-Backups.svg" alt="auto-backup">
                            <h5 class="ay-heading">Auto Backups</h5>
                            <p class="ay-title m-0 w-100">Focus on your business while our smart features monitor server
                                resources,
                                notifying you promptly for updates or upgrades.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/247-Support.svg" alt="support24">
                            <h5 class="ay-heading">24/7 Support</h5>
                            <p class="ay-title m-0 w-100">At YouStable, we're here for you 24/7! Reach out via live
                                chat, ticket, or email—we're always ready to help!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--Performance section-->
<section class="performance-sec plans">
    <div class="container">
        <div class="text-center">
            <h2 class="Banner-Heading">Quality Standards For Optimum Performance</h2>
            <p class="server-title server-title-width mt-0 mt-p">As you know, we never compromise with quality!! All
                thanks to
                our quality features which we provide at no additional cost.</p>
        </div>

        <div class="row nav nav-pills mb-3 tab-four-heads" id="pills-tabs" role="tablist">
            <div class="col-lg-3 quality-standard">
                <p class="nav-item" role="presentation">
                    <button class="nav-link active teb-bg-purple" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <li class="color-black-1"><span class="text-dark dot"><img
                                    src="assets/img/newImages/nvme-ssd-1.svg" alt="migration"></span>Fast
                            Nvme SSD Storage</li>
                    </button>
                </p>
            </div>
            <div class="col-lg-3 quality-standard">
                <p class="nav-item" role="presentation">
                    <button class="nav-link teb-bg-purple" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <li class="color-black-1"><span class="text-dark dot"><img
                                    src="assets/img/newImages/optimized-servers.svg" alt="migration"></span>Optimized
                            Servers</li>
                    </button>
                </p>
            </div>
            <div class="col-lg-3 quality-standard">
                <p class="nav-item" role="presentation">
                    <button class="nav-link teb-bg-purple" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <li class="color-black-1"><span class="text-dark dot"><img
                                    src="assets/img/newImages/advanced-control-panel.svg"
                                    alt="migration"></span>Advanced Control Panel
                        </li>
                    </button>
                </p>
            </div>
            <div class="col-lg-3 quality-standard">
                <p class="nav-item" role="presentation">
                    <button class="nav-link teb-bg-purple" id="pills-uptime-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-uptime" type="button" role="tab" aria-controls="pills-uptime"
                        aria-selected="false">
                        <li class="color-black-1"><span class="text-dark dot"><img
                                    src="assets/img/newImages/guaranteed-uptime.svg" alt="migration"></span>Guaranteed
                            Uptime</li>
                    </button>
                </p>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active border tab-titles" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab">
                <h5 class="heading-servers m-0">NVMe SSD Powered Servers</h5>
                <p class="server-title py-2 m-0">We proudly say that our server infrastructures are best in the market.
                    You know
                    why? Because we use the top class and latest hardware equipment such as fast NVMe SSD drives ensure
                    blazing
                    fast data transport between the server and your audience.</p>
            </div>
            <div class="tab-pane fade border tab-titles" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <h5 class="heading-servers m-0">Optimized Servers</h5>
                <p class="server-title py-2 m-0">No matter which CMS you use to manage your content or website we have
                    optimised
                    our server to easily and smoothly function with all!! Whether you use WordPress, Joomla, Magento or
                    any other
                    popular CMS our servers are compatible with every popular CMS in the market.</p>
            </div>
            <div class="tab-pane fade border tab-titles" id="pills-contact" role="tabpanel"
                aria-labelledby="pills-contact-tab">
                <h5 class="heading-servers m-0">Advanced Control Panel</h5>
                <p class="server-title py-2 m-0">To ensure that you can easily website files and server resources we
                    provide the
                    best and most popular control panels which you can easily avail based on your needs. For example we
                    provide
                    both cPanel and DirectAdmin so that you have a better options to go with either budget friendly or
                    feature-rich control panel.</p>
            </div>
            <div class="tab-pane fade border tab-titles" id="pills-uptime" role="tabpanel"
                aria-labelledby="pills-uptime-tab">
                <h5 class="heading-servers m-0">Uptime Guaranteed</h5>
                <p class="server-title py-2 m-0">What if my website gets down? Well no worries!! We don’t let that
                    question
                    arise because our servers are equipped with the high security features and dedicated team of
                    technical experts
                    that constantly monitors your resources to remove all the vulnerabilities which can cause your
                    website
                    downtime.</p>
            </div>
        </div>
    </div>
</section>



<!--app installer-->
<section class="app-installer">
    <div class="container">
        <div class="text-center">
            <h2 class="Banner-Heading shared-heading-plan">One-Click App Installer</h2>
            <p class="server-title server-title-width effort">Effortlessly install WordPress, OpenCart, and more with
                Softaculous – the GUI-based installer. Enjoy seamless application installations without any errors or
                issues.
            </p>
            <div class="row">
                <div class="col">
                    <img src="assets/img/newImages/all-apps.svg" alt="open cart" class="deploy-app-imgs">
                </div>
            </div>
        </div>

        <div class="text-center mt-5 deploye">
            <a class="link-color-black" href="#explore"><button class="btn-yellow get-tarted-table get-tarted-table-one"
                    type="submit">Deploy Your Application</button></a>
        </div>



    </div>
</section>


<!-- include table-comparison  -->
<?php include 'inc/sharedWpComparisonPlans.php'; ?>
<!-- include table-comparison  -->
<!--(What our customer says) -->
<?php
include('inc/customer-reviews.php');
?>

<!--(FAQ)-->
<section class="faq">
    <div class="container">
        <h2 class="text-center faq-question">FAQs</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button acc-purple-bg" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        What is a shared hosting website?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Shared web hosting is a service in which multiple websites are hosted on
                        the same
                        server. In simple words, server resources are distributed to multiple customers to cut down the
                        server cost.
                    </div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        What is the benefit of shared web hosting?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">There are multiple benefits of shared web hosting that makes it the most
                        popular
                        choice, especially among the initial bloggers. Here are some of them mentioned below:
                        <ul>
                            <li>- Very budget friendly</li>
                            <li>- Easy to avail</li>
                            <li>- Instant setup</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Is shared hosting good for blogs?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes….!<br> Those bloggers who are at the initial stage of their journey
                        can start
                        with Shared web hosting to set up a website and understand everything in detail.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Does Shared web hosting include free domain names?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes…..!<br> We offer a free domain (.com ) with our annual and triannual
                        plans
                        that you can easily avail without paying any extra charges.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFour">
                        Can I migrate my website to your shared web hosting?
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes….!<br> We offer free migration for up to 5GB that you can avail to
                        transfer
                        your website from your existing service providers to our quality services if you are not
                        comfortable with
                        their services.</div>
                </div>
            </div>
        </div>
    </div><br><br>
</section>

<!--customer support-->
<div class="container customer-support-container">
    <section class="bg-light-yellow" style="padding: 15px;">
        <div class="row reverse ">
            <div class="col-lg-6 support-rev">
                <div class="mt-4">
                    <h2 class="ay_heading text-start">Have Concerns?</h2>
                    <p class="server-titles py-4">Connect to our Best Technical Support Team now! Our Staff is online
                        24/7 and accessible via LiveChat Window, Ticket Support, Call and email.</p>
                </div>
                <div class="d-flex">
                    <div class="contact-hosting one">
                        <img src="assets/img/phone-call.png">
                    </div>
                    <div class="mb-4">
                        <a href="tel:+919616782253" class="contact-hosting one" data-toggle="tooltip"
                            data-placement="top" target="_self"
                            data-bs-original-title="Contact us anytime">+919616782253</a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="contact-hosting one">
                        <img src="assets/img/newImages/Expert-Support.svg">
                    </div>
                    <div class="mb-4">
                        <a href="javascript:void(Tawk_API.toggle())" class="contact-hosting one" data-toggle="tooltip"
                            data-placement="top" target="_self" data-bs-original-title="Click to Chat">Live Chat with
                            Experts</a>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <div class="col-lg-6 support-rev">
                <img class="thinking-girl support-imgs" src="assets/img/support-new.png">
            </div>
        </div>
    </section><br>
</div>


<?php include('inc/footer.php') ?>