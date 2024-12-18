<?php
$page = 'vps-hosting';
include('inc/header.php');
?>

<style>
  .contact-hosting {
    font-size: 20px;
    font-weight: 400;
    line-height: 38.73px;
    color: #292929;
  }

  .border-box {
    padding-left: 10px;
    padding-right: 10px;
  }

  .why-choose {
    padding-top: 100px;
  }

  .upper-card {
    padding: 32px 18px;
    border-radius: 18px;
    border: 1px solid #CACACA;
    background: #FFFDF9;
    height: 100%;
    transition: 0.3s;
  }

  .hosting_specification {
    margin-top: 52px;
  }

  img.specification-tick {
    width: 22px;
    margin-right: 8px;
  }

  .specifications p {
    font-size: 19px;
  }

  .lists-hosting {
    margin-top: 28px;
  }

  .padding-heading {
    padding: 0 30px 15px 0;
  }

  /*unknown css*/
  .awesome-youstable {
    margin: 82px 0;
  }

  .rating-section {
    padding: 0;
    margin: 78px 0;
  }

  section.operating-sytems {
    padding-top: 0;
    padding-bottom: 0;
    margin: 120px 0;
  }

  .review-content,
  .customer-review {
    margin-bottom: 80px;
  }

  /*unknown css*/
</style>



<!-- Banner section (shared hosting) -->
<section class="banner-sec share-bg">
  <div class=" container">
    <div class="row align-items-center reverse-column">
      <div class="col-md-6">
        <div class="banner-left-content">
          <p class="experience">Powerful VPS Hosting</p>
          <h1 class="Banner-Heading padding-heading robust">Virtual Server for High Performance</h1>
          <p class="Banner-title p-0">Easily manage your website on flexible VPS servers built with the latest hardware
            technologies and experience.</p>
          <div class="d-flex gap-3 lists-hosting">
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3"><img src="assets/img/newImages/1-IPv4-IP-Address.svg" alt="tick"
                  class="tick-square"> 1 IPv4 IP Address</li>
              <li class="purple-text_dark"><img src="assets/img/newImages/US-NL-&-India-Locations.svg" alt="tick"
                  class="tick-square"> US, NL & India Locations</li>
            </ul>
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3"><img src="assets/img/newImages/Easy-to-scale.svg" alt="tick"
                  class="tick-square"> Easy to scale</li>
              <li class="purple-text_dark"><img src="assets/img/newImages/Free-Migration_1.svg" alt="tick"
                  class="tick-square"> Free Migration</li>
            </ul>
          </div>
        </div>
        <a href="#explore"><button class="btn-yellow btn-explore-plan">Get Started Today <i
              class="fa-solid fa-arrow-right"></i></button></a>
        <p class="Money-Back-Guarantee"><img src="assets/img/ic-shield.png" alt="shield">30-Day Money-Back Guarantee</p>
      </div>
      <div class="col-md-6">
        <img class="banner_img floatings" src="assets/img/vps-server-hero-image.png" alt="Banner" srcset="">
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
<section class="explore-section vps hosting-plan mt-4" id="explore">
  <div class="container">
    <div class="text-center margin-top-bottom ideak-choice">
      <h2 class="server-heading shared-heading-plan">Choose the Best VPS Hosting Plan for Your Needs</h2>
      <p class="server-title">Customise the Best KVM VPS hosting servers resources for your website as per your needs <br>and make it ultra-smooth on the internet without any hidden or additional charges.</p>
    </div>


    <?php include 'inc/vpsPlans.php'; ?>

  </div>
</section>


