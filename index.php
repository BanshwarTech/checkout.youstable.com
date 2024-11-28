<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$page = 'Home';
include('inc/header.php');
?>

<style>
    .section-p {
        height: 30vh !important;
        top: 300px !important;
        margin-top: 80px;
    }

    .customer-support-container {
        margin-bottom: 30px;
    }

    section.rating-section {
        padding: 0;
        margin: 78px 0;
    }

    #pills-tab {
        justify-content: center;
    }

    section.performance-sec.plans {
        margin-top: 0;
    }

    .tab-pane {
        border-radius: 30px;
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
        /*padding: 20px 0;*/
        width: 100%;
    }
</style>

<!-- Banner section -->
<section class="banner-sec share-bg-four">
    <div class=" container">
        <div class="row reverse">
            <div class="col-md-6">
                <div class="banner-left-content ">
                    <h1 class="Banner-Heading padding-heading">Fast and Reliable Web Hosting</h1>
                    <p class="Banner-title">Start your Website with our best-in-class hosting solution, with top-notch
                        security, unbeatable performance and extreme Hardware Reliability!</p>
                    <div class="d-flex gap-3 lists-hosting">
                        <ul class="banner-list list-unstyled">
                            <li class="purple-text_dark mb-3 color-black-1"><span class="text-dark dot"><img
                                        src="assets/img/newImages/domain_1.svg" alt="ssd"></span>Free Domain
                            </li>
                            <li class="purple-text_dark color-black-1"><span class="text-dark dot"><img
                                        src="assets/img/newImages/ssl.svg" alt="manage"></span>Free SSL</li>
                        </ul>
                        <ul class="banner-list list-unstyled">
                            <li class="purple-text_dark mb-3 color-black-1"><span class="text-dark dot"><img
                                        src="assets/img/newImages/email.svg" alt="migration"></span>Free Emails</li>
                            <li class="purple-text_dark color-black-1"><span class="text-dark dot"><img
                                        src="assets/img/newImages/migration.svg" alt="support"></span>Free Migration
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="#explore"><button class="btn-yellow btn-explore-plan">Get Started Today <i
                            class="fa-solid fa-arrow-right"></i></button></a>
                <p class="Money-Back-Guarantee"><img src="assets/img/ic-shield.png" alt="shield">30-Day Money-Back
                    Guarantee</p>
            </div>
            <div class="col-md-6">
                <img class="banner_img floatings" src="assets/img/cloud-hosting.png" alt="Banner">
            </div>
        </div>
    </div>
</section>

<!-- Third section (Rating section) -->
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

