<?php
$page = 'dedicated-servers';
include('inc/header.php');
?>
<title><?= $page; ?></title>
<style>
  .contact-hosting {
    font-size: 20px;
  }

  .country-choose-btn.dedicated-button-click {
    padding: 10px;
    font-size: 18px;
    font-weight: 400;
    line-height: 26px;
    width: 172px;
    border: 1px solid #e5e5e5;
  }

  .country-choose-btn.active {
    color: #fff !important;
  }

  .choose-country-btn1 {
    border-radius: 30px 0 0 30px !important;

  }

  .choose-country-btn2 {
    border-radius: 0 30px 30px 0 !important;
    border-right: none !important;
    border-left: none !important;
  }


  .country-server-specs-head {
    border-bottom: 1px solid #CACACA;
  }

  .buy-now-btn {
    border: none;
    background: #ffc235;
    font-size: 15px;
    font-weight: 400;
    line-height: 19.36px;
    color: #292929;
    padding: 10px 20px 10px 22px;
    border-radius: 10px;
    transition: 0.3s;
  }

  button.buy-now-btn:hover {
    background: #ebb333;
    color: #292929;
  }

  .actual-prize {
    font-size: 14px;
    font-weight: 400;
    line-height: 19px;
    color: #FF2121;
    text-decoration: line-through;
  }

  .margin-top {
    margin-top: 42px;
  }


  section.rating-section {
    padding: 0;
    margin: 80px 0;
  }

  section.operating-sytems {
    padding: 0;
    margin-top: 80px;
  }

  section.add-ons {
    margin-bottom: 60px;
  }

  section.review-content {
    margin: 70px 0;
  }

  @media screen and (max-width: 768px) {
    img.dedicated-server-hero {
      width: 85%;
    }
  }

  /*.responsive-specs-table{*/
  /*        border-bottom: 1px solid #CACACA;*/
  /*}*/
  /*MEDIA QUERY*/
  button.nav-link.nav-linked.active {
    color: #292929;
    border-color: #ffc235;
    background: #FFFAEE !important;
  }

  button.nav-link.nav-linked:hover {
    background: #fffaee !important;
    color: #292929 !important;
    border-color: #ffc235;
  }

  button#pills-profile-tab:hover {
    background: #6b46f2;
    color: #292929 !important;
  }

  button#pills-home-tab:hover {
    background: #6b46f2;
    color: #292929 !important;
  }

  button.nav-link.nav-linked {
    color: #292929;
  }
</style>
<script>
  function buyNow(button) {
    var billingcycle = $(button).data('billingcycle') || '';
    var plangroup = $(button).data('plangroup') || '';
    var plan = $(button).data('plan') || '';
    var currency = $(button).data('currency') || '';


    var postData = {
      billingcycle: billingcycle,
      plan: plan,
      plangroup: plangroup,
      currency: currency
    };

    console.log(postData);


    $.post('process.php', postData, function(response) {

      var url = 'order.php?billingcycle=' + encodeURIComponent(billingcycle) +
        '&plangroup=' + encodeURIComponent(plangroup) +
        '&plan=' + encodeURIComponent(plan) +
        '&currency=' + encodeURIComponent(currency);

      window.location.href = url;
    });
  }
</script>
<!-- Banner section (shared hosting) -->
<section class="banner-sec">
  <div class=" container">
    <div class="row align-items-center reverse-column">
      <div class="col-md-6">
        <div class="banner-left-content margin-top dedicated-margin">
          <p class="experience">Powerful Dedicated Servers</p>
          <h1 class="Banner-Heading padding-heading robust">NVMe SSD Dedicated Server </h1>
          <p class="Banner-title p-0">Enjoy the Power of NVMe SSD Dedicated Server with full root access. Strong Infrastructure & balance between performance, power, and cost.</p>
          <div class="d-flex gap-3 lists-hosting">
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3 color-black-1"><img
                  src="assets/img/newImages/Premium-Latest-Hardware.svg" alt="tick" class="tick-square"> Full Root Admin
                Access</li>
              <li class="purple-text_dark color-black-1"><img src="assets/img/newImages/DDoS-Protection.svg" alt="tick"
                  class="tick-square">DDoS Protection</li>
            </ul>
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3 color-black-1"><img src="assets/img/newImages/1-Gbps-uplink.svg"
                  alt="tick" class="tick-square"> 1Gbps Uplink Port</li>
              <li class="purple-text_dark color-black-1"><img src="assets/img/newImages/Multiple-Server-Location.svg"
                  alt="tick" class="tick-square"> Choice Server Locations</li>
            </ul>
          </div>
        </div>
        <a href="#explore"><button class="btn-yellow btn-explore-plan">Get Started Today <i
              class="fa-solid fa-arrow-right"></i></button></a>
        <!-- <p class="Money-Back-Guarantee"><img src="assets/img/ic-shield.png" alt="shield">30-Day Money-Back Guarantee</p> -->
      </div>
      <div class="col-md-6">
        <img class="banner_img floatings" src="assets/img/dedicated-server-hero-image.png" alt="Banner"
          srcset="">
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