<!--new list section-->
<section class="new-list-section container">
  <div class="text-center margin-top-bottom ideak-choice">
    <h2 class="server-heading shared-heading-plan">All VPS Hosting Server Plans Come With</h2>
    <p class="server-title">From professional business to enterprise, we've got you covered!</p>
  </div>
  <div class="container ">

    <img src="assets/img/rocket-1.png" alt="rocket-icon" class="rocket-icons" />
    <div class="new-list-sec">
      <div class="row">
        <div class="col-lg-3 list-imp">
          <ul style="list-style: disc;">
            <li class="support-list">24/7/365 Support</li>
            <li class="support-list">SSH and SFTP Access</li>
            <li class="support-list">Weekly Backup</li>
            <li class="support-list">30-Day Money-Back</li>
          </ul>
        </div>
        <div class="col-lg-3 list-imp">
          <ul style="list-style: disc;">
            <li class="support-list">CDN Add-on</li>
            <li class="support-list">24/7 Live Monitor</li>
            <li class="support-list">Free Migration</li>
            <li class="support-list">HTTP/2 Enabled Servers</li>
          </ul>
        </div>
        <div class="col-lg-3 list-imp">
          <ul style="list-style: disc;">
            <li class="support-list">BitNinja Security</li>
            <li class="support-list">Dedicated IP</li>
            <li class="support-list">SQL Databases</li>
            <li class="support-list">Multi-DC Network</li>
          </ul>
        </div>
        <div class="col-lg-3 list-imp">
          <ul style="list-style: disc;">
            <li class="support-list">Higher Google Rank</li>
            <li class="support-list">Enterprise Hardware</li>
            <li class="support-list">MariaDB</li>
            <li class="support-list">Guaranteed Resources</li>
          </ul>
        </div>
        <div class="col-lg-3 list-imp">
          <ul style="list-style: disc;">
            <li class="support-list">PHP 7 & 8</li>
            <li class="support-list">Enhanced Security</li>
            <li class="support-list">Upgrade At Anytime</li>
            <li class="support-list">Host Unlimited Domains</li>
          </ul>
        </div>
      </div>
    </div>
    <img src="assets/img/rocket-1.png" alt="rocket-icon" class="rocket-icons rocket-icons-1" />
  </div>
</section>
<!--new list section-->


<!--Feature in Market-->
<section class="awesome-youstable affiliate-two affiliate-four">
  <div class="container">
    <div class="right-cols-awesome">

      <div class="text-center">
        <h2 class="ay_heading text-center mt-5">Why Choose YouStable for Your VPS Hosting Needs?</h2>
        <p class="server-title title_sides_width pb-3">Our budget-friendly fast VPS server hosting comes with robust
          features tailored to enhance your <br class="remove-mobile">website's speed, security, and stability, ensuring top-notch quality without
          compromise.</p>
        <!--<p class="server-title title_sides_width pb-3">Our services are backed by strong features that are especially focused on making your website more fast, secure and steady on the internet so that you can enjoy uncompromised quality.</p>-->
      </div>
      <div class="why-choose">
        <div class="row text-left">
          <div class="col-lg-6">

            <div class="d-flex gap-3 mt-5 align-items-center border-design-box">
              <div> <img src="assets/img/nvme-icon-why.svg" class="icons-why" alt="nvme-ssd"></div>
              <div>
                <h5 class="why-heading">Powerful NVMe SSD</h5>
                <p class="why-para">Get faster access and superior storage with NVMe Drives. Boost your
                  website’s performance dramatically</p>
              </div>
            </div>
            <div class="d-flex gap-3 mt-2 align-items-center border-design-box">
              <div> <img src="assets/img/ddos-icon-why.svg" class="icons-why" alt="nvme-ssd"></div>
              <div>
                <h5 class="why-heading">DDos Protected</h5>
                <p class="why-para">With the industry’s best DDoS Protected VPS Servers, you can protect your website proactively from malicious</p>
              </div>
            </div>
            <div class="d-flex gap-3 mt-2 align-items-center border-design-box">
              <div> <img src="assets/img/migration-icon-why.svg" class="icons-why" alt="nvme-ssd"></div>
              <div>
                <h5 class="why-heading">Effortless Migration</h5>
                <p class="why-para">Our team of Technical hosting professionals will seamlessly transfer all your websites to the new server</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="assets/img/why-choose-girl.jpg" alt="why-choose-girl" class="why-choose-girl">
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