<!-- Fourth sec (Explore Plan section) -->
<section class="explore-section mt-5 plans-mobile-one" id="explore">
    <div class="text-center shared-hosting-plan-heading web-host">
        <h2 class="server-heading shared-heading-plan">Choose the Perfect Web Hosting for your Site</h2>
        <p class="server-title choose">Choose the Perfect Web Hosting Solution from among the various options provided
            as under.<br> Don’t know which one to Go for? Let us help you! Connect with <a href="https://www.youstable.com/contact-us" target="_blank">our Sales Team</a> Now!
        </p>
    </div>

    <div class="container">
        <div class="row flex_unset" style="flex-direction: row-reverse;">
            <div class="col-md-4 explore-cols">
                <div class="position-relative h-100">
                    <div class="upper-card home-uppercard">
                        <!--<img class="hosting-icons" src="assets/img/dedicated-server.png" alt="dedicated server">-->
                        <h4 class="hosting-heading">DEDICATED SERVER</h4>
                        <div class="price-container">
                            <p class="hosting-price indian-host-price"><span class="hin-rs">₹</span>4999</p>
                            <p class="hosting-price usa-host-price"><span class="hin-rs">$</span>60.00</p>

                            <p class="per_month">/month</p>
                        </div>

                        <p class="regular-price regular-indian-price">Regular price<span class="cross-price">
                                ₹6,665/month</span></p>
                        <p class="regular-price regular-usa-price">Regular price<span class="cross-price">
                                $79.97/month</span></p>

                        <!-- Dedicated Server Plan -->
                        <a href="dedicated-servers.php"> <button class="btn-yellow exploreplan-btn">Get Started</button></a>

                        <div class="hosting_specification">
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>4 CPU</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>32 GB DDR4</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>480 GB SSD</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>10TB/1Gbps Bandwidth</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>Full Root Access</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>IN/NL/USA Location</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p class="m-0">Free Control Panel</p>
                            </div>
                        </div>
                        <div class="free_setup btn-yellow ">
                            <p class="m-0">Free Set-up</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 explore-cols">
                <div class="position-relative h-100">

                    <div class="upper-card home-uppercard" style="background: #FEFDFF;">
                        <div class="most-popular-hosting btn-light-purple">
                            <p class="m-0">Most Popular</p>
                        </div>
                        <!--<img class="hosting-icons" src="assets/img/vps-hosting.png" alt="vps hosting">-->
                        <h4 class="hosting-heading">VPS HOSTING</h4>
                        <div class="price-container">
                            <p class="hosting-price indian-host-price"><span class="hin-rs">₹</span>574</p>
                            <p class="hosting-price usa-host-price"><span class="hin-rs">$</span>7.23</p>
                            <p class="per_month">/month</p>
                        </div>
                        <p class="regular-price regular-indian-price">Regular price<span class="cross-price">
                                ₹1,149/month</span></p>
                        <p class="regular-price regular-usa-price">Regular price<span class="cross-price">
                                $13.779/month</span></p>
                        <a href="vps-hosting.php"><button class="btn-purple exploreplan-btn">Get Started</button></a>
                        <div class="hosting_specification">
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>1 CPU</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>4 GB RAM</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>50 GB NVMe SSD</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>750 GB Bandwidth</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>Full Root Access</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>IN/NL/USA Location</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p class="m-0">99.9% Uptime</p>
                            </div>
                        </div>
                        <div class="free_setup btn-light-purple">
                            <p class="m-0">Sale 50%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 explore-cols">
                <div class="position-relative h-100">
                    <div class="upper-card home-uppercard">
                        <!--<img class="hosting-icons" src="assets/img/shared-plan.png" alt="shared plan">-->
                        <h4 class="hosting-heading">SHARED PLAN</h4>
                        <div class="price-container">
                            <p class="hosting-price indian-host-price"><span class="hin-rs">₹</span>49</p>
                            <p class="hosting-price usa-host-price"><span class="hin-rs">$</span>0.60</p>
                            <p class="per_month">/month</p>
                        </div>
                        <p class="regular-price regular-indian-price">Regular price<span class="cross-price">
                                ₹249/month</span></p>
                        <p class="regular-price regular-usa-price">Regular price<span class="cross-price">
                                $3.10/month</span></p>
                        <a href="shared-hosting.php"><button class="btn-yellow exploreplan-btn">Get Started</button></a>
                        <div class="hosting_specification">
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>Host 1 Website</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>50 GB NVMe SSD</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>Unmetered Bandwidth</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>512MB RAM</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>Free SSL Certificate</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>DirectAdmin Panel</p>
                            </div>
                            <div class="d-flex gap-2 specifications">
                                <img src="assets/img/speci-tick.png" class="specification-tick" />
                                <p>99.9% Uptime</p>
                            </div>

                        </div>
                        <div class="free_setup btn-yellow ">
                            <p class="m-0">Sale 80%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fifth sction (What Makes YouStable Awesome?)-->