<!--Explore Section-->
<section class="explore-section mt-5 decdicated-plans-server" id="explore">
  <div class="container">
    <div class="text-center">
      <h2 class="server-heading shared-heading-plan">NVMe SSD Dedicated Bare Hosting Plans</h2>
      <p class="server-title">Experience top performance, dedicated resources, and full control. If you didn't find the server you need, Contact Our <a href="https://www.youstable.com/contact-us" target="_blank">Expert Support</a>.
      </p>
    </div>
    <div class="row nav nav-pills wid-more new-plan-server-design" id="pills-tab" role="tablist" style="padding: 4px;">
      <div class="col-lg-4 nav-button-plans"><button class="nav-link nav-linked  button-font-adjust active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><span class="flag-icons-country"><img src="assets/img/206606.png" alt="" /></span> India </button></div>
      <div class="col-lg-4 nav-button-plans"><button class="nav-link nav-linked button-font-adjust " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="flag-icons-country"><img src="assets/img/412828.png" alt="" /></span> USA</button></div>
      <div class="col-lg-4 nav-button-plans"><button class="nav-link nav-linked button-font-adjust " id="pills-country-tab" data-bs-toggle="pill" data-bs-target="#pills-country" type="button" role="tab" aria-controls="pills-country" aria-selected="false"><span class="flag-icons-country"><img src="assets/img/2151356.png" alt="" /></span> Netherlands</button></div>
    </div>

    <div class="tab-content pt-4" id="pills-tabContent">
      <!--India-->
      <div class="tab-pane fade show active responsive-table-set-overflow" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="bg-table-grey">
          <div class="d-flex gap-2 text-center responsive-mobile-table-sett">
            <div class="td-light-purple">Server Name</div>
            <div class="td-light-yellow">CPU</div>
            <div class="td-light-yellow purple-th-color">Memory</div>
            <div class="td-light-yellow">Storage</div>
            <div class="td-light-yellow purple-th-color">Bandwidth</div>
            <div class="td-light-yellow">Price</div>
            <div class="td-light-yellow purple-th-color">Get Started</div>
          </div>

          <div class="main-table-box">
            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E3-1230v3-3.30Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">4</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹4999/mo<p class="actual-prize m-0">₹6665/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$60.00/mo<p class="actual-prize m-0">$79.97/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"
                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E3-1230v3-3.30Ghz "
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=354"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E3-123x v5/v6-3.2Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">4</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹6999/mo<p class="actual-prize m-0">₹9332/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$84.01/mo<p class="actual-prize m-0">$111.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA"
                    data-billingcycle="monthly"
                    data-plan="E3-123x v5/v6-3.2Ghz "
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=346"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E-2136-3.30Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">6</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹7999/mo<p class="actual-prize m-0">₹10666/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$84.01/mo<p class="actual-prize m-0">$111.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E-2136-3.30Ghz "
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=355"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E-2286G - HEXA CORE-4.0Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">6</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹9999/mo<p class="actual-prize m-0">₹13332/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$120.01/mo<p class="actual-prize m-0">₹159.97/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E-2286G - HEXA CORE-4.0Ghz "
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=348"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E5-2667v4-3.2Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">8</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">960GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹11999/mo<p class="actual-prize m-0">₹15999/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$144.02/mo<p class="actual-prize m-0">$191.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E5-2667v4-3.2Ghz"
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=347"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center " style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">Ryzen 9 7700</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">8</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">960GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹13999/mo<p class="actual-prize m-0">₹17999/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$176/mo</div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="Ryzen 9 7700 "
                    data-currency="₹" type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=362"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>
          </div>
        </div>

      </div>



      <!--USA-->
      <div class="tab-pane fade responsive-table-set-overflow" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="bg-table-grey">
          <div class="d-flex gap-2 text-center responsive-mobile-table-sett">
            <div class="td-light-purple">Server Name</div>
            <div class="td-light-yellow">CPU</div>
            <div class="td-light-yellow purple-th-color">Memory</div>
            <div class="td-light-yellow">Storage</div>
            <div class="td-light-yellow purple-th-color">Bandwidth</div>
            <div class="td-light-yellow">Price</div>
            <div class="td-light-yellow purple-th-color">Get Started</div>
          </div>

          <div class="main-table-box">
            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E3-1230v3-3.30Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">4</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹4999/mo<p class="actual-prize m-0">₹6665/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$60.00/mo<p class="actual-prize m-0">$79.97/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E3-1230v3-3.30Ghz "

                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=354"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E3-123x v5/v6-3.2Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">4</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹6999/mo<p class="actual-prize m-0">₹9332/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$84.01/mo<p class="actual-prize m-0">$111.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"
                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E3-123x v5/v6-3.2Ghz "
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=346"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E-2136-3.30Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">6</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹7999/mo<p class="actual-prize m-0">₹10666/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$84.01/mo<p class="actual-prize m-0">$111.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E-2136-3.30Ghz "
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=355"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E-2286G - HEXA CORE-4.0Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">6</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">480GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹9999/mo<p class="actual-prize m-0">₹13332/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$120.01/mo<p class="actual-prize m-0">₹159.97/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E-2286G-4.00Ghz "
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=348"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">E5-2667v4-3.2Ghz</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">8</div>
              <div class="space-wid-sett">32GB DDR4</div>
              <div class="space-wid-sett">960GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹11999/mo<p class="actual-prize m-0">₹15999/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$144.02/mo<p class="actual-prize m-0">$191.98/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"
                    data-plan="E5-2667v4-3.2Ghz "
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=347"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <!-- <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
                     <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                      <p class="server-name-setup">Ryzen 9 7700</p> <p class="no-setup-fee">No Setup fee</p></div>
                     <div class="space-wid-sett">8</div>
                     <div class="space-wid-sett">32GB DDR4</div>
                     <div class="space-wid-sett">960GB SSD</div>
                     <div class="space-wid-sett">10 TB/1Gbps</div>
                     <div class="indian-host-price space-wid-sett">₹13999/mo<p class="actual-prize m-0">₹17999/Mo</p></div>
                     <div class="usa-host-price space-wid-sett">$176/mo</div>
                     <div class="indian-host-price space-wid-sett"><a
                      href="https://www.youstable.com/manage/order.php?currency=2&a=add&pid=362"
                      class="link-color-black" target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
                     <div class="usa-host-price space-wid-sett"><a
                      href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=362"
                      class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
                 </div> -->
          </div>
        </div>

      </div>
      <!--USA-->



      <!--Netherlands-->
      <div class="tab-pane fade responsive-table-set-overflow" id="pills-country" role="tabpanel" aria-labelledby="pills-country-tab">
        <div class="bg-table-grey">
          <div class="d-flex gap-2 text-center responsive-mobile-table-sett">
            <div class="td-light-purple">Server Name</div>
            <div class="td-light-yellow">CPU</div>
            <div class="td-light-yellow purple-th-color">Memory</div>
            <div class="td-light-yellow">Storage</div>
            <div class="td-light-yellow purple-th-color">Bandwidth</div>
            <div class="td-light-yellow">Price</div>
            <div class="td-light-yellow purple-th-color">Get Started</div>
          </div>

          <div class="main-table-box">
            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">Ryzen 9 3900X(12c/24t)</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">12</div>
              <div class="space-wid-sett">64 GB DDR4</div>
              <div class="space-wid-sett">960GB NVMe SSD</div>
              <div class="space-wid-sett">50 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹11886/mo<p class="actual-prize m-0">₹14271/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$149.00/mo<p class="actual-prize m-0">$179/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="Ryzen 9 3900X (12c/24t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=356"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">AMD Ryzen 9 5900X(12c/24t)</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">12</div>
              <div class="space-wid-sett">64 GB DDR4</div>
              <div class="space-wid-sett">960GB NVMe SSD</div>
              <div class="space-wid-sett">50 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹13436/mo<p class="actual-prize m-0">₹15821/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$169.00/mo<p class="actual-prize m-0">$199/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"
                    data-id="13"
                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="AMD Ryzen 9 5900X (12c/24t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=357"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">2x Intel Xeon E5- 2620 v2(12c/24t)</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">12</div>
              <div class="space-wid-sett">64 GB DDR4</div>
              <div class="space-wid-sett">960GB NVMe SSD</div>
              <div class="space-wid-sett">50 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹15582/mo<p class="actual-prize m-0">₹17967/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$196.00/mo<p class="actual-prize m-0">$410/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"
                    data-id="14"
                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="2x Intel Xeon E5-2620 v2 (12c/24t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=358"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">Intel Xeon E5-2680 v3(12c/24t) </p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">12</div>
              <div class="space-wid-sett">64 GB DDR4</div>
              <div class="space-wid-sett">960GB NVMe SSD</div>
              <div class="space-wid-sett">50 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹17013/mo<p class="actual-prize m-0">₹19398/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$214.00/mo<p class="actual-prize m-0">$244/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"
                    data-id="15"
                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="Intel Xeon E5-2680 v3 (12c/24t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=359"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">Intel Xeon E5-2683 v4(16c/32t)</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">16</div>
              <div class="space-wid-sett">64GB DDR4 ECC*</div>
              <div class="space-wid-sett">960GB SSD</div>
              <div class="space-wid-sett">10 TB/1Gbps</div>
              <div class="indian-host-price space-wid-sett">₹20114/mo<p class="actual-prize m-0">₹22499/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$253.00/mo<p class="actual-prize m-0">$283/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="Intel Xeon E5-2683 v4 (16c/32t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=360"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
            </div>

            <div class="d-flex gap-2 text-center align-items-center" style="height: 82px;border-bottom: 1px solid #e6e6e6;">
              <div class="server-name-purple" style="font-weight: 600;text-align: start;padding-left: 0px;">
                <p class="server-name-setup">AMD EPYC 7502P (32c/64t)</p>
                <p class="no-setup-fee">No Setup fee</p>
              </div>
              <div class="space-wid-sett">32</div>
              <div class="space-wid-sett">256GB DDR4 ECC*</div>
              <div class="space-wid-sett">2×1.92TB NVMe SSD</div>
              <div class="space-wid-sett">UNMETERED</div>
              <div class="indian-host-price space-wid-sett">₹29336/mo<p class="actual-prize m-0">₹31721/Mo</p>
              </div>
              <div class="usa-host-price space-wid-sett">$369.00/mo<p class="actual-prize m-0">$399/Mo</p>
              </div>
              <div class="indian-host-price space-wid-sett"><a
                  href=""
                  class="link-color-black" target="_self"><button class="buy-now-btn" onclick="buyNow(this)"

                    data-plangroup="DEDICATED-INDIA" data-billingcycle="monthly"

                    data-plan="AMD EPYC 7502P (32c/64t)"
                    data-currency="₹"
                    type="submit">Buy Now</button></a></div>
              <div class="usa-host-price space-wid-sett"><a
                  href="https://www.youstable.com/manage/order.php?currency=1&a=add&pid=361"
                  class="link-color-black " target="_self"><button class="buy-now-btn">Buy Now</button></a></div>
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
        <h2 class="ay_heading">What makes YouStable’s Dedicated Server different? </span></h2>
        <p class="server-title title_sides_width pb-3">We deliver something that is beyond your expectations, offering
          you LiteSpeed Servers, Intel/ AMD Processors and a wide range of services exclusively meant to boost your
          website performance.
        </p>
      </div>
      <div class="why-choose">
        <div class="row text-left">
          <div class="col-md-4 cols">
            <div class="feature_cols_dedicated">
              <img src="assets/img/call-center-copy-2.png" alt="ssd-storage">
              <div class="border-box">
                <h5 class="ay-heading">24/7 Support</h5>
                <p class="ay-title dedicate-content">Having no Technical knowledge about handling Servers? Our Dedicated
                  Expert Staff offers you Instant Support to configure the server per your requirements.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_dedicated">
              <img src="assets/img/CONTROL-1.png" alt="ssl-certificate">
              <div class="border-box">
                <h5 class="ay-heading">Full Root Control</h5>
                <p class="ay-title dedicate-content">YManage your Dedicated Server infrastructure from CPU to Processor,
                  through YouStable’s Client Portal & scale it as per your need without any interruptions.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_dedicated">
              <img src="assets/img/115803-1.png" alt="speed-web-server">
              <div class="border-box">
                <h5 class="ay-heading">24/7 Monitoring </h5>
                <p class="ay-title dedicate-content">Want to Check the performance of your Server? If so, then you are
                  at the right place as at YouStable, you can easily monitor your servers and make changes.</p>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>