<!-- Operating-Systems -->
<section class="operating-sytems">
  <div class="container">
    <div class="text-center">
      <h2 class="Banner-Heading">Enhanced VPS Hosting with Powerful Operating Systems
      </h2>
      <p class="operating-title-width">Experience the full potential of your Virtual Private Server with our Enhanced KVM VPS Hosting Servers, <br>featuring top-tier Operating Systems and Apps for unmatched performance!</p>
      <div class="row">
        <div class="col-md-3 server-cols">
          <div class="bg-lt-blacks">
            <img src="assets/img/servers/almalinux.svg" alt="open cart" class="">
          </div>
        </div>
        <div class="col-md-3 server-cols">
          <div class="bg-lt-blacks">
            <img src="assets/img/servers/rocky.svg" alt="open cart" class="">
          </div>
        </div>
        <div class="col-md-3 server-cols">
          <div class="bg-lt-blacks">
            <img src="assets/img/servers/ubuntu.svg" alt="open cart" class="">
          </div>
        </div>
        <div class="col-md-3 server-cols">
          <div class="bg-lt-blacks">
            <img src="assets/img/servers/windows.svg" alt="open cart" class="">
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5 choose-plan-now">
      <a href="#explore" class="link-color-black"><button class="btn-yellow   get-tarted-table get-tarted-table-one"
          type="submit">Choose Plan Now</button></a>
    </div>

  </div>
</section>



<!--Feature in Market-->

<section class="awesome-youstable affiliate-two affiliate-four">
  <div class="container">
    <div class="right-cols-awesome">
      <div class="text-center">
        <h2 class="ay_heading">Powerful Features For Your Unstoppable Growth</span></h2>
        <p class="server-title title_sides_width pb-3">We have equipped our servers with the most advanced features so
          that you can experience both high performance and super security for your website because we understand the
          value your data security</p>
        <!--<p class="purple-text_dark see-yourself">See for yourself!</p>-->
        <P></P>
      </div>
      <div class="features-vps">
        <div class="row text-left">
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Root-access.svg" alt="root-access">
              <h5 class="ay-heading">Root Access</h5>
              <p class="ay-title m-0 w-100">Full admin access allows you to manage your VPS hosting easily. It allows
                you to authorise any modification on your website.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Free-Migration.svg" alt="free-migration">
              <h5 class="ay-heading">Free Migration</h5>
              <p class="ay-title m-0 w-100">YouStable offers free migration of up to 5 GB of data to its Virtual Private
                Servers with NVMe SSD drive and user-friendly control panel.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Enhanced-Control-Panel.svg" alt="enhance-control-panel">
              <h5 class="ay-heading">Enhanced Control Panel</h5>
              <p class="ay-title m-0 w-100">Availability of multiple control panels like cPanel, DirectAdmin and more.
                They give an enhanced user interface....</p>
            </div>
          </div>
        </div>
        <div class="row text-left mt-4">
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Free-SSL-Cerificate.svg" alt="ssl">
              <h5 class="ay-heading">Let’s Encrypt SSL Certificates</h5>
              <p class="ay-title m-0 w-100">Ensure the trustworthiness of your website and keep your customer’s data
                safe. SSL adds to the authenticity of a website....</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Guaranteed-Resources.svg" alt="granted-resources">
              <h5 class="ay-heading">Guaranteed Resources</h5>
              <p class="ay-title m-0 w-100">Important resources like bandwidth, storage, RAM, and CPU have been
                optimized to guarantee the best VPS Hosting.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Monitoring-&-Alerts.svg" alt="monitoring-alerts">
              <h5 class="ay-heading">Monitoring & Alerts</h5>
              <p class="ay-title m-0 w-100">Monitor your website and get important alerts and updates about our best VPS
                hosting directly in your mailbox.</p>
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
    <div class="bg-purple purple" style="background: #fff;">
      <div class="text-center">
        <h2 class="server-heading">High Quality Servers with Industry Leading Technologies</h2>
        <p class="server-title title_sides-width">YouStable relies on the most renowned and trusted technologies to
          provide<br class="remove-mobile"> better uptime, unbeatable performance and quality services.</p>
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