<section class="awesome-youstable affiliate-two affiliate-four">
    <div class="container">
        <div class="right-cols-awesome">
            <div class="padding-r-l text-center">
                <h2 class="ay_heading">What Makes YouStable<span class="awesome-q line-1 anim-typewriter">
                        Awesome?</span></h2>
                <p class="server-title title-sides-width">At YouStable, get everything for your online business, from
                    static websites to e-commerce stores or CRMs. <br class="remove-mobile"> Enjoy lightning-fast
                    performance, unmatched security, scalable plans, and 24/7 customer support.</p>
            </div>
            <div class="sides-width">
                <div class="row">
                    <div class="col-md-4 cols-aws-you">
                        <div class="left-cols-awesome">
                            <img src="assets/img/newImages/incredible-security.svg" alt="uptime">
                            <h5 class="ay-heading">Incredible Security</h5>
                            <p class="ay-title">Get advanced security with DDoS Protection, offering attack detection
                                and mitigation to block harmful traffic from accessing your website.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-aws-you">
                        <div class="left-cols-awesome">
                            <img src="assets/img/newImages/123.svg" alt="refund">
                            <h5 class="ay-heading">Multiple Data Centers</h5>
                            <p class="ay-title">Targeting a global audience? YouStable lets you select a <a href="https://www.youstable.com/data-center.php" target="_blank">data center</a>
                                location to enhance your website's local search visibility.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-aws-you">
                        <div class="left-cols-awesome">
                            <img src="assets/img/newImages/uptime.svg" alt="support">
                            <h5 class="ay-heading">99.99% Uptime</h5>
                            <p class="ay-title">Ensure your website is available 24/7 to the visitors of your website.
                                Get 99.99% committed Uptime and enjoy uninterrupted services at YouStable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Sixth section (High quality Server) -->
<section class="high-q-server">
    <div class=" container">
        <div class="bg-purple">
            <div class="text-center">
                <h2 class="server-heading">Our Industry Leading Technology Partners</h2>
                <p class="server-title title_sides-width">Our hosting infrastructure uses top-tier technologies: Dell
                    servers, AMD & Intel processors, <br class="remove-mobile"> BitNinja for security, and LiteSpeed for
                    20x faster website speeds.
                </p>
                <div class="width-slider">
                    <div class="row autoplay autoplay_slider">
                        <div class="col-lg-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/directadmin.png" alt="directadmin">
                            </div>
                        </div>
                        <div class="col-lg-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/CloudLinux.png" class="cloud-linux" alt="CloudLinux">
                            </div>
                        </div>
                        <div class="col-lg-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/encrypt.png" alt="encrypt">
                            </div>
                        </div>
                        <div class="col-lg-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/directadmin.png" alt="directadmin">
                            </div>
                        </div>
                        <div class="col-lg-3 server-cols">
                            <div class="bg-lt-black">
                                <img src="assets/img/CloudLinux.png" class="cloud-linux" alt="CloudLinux">
                            </div>
                        </div>
                        <div class="col-lg-3 server-cols">
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

<!-- Seventh sction (Features that Make Your Website Powerful)-->
<section class="awesome-youstable affiliate-two affiliate-four">
    <div class="container">
        <div class="right-cols-awesome">
            <div class="text-center">
                <h2 class="ay_heading">Features that keep Us ahead</span></h2>
                <p class="server-title title_sides_width">Boost your online business with Us! We specifically focus on
                    the growth of your website,<br class="remove-mobile"> by offering the Top Best Quality Hosting
                    features that make us stand apart.</p>
            </div>
            <div class="features-awesome ">
                <div class="row text-left">
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/NVMessd.svg" alt="ssd-storage">
                            <h5 class="ay-heading">NVMe Storage</h5>
                            <p class="ay-title m-0 w-100">Ensure instant data transfer and boost the website loading
                                speed to engage a maximum number of viewers with the Latest NVMe Storage.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/SSL-certificate.svg" alt="ssl-certificate">
                            <h5 class="ay-heading">Free SSL Certificate</h5>
                            <p class="ay-title m-0 w-100">Get a Free LetsEncrypt SSL Certificate to secure a 100%
                                encrypted connection with the visitors of the website and ensure the finest data
                                security.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/newImages/Advanced-Security.svg" alt="speed-web-server">
                            <h5 class="ay-heading">Advanced Security</h5>
                            <p class="ay-title m-0 w-100">We offer amazing security features that include WAF,
                                Multi-layered Security and Standard DDoS Protection for Fully protected Hosting grounds.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row text-left mt-4">
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/site-migration.svg" alt="Free Migration">
                            <h5 class="ay-heading">Free Site Migration</h5>
                            <p class="ay-title m-0 w-100">Having a website registered with an existing hosting firm &
                                eager to shift? Take no worries, as We provide Free Website Migration to YouStable.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/icons/daily-backup.svg" alt="auto-backup">
                            <h5 class="ay-heading">Free Backup*</h5>
                            <p class="ay-title m-0 w-100">Here, At YouStable, we offer Free BackUp along with One-Click
                                Data Restoration, allowing swift access to your backup data within a few seconds.</p>
                        </div>
                    </div>
                    <div class="col-md-4 cols-awesome-youstable">
                        <div class="feature_cols_desciption">
                            <img src="assets/img/newImages/Expert-Support.svg" alt="support24">
                            <h5 class="ay-heading">Expert Support</h5>
                            <p class="ay-title m-0 w-100">24/7 Expert LiveChat, Ticket Support, Call and email help with
                                full expert assistance to ensure your technical issues are resolved instantly.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- eight section (Find Your Perfect Domain Name) -->