<!--Operating-systems-->
<section class="operating-sytems">
  <div class="container">
    <div class="text-center">
      <h2 class="Banner-Heading">Multiple OS Support!</h2>
      <p class="operating-title-width"> YouStable gives you custom OS installation options and lets you choose the OS
        that you find perfect to work with!
      </p>
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

    <!-- <div class="text-center mt-5 choose-plan-now">-->
    <!--  <button class="btn-yellow   get-tarted-table get-tarted-table-one" type="submit">Choose Plan Now</button>-->
    <!--</div>-->

  </div>
</section>

<!--(Add Ons) -->
<section class="customer-review add-ons">
  <div class="container">
    <div class="available">
      <div class="row">
        <div class="col-md-3 available-cols">
          <ul class="available-points">


            <li class="indian-host-price">cPanel <span class="purple-bg">₹5200</span></li>
            <li class="usa-host-price">cPanel <span class="purple-bg">$65</span></li>
            <li class="indian-host-price">DirectAdmin <span class="purple-bg">₹400</span></li>
            <li class="usa-host-price">DirectAdmin <span class="purple-bg">$5</span></li>
            <li class="indian-host-price">Plesk <br> <span class="purple-bg">₹1200</span></li>
            <li class="usa-host-price">Plesk <br> <span class="purple-bg">$15</span></li>
          </ul>
        </div>

        <div class="col-md-3 available-cols">
          <ul class="available-points">
            <li class="indian-host-price">Softaculous <span class="purple-bg">₹200</span></li>
            <li class="usa-host-price">Softaculous <span class="purple-bg">$2.5</span></li>
            <li class="indian-host-price">Immunify 360 <span class="purple-bg">₹960</span></li>
            <li class="usa-host-price">Immunify 360 <span class="purple-bg">$12</span></li>
            <li class="indian-host-price">Litespeed 2-CPU <span class="purple-bg">₹1600</span></li>
            <li class="usa-host-price">Litespeed 2-CPU <span class="purple-bg">$20</span></li>
          </ul>
        </div>

        <div class="col-md-6 available-cols">
          <h2>Premium Add-Ons!</h2>
          <p class="server-title server-title-width my-0 enhance">Boost your server performance with these Premium
            Add-Ons. You can easily scale these Add-Ons by Connecting to our Support Team. Worried about the Uptime?
            Uptime is not affected during the scaling process.
          </p>
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
<section class="faq">
  <div class="container">
    <h2 class="text-center faq-question">FAQs</h2>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button acc-purple-bg" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            What is Dedicated Server Hosting?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Dedicated Server Hosting is a kind of Web hosting solution in which an entire
            server is allocated to a user (with Zero sharing members) with Complete server control and high
            customization options including a choice of OS/ RAM/ CPU/ Storage/ BandWidth along with Enhanced Security
            Technology like DDoS Protection and chances to Scale the web server resources as per the greater
            requirements of the websites.
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            What can you do with a Dedicated Server?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">With a Dedicated server, you can get uninterrupted website hosting service
            ensuring maximum performance, checking your server status, its Uplink and Data transfer due to its 24/7
            Monitoring feature, and unlimited Web resources for higher website needs. Dedicated servers can even host
            your multiplayer games, trading and enterprise-level websites.
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            What are the reasons for choosing a dedicated Server?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Dedicated Servers are specifically chosen by users wanting to get Complete Root
            Access allowing them to make major changes on the server, and to experience uninterrupted server performance
            for higher-traffic websites. Moreover, Users even choose Dedicated Servers as here they get an Exclusive
            chance of scaling resources as needed. </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Do I need a Dedicated Server for my website?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">If you have an Organisational-level website with a heavy influx of visitors, then,
            in that case, you’ll need Dedicated server hosting for your website where you’ll get separate web resources
            like CPU/ Storage/ Bandwidth offering Uninterrupted hosting of your website. You can even monitor the
            performance of your server resources to ensure their functionality.
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFour">
            What is the difference between a VPS and a dedicated Server? </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">In very simple words, VPS distributes server resources across multiple virtual
            servers on the same physical machine using virtualisation Technology, whereas dedicated hosting allocates
            all of the physical server's resources to only one User.
          </div>
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