<!--Review section-->
<section class="hosting-rating hosting-review">
  <div class="container">

    <div class="d-flex justify-content-between">
      <span class="text-start">
        <img src="assets/img/yellow-circle.png" class="floating yellow-circle">
      </span>
      <span class="text-end">
        <!--<img src="assets/img/floating-imgs.png" class="floating">-->
        <img src="assets/img/cloud-circle.png" class="movingcloud">
      </span>
    </div>
    <?php include('animate-text.php') ?>

    <div class="d-flex justify-content-between">
      <span class="text-start">
        <!--<img src="assets/img/floating-imgs.png" class="floating">-->
        <img src="assets/img/cloud-wave.png" class="movingclouds">
      </span>
      <span class="text-end">
        <!--<img src="assets/img/floating-imgs.png" class="floatingcloud">-->
        <img src="assets/img/wave-yellow.png" class="floating">
      </span>
    </div>


  </div>
</section>

<!--(What our customer says) -->
<?php
include('inc/customer-reviews.php');
?>



<!--(FAQ)-->
<section class="faq faq-1">
  <div class="container">
    <h2 class="text-center faq-question">FAQs</h2>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button acc-purple-bg" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            What is Managed VPS Hosting?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">As you may infer from its name, managed VPS servers are specially designed for
            beginners so that you can easily host, manage or modify your website on the high-quality KVM VPS servers
            even if you have no technical knowledge.</div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Which operating system should I choose for my VPS Server?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">It totally depends upon your needs and requirements. For example, if you want your
            server to be fast and quick, then you can choose Linux for your VPS servers because it is very lightweight,
            making it quite fast. But Linux is not easy to use, so we will recommend you choose Windows OS, all thanks
            to its GUI-based interface, which does not require any technical knowledge to operate.</div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Is a managed VPS better than shared hosting?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Yes, as the name suggests, the shared servers are distributed with multiple users
            so the performance is too!! That’s why shared servers can not provide high performance to your website. But
            VPS servers come with fixed resources so that you can enjoy the optimum and unrestricted performance for
            your website.</div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Do you provide Windows VPS hosting?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Yes, our servers are flexible enough to let you enjoy any operating system or
            application you want for your managed VPS hosting servers. Hence, no matter whether you are comfortable with
            Linux, Windows or any other popular operating systems to manage your website, you can easily choose our VPS
            hosting plans.</div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            How many IPs are included with VPS hosting?
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">We offer you 1 IP with our normal VPS hosting plans, but you can also get extra
            IPs by paying $5/mo to manage your website easily without facing any issues. For example, if your one IP is
            under a DDoS attack, then you can immediately switch to different IP to bypass that attack.</div>
        </div>
      </div>

    </div>
  </div>
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
            <a href="tel:+919616782253" class="contact-hosting one" data-toggle="tooltip" data-placement="top" target="_self" data-bs-original-title="Contact us anytime">+919616782253</a>
          </div>
        </div>
        <div class="d-flex">
          <div class="contact-hosting one">
            <img src="assets/img/newImages/Expert-Support.svg">
          </div>
          <div class="mb-4">
            <a href="javascript:void(Tawk_API.toggle())" class="contact-hosting one" data-toggle="tooltip" data-placement="top" target="_self" data-bs-original-title="Click to Chat">Live Chat with Experts</a>
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
</div><br>


<?php include('inc/footer.php') ?>