<section class="choose-domain">
    <div class=" container">
        <div class="bg-light-yellow" style="border: 1px solid #292929;">
            <div class="text-center">
                <h2 class="server-heading">Find Your Perfect Domain Name</h2>
                <p class="server-title title_sides-width">A perfect domain, now rightfully yours.</p>
                <form action="https://www.youstable.com/manage/cart.php?a=add&domain=register&query=" method="post"
                    class="input-group search-domain">
                    <input type="text" autocomplete="off" class="form-control border-0 search-domain-inp"
                        placeholder="Enter Your Domain Name Here" name="query" id="searchDomain">
                    <button class="search_domain-btn btn-yellow" id="basic-addon2" type="submit">Search</button>
                </form>
            </div>
            <div class="domain-cost-container">
                <div class="row block">
                    <div class="col-lg-2 wid-mobile-two">
                        <p class="domain-amount">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="a"
                                width="70" height="70" viewBox="0 0 35 35">
                                <image width="278" height="239" transform="translate(-3.539 .935) scale(.154)"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARYAAADvCAYAAAA3p/sqAAAMrElEQVR4nO3dsW/j1gHH8Z/STl3sokOLIjkrKDLb3drplKFznFmorFuCAAEa318Q3V9wzh9QnCxAc3xDgQIZQgMHtFvOcxcJ7dDmGsAuigw5UOzAp0D1WRL5+JNEyd8PoMWW+EiJ/PG9x8fHRpZlAgCntza9AgB2D8ECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsfrzpFdg1jfagKak559+jbNgZrW1lKmq0B60F/77Ohp2Xa1oVq0Z7cCRpX1Lr1r8SGbdrZl+YlidJ15JeOsupo0aWZZteh60Wdp7j8HpY8GOXynfiizrtXI32YLodR5IOC37sSvmBcpENOxerWreqwu90KqkraW/J28eSLiSdlT0RzJRzLOlgydtvlH93/WzY6Zcpp+4IlkiN9qCrfAcqegDOM5bUU35gXldcVmnhQOgpPxCWHXDL3Eg6U35A2ral0R4kJT9yOg3sRnuwr3z7Po0s/kk27PSWvclQzlhSb1cChmApKTQPzlQ9UG67Ub5jnZmXe6dwIJxJOlnB4q0B02gPyu6k72fDThK2MVH13+pKUmvetoSm1YWW11CKuJR0vImTjBPBUpDhjFTUlaTuKptIobZ1puo1lGXGyrclqbKQmGBR3sRI5DsB3BkuofnYl/e7HCsPl9o0k8viqlAB4YyUaPWhIuUHwtfh4LdqtAf7jfagL+mZVh8qUn4G/6rRHpyuoazbEnlrlYeSprUgST/UXr+Q/7s8CGUdmZe7NgTLEjOh4m76LPMshIDFTLNgFU2fZZ46t6WAnlbzex2GZc82f1ZlT9LFbJBtE4JlgZlQWcfZ/S4njgPS2NdQhWVbCip6dS7Gp6Gm0tfq94uDUM7WIVjmqEGoTDkOyL42GypTJxtqFrl9pfV9nx8sGU9USwTLHcIZvq/Nh8rUSWyfS6M96En6wLo21TzdxgNlw3qbXoGyCJa79VSPM/ysszDmpLBQ6/psNatTydb2HWzIw23ryCVYbgln03Vc/SlrT/kl4jL6K1gPh5htue+ON70CZRAsb+pvegUWKNzeDk2nutW6Zp2UrYHdc61Nr0AZ3IQ4IxyMVUdP3ii/DJlIGoW/7Su//+ZY1Q/2nortZL2K5Uw9Vz7YbGpfxe6DKaKn/N6ddbhR/ptMt2V6E+Iqwvf2dyZV/+1XeaXLbqtG3jb/OjlSvjPMts9HkpLRb94aVV1+oz14qfgfv9CQ/DBS80zVDsz3F41mDQH5rMLylw7JDzWnnqrv8D9dNnw9YuTtbefK7x96o5ywHRfydNRfKR8xO7rrn1V/l2zYacR+dt22Iliaf0m7ynfiRQfjpaTe6Lc/SmLKCJ1jX8d8Vkt2qDnl9RU/WO08G3a6C5adKP6AL7Ut4fLx08iyJOlxgTCuspMu/K7C8ruqFsRSHsbNAiHZV/zvvvCEUie17mM5ePF6/+DF6yRLJ8+ydHKQpRMteD3M0slXBy9e9w9evI654tCNXM3pPSSjMh8KO/t5ZJkn866qhL9XCZVS2xJC4VFkedJqm0JXyu9AXyjcURz7W0zNvUnxltOwXjuttsHy4PL7/SzNkizNHmZpphKvkyzNkgeX35cNl9he927snaghXC4jy23N+XvsdoxV/OD4P+HAfBxZ7uEKO3HLbE+VgXvnRW8YDOuz81fEahssSieJ0smh0okiXodKJ4V/vHCWj+nzKLxDLdCN/Fyr5N+XiQ5I6Yeaizskq3heZnvCe2PXv+w9Q7WdEMullleF3vnyu56q99afvPPld/2//+4nSYH3xg4+6kV+7gfZsDNqtAcfRqzDaM7fY7bl0tR27ykf7l5WS/7L/DGBnyiuGZmUeXM27Fw32oMble8wbpZ8/8bULlje/vN/91WtWjrrTMUOtFbEsq9c89eGKR1dZ7GYQO47Cg6TK41VvvbXdJR/y9rmMoms6b1U+RBrRpSzEfVrCqWTY6WTvcgm0BtNorf/9J8iwRLT2Vu76myFYd/ObUkiPrOKMRoxB3sS8ZnY5tNOq12wZGnWKtlZu+zVKlBszAFZx9m9YgJybJ4GsY7fC9asdk0hpZOmeYmrutltq+cknTEyL49gQf2CJUsn7kVu1V2hwC64D8HCGRRYs9oFi9LJtjQxdmU+EXeNrmleHrZQHTtvE3PnbVKg2CLvua2OTayYUN4zj3yN+V5ujOWjBmoYLJOLJfcElXmN//n7XyQFio05IGs38U6FUcAt42rEfC80V3dM7ZpC/+r+cvTzP/7jXJ7HVPQLvi9mxz5stAdNxyC5mYeUlzJntOyVyg+S68kwSC5MCRFza8Sy7z9mm7BBtQsWScrSyamqP0v46puPHvQKlZePGI0po6eKd+eGZkii8tt6pbubHTFzyhw02oOu4bnBsSOmlwXLtvS7IahdU0iSvvnowXU2mRxnk4kiXzfZZFK2Sh4zgvLEMOP8meICdN5o2SR2PapMcB3mZYkdQVu7UcyoppbBIkmvPm4mSrP3lWY3SjOVeF0pzVqvPm6OShYZu3NfxA6lD5P+xD6aY976xm7Hnm49QrSoMFFS7GRPpe5CxnaobbBI0qtP3k2ydHKUpZPzgp21T7J00nr1ybsxfSb9yNWcHpCtoh+YeYZybD/S1byO2nCQPo9c7vT5xIWDMjy3qMrsa9RWdlAt+1hm/fsPvxpJ6v7s6d96yvtdbjdxrpVX//vfPn6vynwi1432ILbTeE/5w88/Vz7v7dz1CGf32ObP1LK5ZvqKrwlNH0r/RFJ/wfytLVWf83Y68Th2TO2DZerbx++NFCZ4XmExPVW7GvWp8mf7XurNvo6m8su6VWe3Hy/rZM2GnYvI6QtmfSbps0Z7cKV8W6Zh2ZRnOyTpgmbQbtqaYFmHMOmS41L3Q63ucQ29gu87lfSFobxDre5Sb29Fy8WG1bqPZUNOVd+RoJdFLwmHyaPqPFfIE9dEWagfguWWUDXvbXo97nCj8mNmuqpnSI51DyaUvs8IljuEiaFjr6ysymnEI0ZG8k3z6XRM38puI1jm66o+z3/5PHZUrOmZOU6PDE82QM0RLHOEM+qxNt+UOM+GnUq1jooPR3N6ZLhtAFuAYFkgNCWOtLmay9LHgxZVg3AhVO4RgmWJEC4trf8KyxNXqEyF5cU+sTDWjaQPCZX7hWApIBt2rrNhpyXpyRqKGyt/+HdvFQsPHdO/1npqYZeSjsKlb9wjBEsJ4WB/V6tpUtwoD64j01MJ58qGnZfZsHOkvPayij6ksfJaSqkHzGN3ECwlZcPOKDQppgFT9cAcKw+UZjbsLLzPyC3UXpqSHoX1qOq58kBpUku53xpZlm16HbZemDmtFV5Fhr9fKp/cqF+nS6/hruZWeB1p+f1Al8qfS5SI+34wg2BZgTArXPOOf422sWlwa0qI6zqFIeqJYAFgRx8LADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADYESwA7AgWAHYECwA7ggWAHcECwI5gAWBHsACwI1gA2BEsAOwIFgB2BAsAO4IFgB3BAsCOYAFgR7AAsCNYANgRLADsCBYAdgQLADuCBYAdwQLAjmABYEewALAjWADY/Q/21Shei/LZzgAAAABJRU5ErkJggg==" />
                            </svg> ₹873
                        </p>
                    </div>
                    <div class="col-lg-2 wid-mobile-two">
                        <p class="domain-amount">
                            <svg xmlns="http://www.w3.org/2000/svg" id="a" width="70" height="70" viewBox="0 0 35 35">
                                <path
                                    d="M3.435,19.856c.54,0,.983.443.983.983s-.443.983-.983.983-.983-.443-.983-.983.443-.983.983-.983Z"
                                    fill="#d1cd34" stroke-width="0" />
                                <path
                                    d="M8.918,15.311c1.463,0,2.554.828,2.554,1.644,0,.503-.371.755-.815.755-.827,0-.527-1.031-1.787-1.031-.684,0-1.486.468-1.486,2.05,0,1.092.516,1.8,1.475,1.8,1.224,0,.96-1.128,1.883-1.128.444,0,.731.324.731.672,0,.768-.863,1.823-2.662,1.823-2.159,0-3.179-1.332-3.179-3.167,0-2.015,1.14-3.418,3.287-3.418Z"
                                    fill="#d1cd34" stroke-width="0" />
                                <path
                                    d="M15.386,15.311c2.111,0,3.238,1.439,3.238,3.286,0,1.751-.852,3.299-3.238,3.299s-3.238-1.548-3.238-3.299c0-1.847,1.128-3.286,3.238-3.286ZM15.386,20.6c1.044,0,1.487-.936,1.487-2.003,0-1.139-.468-1.991-1.487-1.991s-1.487.852-1.487,1.991c0,1.067.444,2.003,1.487,2.003Z"
                                    fill="#d1cd34" stroke-width="0" />
                                <path
                                    d="M20.895,19.856c.54,0,.983.443.983.983s-.443.983-.983.983-.983-.443-.983-.983.443-.983.983-.983Z"
                                    fill="#d1cd34" stroke-width="0" />
                                <path
                                    d="M24.399,12.9c.504,0,.911.408.911.912s-.407.912-.911.912-.911-.408-.911-.912.407-.912.911-.912ZM23.524,16.187c0-.468.191-.876.875-.876s.876.408.876.876v4.833c0,.468-.192.876-.876.876s-.875-.408-.875-.876v-4.833Z"
                                    fill="#d1cd34" stroke-width="0" />
                                <path
                                    d="M26.763,16.187c0-.528.24-.876.792-.876s.791.348.791.876v.228h.024c.492-.647,1.127-1.104,2.123-1.104,1.056,0,2.207.528,2.207,2.303v3.406c0,.468-.192.876-.876.876s-.876-.408-.876-.876v-3.058c0-.708-.348-1.211-1.103-1.211-.612,0-1.332.504-1.332,1.38v2.89c0,.468-.191.876-.875.876s-.876-.408-.876-.876v-4.833Z"
                                    fill="#d1cd34" stroke-width="0" />
                            </svg> ₹476
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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



<!--Performance section-->
<section class="performance-sec plans">
    <div class="container">
        <div class="text-center">
            <h2 class="Banner-Heading">Get the Best Results with<br></h2>
            <h2 class="Banner-Heading fw-bold awesome-q line-1 anim-typewriter purple-text_dark managed-vps-hosting"> #1
                Managed VPS Hosting Platform
            </h2>
            <p class="server-title">From online project managers to professional web
                portfolios, SMBs, and web developers, <br class="remove-mobile">users trust our <a href="https://www.youstable.com/vps-hosting.php" target="_blank">managed VPS hosting</a>
                solutions to boost their online presence.</p>
        </div>

        <div class="row nav nav-pills mb-3 tab-four-heads" id="pills-tabs" role="tablist">
            <div class="col-lg-4 tab-wid">
                <p class="nav-item" role="presentation">
                    <button class="nav-link active teb-bg-purple" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <li class="color-black-1"><span class="text-dark dot"><img src="assets/img/newImages/CP.svg"
                                    alt="migration"></span>Multiple Control Panel</li>
                    </button>
                </p>
            </div>
            <div class="col-lg-4 tab-wid">
                <p class="nav-item" role="presentation">
                    <button class="nav-link teb-bg-purple" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <li class="color-black-1"><span class="text-dark dot"><img src="assets/img/newImages/DP.svg"
                                    alt="migration"></span>Anti DDoS Protection*</li>
                    </button>
                </p>
            </div>
            <div class="col-lg-4 tab-wid">
                <p class="nav-item" role="presentation">
                    <button class="nav-link teb-bg-purple" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <li class="color-black-1"><span class="text-dark dot"><img src="assets/img/newImages/RA.svg"
                                    alt="migration"></span>Full Root Access</li>
                    </button>
                </p>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active border tab-titles" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab">
                <div class="container">
                    <section class="">
                        <div class="row reverse">
                            <div class="col-lg-6">
                                <div class="mt-4"
                                    style="height: 100%;display: flex;flex-direction: column;justify-content: center;">
                                    <h2 class="ay_heading text-start">Multiple Control Panel</h2>
                                    <p class="server-titles py-4">Install control Panel which includes <a href="https://www.youstable.com/cpanel-vps" target="_blank">cPanel</a>,
                                        DirectAdmin, Cloud Panel, Plesk, and Free Premium <a href="https://www.youstable.com/cyberpanel-vps" target="_blank">CyberPanel with Addons</a> like
                                        Backupsv2, worth <strong>$139</strong> for Free.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img class="thinking-girl" src="assets/img/newImages/multiple-control-panel.png">
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <div class="tab-pane fade border tab-titles" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="container">
                    <section class="">
                        <div class="row reverse">
                            <div class="col-lg-6">
                                <div class="mt-4"
                                    style="height: 100%;display: flex;flex-direction: column;justify-content: center;">
                                    <h2 class="ay_heading text-start">Anti DDoS Protection*</h2>
                                    <p class="server-titles py-4">Be assured of the Security of your website! Enhanced
                                        DDoS Protection
                                        ensures Quick mitigation of online traffic attacks and secures your website.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img class="thinking-girl" src="assets/img/newImages/anti-DDoS-protection.png">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="tab-pane fade border tab-titles" id="pills-contact" role="tabpanel"
                aria-labelledby="pills-contact-tab">

                <div class="container">
                    <section class="">
                        <div class="row reverse">
                            <div class="col-lg-6">
                                <div class="mt-4"
                                    style="height: 100%;display: flex;flex-direction: column;justify-content: center;">
                                    <h2 class="ay_heading text-start">Full Root Access</h2>
                                    <p class="server-titles py-4">Want to make changes to your server settings? We give
                                        you complete
                                        Root access to your <a href="https://www.youstable.com/vps-hosting.php" target="_blank">Virtual private server</a> letting you configure it as per your
                                        requirements.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img class="thinking-girl" src="assets/img/newImages/full-root-access.png">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include('inc/customer-reviews.php');
?>



<!-- Eleventh section (FAQ) -->
<section class="faq">
    <div class="container">
        <h2 class="text-center faq-question">FAQs</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button acc-purple-bg" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Where is YouStable Located?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">YouStable is located in Lucknow, popularly known as the City of Nawabs,
                        in India. In spite of its location, YouStable, with 4+ data centers worldwide, offers
                        high-performing web hosting services across the globe.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Can I upgrade my web hosting plan later?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes, YouStable’s Web Hosting Plans are Highly Scalable, allowing users
                        to easily upgrade web resources as needed by their websites.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Does YouStable provide different types of web hosting services?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes, YouStable provides web hosting services from <a href="https://www.youstable.com/shared-hosting.php" target="_blank">shared</a>, <a href="https://www.youstable.com/wordpress-hosting.php" target="_blank">WordPress</a>,
                        VPS to <a href="https://www.youstable.com/dedicated-servers.php" target="_blank">dedicated servers</a> for storage and memory optimisation depending upon the specific needs
                        of the individual and enterprise.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Can I buy hosting without a domain name?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes! You can buy web hosting services without a Domain name. However,
                        if you do not have a Domain then you can take advantage of our Yearly Hosting Plan and grab a
                        free domain or else get your existing Domain Transfer to YouStable from your current Domain
                        provider.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFour">
                        Do I Need Technical Knowledge to Use Web Hosting?

                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">No! Even if you have Zero Technical knowledge of how to handle servers
                        and manage websites, our <a href="https://www.youstable.com/contact-us.php" target="_blank">dedicated expert staff</a> will assist you with server configuration at
                        all times.</div>
                </div>
            </div>

            <div class="accordion-item faq-items">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseFour">
                        How do I Know What kind of web hosting I need?

                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">If you want to start a new Blogging, Choose <a href="https://www.youstable.com/shared-hosting.php" target="_blank">Shared Hosting services</a>
                        with minimum hosting requirements. However, if you still have concerns, then Connect with our
                        Technical experts for friendly guidance.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Twelveth section-->
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
                            data-placement="top" title="Contact us anytime" target="_self">+919616782253</a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="contact-hosting one">
                        <img src="assets/img/newImages/Expert-Support.svg">
                    </div>
                    <div class="mb-4">
                        <a href="javascript:void(Tawk_API.toggle())" class="contact-hosting one" data-toggle="tooltip"
                            data-placement="top" title="Click to Chat" target="_self">Live Chat with Experts</a>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <div class="col-lg-6 support-rev">
                <img class="thinking-girl support-imgs" src="assets/img/support-new.png">
            </div>
        </div>
    </section>
</div>



<?php include('inc/footer.php') ?>