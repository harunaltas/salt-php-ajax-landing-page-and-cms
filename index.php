

<script>
  const waiting = "Waiting";
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM is ready.");
  });

  window.addEventListener("load", () => {
    console.log("Page loaded.");
  });

  var pageStartedLoading = new Date().getTime();
  console.log("pageStartedLoading:", pageStartedLoading);
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="robots" content="noarchive" />
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <title>Brexit Millionaire</title>
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/sec2.css" />
    <link rel="stylesheet" href="css/answer.css" />
    <link rel="stylesheet" href="css/forbes.css" />
    <link rel="stylesheet" href="css/calculator.css?v=1.1" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
      <link
      href="css/style2.css?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
	 <script src="https://kit.fontawesome.com/c2b0b7e368.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script
 src="https://code.jquery.com/jquery-3.6.0.js"
 integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
 crossorigin="anonymous"></script>

    <style>
      @import url("ajax/libs/font-awesome/5.9.0/css/all.min.css");

      .gtd-lead-wrapper {
        display: none;
      }
      form .double-fields {
        display: flex;
      }

      form .double-fields .form-group.left {
        margin-right: 5px;
        width: 50%;
      }

      form .double-fields .form-group.right {
        margin-left: 5px;
        width: 50%;
      }

      .form-group-step-2 {
        display: none;
      }

      [type="hidden"] + .icon,
      input.invalid-field ~ .icon:after {
        display: none;
      }

      .embed-responsive {
        position: relative;
        display: block;
        height: 0;
        padding: 0;
        overflow: hidden;
        padding-bottom: 56.25%;
      }

      .embed-responsive .embed-responsive-item,
      .embed-responsive embed,
      .embed-responsive iframe,
      .embed-responsive object,
      .embed-responsive video {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
      }

      .video-date {
        z-index: 2;
        color: #fff;
        position: absolute;
        top: 20px;
        left: 30px;
        font-size: 16px;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      }

      .video-date.right {
        left: auto;
        right: 20px;
      }

      #video.is-sticky {
        position: fixed;
        top: 15px;
        left: 15px;
        max-width: 100%;
        max-height: 100%;
        width: 320px;
        height: 180px;
        z-index: 1;
      }

      .show-password,
      .hide-password {
        font-weight: 900;
        content: "\f00c";
        color: #000;
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
      }
      .show-password:hover,
      .hide-password:hover {
        cursor: pointer;
      }

      button.generate-password {
        width: 100%;
        background: #0f82f5;
        color: #fff;
        font-size: 12px;
        line-height: 1.2;
        height: 50px;
        /*border-radius: 3px;*/
      }
      button.generate-password:hover {
        opacity: 0.9;
      }

      div.hide-password {
        display: none;
      }

      /*CSS from custom-alt.css */
      .form-body,
      .form-control {
        position: relative;
      }

      .iti {
        color: #333;
        font-size: 14px;
        width: 100%;
      }

      .iti input {
        padding-left: 15px;
        max-width: 100%;
        display: block;
      }

      form .w-row {
        margin-left: -5px !important;
        margin-right: -5px !important;
      }

      form .w-row [class*="w-col-"] {
        padding-left: 5px !important;
        padding-right: 5px !important;
      }

      form .form-group {
        position: relative;
        margin-bottom: 10px;
      }

      form .form-group input {
        padding: 10px;
        margin: 0;
      }

      .button-gen-password {
        font-size: 11px;
        color: #ffffff;
        line-height: 1em;
        text-align: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        height: 55px;
        background-color: #fbaf41;
        border-radius: 6px;
        padding: 5px;
        cursor: pointer;
        -webkit-transition: opacity 0.3s ease;
        -o-transition: opacity 0.3s ease;
        transition: opacity 0.3s ease;
        border: 1px solid #9b6517;
      }

      .button-gen-password:hover {
        opacity: 0.9;
      }

      .toggle-gen-password {
        position: absolute;
        right: 15px;
        z-index: 1;
        top: 50%;
        cursor: pointer;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        color: #333;
      }
      html:lang(ar) .toggle-gen-password {
        left: 15px;
        right: auto;
      }

      .toggle-gen-password .after {
        display: none;
      }

      .toggle-gen-password.is-active .before {
        display: none;
      }

      .toggle-gen-password.is-active .after {
        display: block;
      }

      /*.gtd-common-form input,*/
      /*.gtd-optins-form input,*/
      /*.gtd-leads-form input,*/
      input {
        position: relative;
        border: 1px solid #ced4da;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
      }

      /*.gtd-common-form input:not(:placeholder-shown),*/
      /*.gtd-optins-form input:not(:placeholder-shown),*/
      /*.gtd-leads-form input:not(:placeholder-shown),*/
      input:not(:placeholder-shown) {
        border-color: rgba(206, 212, 218, 0.5);
      }

      /*.gtd-common-form input:valid:not(:placeholder-shown),*/
      /*.gtd-optins-form input:valid:not(:placeholder-shown),*/
      /*.gtd-leads-form input:valid:not(:placeholder-shown),*/
      input:valid:not(:placeholder-shown) {
        padding-right: 34px;
        border-color: #249e2c;
      }

      /*.gtd-common-form input:invalid:not(:placeholder-shown),*/
      /*.gtd-optins-form input:invalid:not(:placeholder-shown),*/
      /*.gtd-leads-form input:invalid:not(:placeholder-shown),*/
      input:invalid:not(:placeholder-shown),
      input.invalid-field {
        border-color: #eb172b !important;
      }

      /*.gtd-common-form input:valid:not(:placeholder-shown)~.icon:after,*/
      /*.gtd-optins-form input:valid:not(:placeholder-shown)~.icon:after,*/
      /*.gtd-leads-form input:valid:not(:placeholder-shown)~.icon:after,*/
      input:valid:not(:placeholder-shown) ~ .icon:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f00c";
        color: #249e2c;
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
      }

      html:lang(ar)
        .gtd-common-form
        input:valid:not(:placeholder-shown)
        ~ .icon:after,
      html:lang(ar)
        .gtd-optins-form
        input:valid:not(:placeholder-shown)
        ~ .icon:after,
      html:lang(ar)
        .gtd-leads-form
        input:valid:not(:placeholder-shown)
        ~ .icon:after {
        left: 15px;
        right: auto;
        /* style rules here */
      }

      .gtd-common-form
        input:valid:not(:placeholder-shown)
        ~ .iti__selected-flag,
      .gtd-optins-form
        input:valid:not(:placeholder-shown)
        ~ .iti__selected-flag,
      .gtd-leads-form
        input:valid:not(:placeholder-shown)
        ~ .iti__selected-flag {
        font-size: 20px;
      }

      input.phone {
        background-image: none !important;
        padding-left: 99px !important;
      }

      .form-body {
        margin-top: auto;
      }

      .iti__country-list {
        color: #000;
      }
      .secondary-email,
      .secondary_email,
      .terms_input {
        display: none !important;
      }

      .w-form-fail {
        display: none;
        text-align: center;
        margin-top: 10px;
        padding: 10px;
        background-color: #ffdede;
        color: #000;
      }

      /*For mobile*/
      @media (max-width: 479px) {
        form .double-fields {
          display: block;
        }
        form .double-fields .form-group.left {
          margin-right: 0;
          width: 100%;
        }

        form .double-fields .form-group.right {
          margin-left: 0;
          width: 100%;
        }
      }
      .gtd-lead-wrapper {
        position: fixed;
        display: none;
        justify-content: center;
        align-items: center;
        left: 0;
        top: 0;
        height: 100%;
        overflow: unset;
        width: 100%;
        color: #333;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000001;
        font-size: 14px;
      }

      .gtd-brand-logo-img span,
      .gtd-brand-logo-text span,
      .select2-results {
        display: block;
      }

      .gtd-lead-wrapper .gtd-inner {
        overflow: auto;
        background-color: #f1f1f1;
        margin: 0;
        height: 100%;
        max-width: 800px;
        padding: 20px;
        border: 3px solid #18a7f8;
      }

      .gtd-lead-wrapper .gtd-title {
        text-align: center;
        color: #333;
        font-weight: 600;
        font-size: 24px;
        line-height: 38px;
        margin-bottom: 15px;
      }

      .gtd-lead-wrapper .gtd-subtitle {
        text-align: center;
      }

      .gtd-lead-wrapper .gtd-content {
        margin-top: 50px;
      }

      .gtd-lead-wrapper .gtd-content > .gtd-broker,
      .gtd-lead-wrapper .gtd-redirect a {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-align: center;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature,
      .gtd-lead-wrapper .gtd-content > .gtd-broker {
        margin-bottom: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature {
        text-align: left !important;
        margin-bottom: 20px;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature .gtd-icon {
        margin-right: 15px;
        width: 70px;
        -webkit-box-flex: 0;
        -webkit-flex: none;
        -moz-box-flex: 0;
        -ms-flex: none;
        flex: none;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature .gtd-icon img {
        max-width: 100%;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature h2 {
        font-size: 20px;
        line-height: 20px;
        margin-bottom: 10px;
        margin-top: 0;
        padding-bottom: 0;
        text-align: left !important;
      }

      .gtd-lead-wrapper .gtd-content .gtd-features .gtd-feature p {
        text-align: left !important;
      }

      .gtd-lead-wrapper .gtd-redirect {
        text-align: center;
        margin-top: 30px;
      }

      .gtd-lead-wrapper .gtd-redirect a {
        bottom: 0;
        position: relative;
        text-transform: uppercase;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -moz-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        text-decoration: none;
        color: #fff;
        padding: 15px 40px;
        font-size: 20px;
        font-weight: 600;
        background-color: #18a7f8;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        text-shadow: 0 -1px -1px #0795e5;
        -moz-box-shadow: 0 4px 0 #0795e5, 0 5px 5px 1px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 4px 0 #0795e5, 0 5px 5px 1px rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 0 #0795e5, 0 5px 5px 1px rgba(0, 0, 0, 0.4);
        -moz-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        -webkit-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
      }

      .gtd-lead-wrapper .gtd-redirect a:hover {
        opacity: 0.8;
      }

      .gtd-lead-wrapper .gtd-redirect a:active {
        bottom: -4px;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
      }

      @media (min-width: 800px) {
        .gtd-lead-wrapper .gtd-inner {
          max-height: calc(100vh - 10px);
          height: auto;
        }

        .gtd-lead-wrapper .gtd-content {
          max-width: 500px;
          margin: 0 auto;
        }

        .gtd-lead-wrapper .gtd-content > .gtd-broker {
          margin: 25px 0;
        }

        .gtd-lead-wrapper .gtd-redirect a {
          font-size: 30px;
          line-height: 30px;
        }

        .gtd-lead-wrapper .gtd-title {
          font-size: 38px;
        }
      }

      .gtd-brand-logo {
        min-width: 150px;
        max-width: 250px;
        display: inline;
      }

      .gtd-brand-logo-img .slogan {
        margin-bottom: 10px;
      }

      .gtd-brand-logo-img .slogan,
      .gtd-brand-logo-text .slogan {
        font-weight: 400;
        font-size: 16px;
      }

      .gtd-brand-logo-img .text,
      .gtd-brand-logo-text .text {
        font-weight: 700;
        font-size: 50px;
        color: #18a7f8;
        line-height: 1;
      }
      textarea {
        border-radius: 20px;
        font-size: 20px;
        height: 100px;
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
      }
      .gtd-brand-logo-img .register,
      .gtd-brand-logo-text .register {
        font-size: 12px;
        font-style: italic;
        margin-top: 10px;
      }

    </style>
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <script src="js/jquery.min.js"></script>
    <!-- Start of OneSignal script -->
    <script src="sdks/OneSignalSDK.js" async=""></script>
    <script>
      window.OneSignal = window.OneSignal || [];
      OneSignal.push(function () {
        OneSignal.init({
          appId: "66c9caef-87c3-4867-8abb-280549c3574a",
        });
      });
    </script>
    <!-- End of OneSignal script -->
    <script src="ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
    <script>
      const sdk = "sdklplead.com";

      const navigationArray = window.performance.getEntriesByType("navigation");
      let reloaded;

      if (navigationArray.length > 0) {
        reloaded =
          window.performance.getEntriesByType("navigation")[0].type ===
          "reload";
      } else {
        reloaded = window.performance.navigation.type === 1;
      }
    </script>

  </head>
  <body>
    <header>
      <div class="bar">
        <div class="container container-big">
          <div class="">
            <div class="">
              <img
                onclick="scrollTopForm();"
                class="mobile-logo float-left"
                src="images/bm-icon.png"
                alt="icon"
              />
              <img
                onclick="scrollTopForm();"
                class="desktop-logo float-left"
                src="images/top-logo.png"
                alt="logo"
              />
              <p class="d-none d-xl-inline mt-3 float-left">
                This <strong>FREE </strong>Platform only pulls in guaranteed
                profits!
              </p>
            </div>
            <div class="">
              <a class="spots" href="#sc_tg">
                <span id="cdown" class="number d-inline float-left">45</span>
                <p class="d-inline">spots remaining</p>
                <img
                  class="d-inline handshake float-right"
                  src="images/handshake.png"
                  alt="spots"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="section-1">
      <div class="container">
        <h1>
          Earn Up To £2,200 A Day With Britains<br>
          Most Exclusive Trading Platform
        </h1>
        <img class="ribbon" src="images/ribbon-top.png" alt="ribbon">
        <div class="row" id="topform">
          <div class="col-lg-8" >
            <div class="video embed-responsive" >
              <div class="video-date right d-none d-sm-block"></div>
			 
<video id="video" controls autoplay muted fullscreen>
    <source src="video/720hd.mp4" type="video/mp4">
</video>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-wrapper" id="sc_tg">
             
              <h4>Just Enter Your <b>Full Name </b>And <b>Email </b>to Start</h4>
              <div class="form-block">
                <form method="post" action="">
      
    <div class="secondary_email">
      <input type="email" class="secondary-email secondary_email" name="secondary_email">
    </div>
  
                  <div class="div-block">
                    <div class="double-fields-step-2-only">
                      <div class="form-group">
                        <input type="text" class="form-control input-style input" autofocus="" maxlength="256" id="fullnamee" name="full-name" pattern="[a-zA-Z\s]+" placeholder="Full Name" aria-label="Full Name" required="required">
                        <div class="icon"></div>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <input type="email" class="form-control input-style" maxlength="256" id="emaill" name="email" pattern="[A-Za-z0-9._%+-]{1,}@[a-zA-Z0-9._%+-]{1,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z0-9._%+-]{2,}[.]{1}[a-zA-Z]{2,})" placeholder="Your email address" aria-label="Your email address" required="required">
                      <div class="icon"></div>
                    </div>
                    <div class="form-group">
                      <input id="phone" type="tel"  onblur="checkLength(this)" name="phone" pattern="\d*" min="2" max="5" class="form-control input-style phonebutton phoneinpt" style="width:100%; border:1px solid #ddd;"/>
                       <div class="icon"></div>
                            </div>
							<div class="form-group" style="font-size:14px; color:red; margin-left:30px;">
							<div class="info" id="inf"></div>
							</div>

		    <div class="form-group check">
             <input type="checkbox" checked value="1" id="checkk" name="check"><label for="checkk">I certify that i am 18 years old and that i agree to the Terms of Service and privacy policy.</label></input>
           </div>
                    <div class="double-fields-step-2-only password-double-fields">
                      <div class="form-group left form-group-step-2">
                        <input type="hidden" class="form-control input-style" maxlength="256" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,10}$" placeholder="Create a password" aria-label="Create a password" required="required">
                        <div class="show-password fa fa-eye"></div>
                        <div class="hide-password fa fa-eye-slash"></div>
                      </div>

                    </div>

  
                    <input type="hidden" maxlength="256" name="country" aria-label="Country Code" required="required">
                    <button type="submit" class="btn btn-register" id="phonebtn">Register</button>
                    <div class="alert-info"></div>
                  
  
                  </div>
                </form>
                <div class="w-form-fail">
                  <div class="w-form-fail-message"></div>
                </div>
              </div>
              <div class="disclaimer">
                <p class="d-inline">A free &<b>trusted</b> trading platform to beat the economic downturn -</p>
                <p class="red d-inline">limited offer!</p>
              </div>
              <img class="d-block mx-auto" src="images/money-growth.png" alt="money">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="trusted">
              <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-1-copy.png" alt="trusted">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-2-copy.png" alt="trusted">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-3-copy.png" alt="trusted">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-4-copy.png" alt="trusted">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-5-copy.png" alt="trusted">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                  <img class="img-fluid mb-2" src="images/ic-trust-6-copy.png" alt="trusted">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="skillboard-wrapper">
    <div class="skillboard">
      <div class="skill-text">
        <h2>Built For Profit, Built To Succeed</h2>
      </div>
      <div class="skills">
        <div class="skill">
          <div class="skill-img">
            <img src="images/crc-1.png" alt="">
            <div class="skill-wrapper">
              <div class="skill-p">
               <p>Risk Free</p>
               <span>Daily earnings</span>
              </div>
              <div class="skill-img-2">
               <img src="images/risc-free-icon.png" alt="">
              </div>
             </div>
          </div>

        </div>
        <div class="skill">
          <div class="skill-img">
            <img src="images/crc-2.png" alt="">
            <div class="skill-wrapper">
              <div class="skill-p">
               <p>97%</p>
               <span>Accuracy</span>
              </div>
              <div class="skill-img-2">
               <img src="images/secure-icon.png" alt="">
              </div>
             </div>
          </div>

        </div>
        <div class="skill">
          <div class="skill-img">
            <img src="images/crc-3.png" alt="">
            <div class="skill-wrapper">
              <div class="skill-p">
               <p>Trusted</p>
               <span>Proven By Members</span>
              </div>
              <div class="skill-img-2">
               <img src="images/handshake-icon.png" alt="">
              </div>
             </div>
          </div>

        </div>
        <div class="skill">
          <div class="skill-img">
            <img src="images/crc-4.png" alt="">
            <div class="skill-wrapper">
              <div class="skill-p">
               <p>Easy Use</p>
               <span>24 Hour Support</span>
              </div>
              <div class="skill-img-2">
               <img src="images/cog-icon.png" alt="">
              </div>
             </div>
          </div>

        </div>
      </div>
      <div class="skill-text">
        <h3>
        We make 1 penny for every pound you earn so we can offer this platform free for life! Our win-win co-investment strategy ensures 
        this exclusive network will thrive for years to come!
      </h3>
      </div>

    </div>
  </div>
  <div class="section-3">
    <div class="container"></div>
    <a href="#sc_tg">
      <button class="btn-big d-block mx-auto">Gain Free Access Now</button>
    </a>
  </div>
  <div class="section-4">
    <div class="container">
      <h2>Britain is Back</h2>
      <p class="subtitle">Britons are moving the economy forward & earning vast sums at the same time.</p>
      <div class="map-wrapper">
        <div class="map" id="underlay">
          <div class="markers">
            <div id="marker1" class="marker" style="left: 33%;top: 48%;"></div>
            <div id="marker3" class="marker" style="left: 52%;top: 38%;"></div>
            <div id="marker4" class="marker" style="left: 48%;top: 26%;"></div>
            <div id="marker5" class="marker" style="left: 42%;top: 54%;"></div>
            <div id="marker6" class="marker" style="left: 57%;top: 39%;"></div>
            <div id="marker7" class="marker" style="left: 52%;top: 66%;"></div>
            <div id="marker8" class="marker" style="left: 47%;top: 16%;"></div>
            <div id="marker9" class="marker" style="left: 35%;top: 65%;"></div>
            <div id="marker10" class="marker" style="left: 57%;top: 72%;"></div>
            <div id="marker11" class="marker" style="left: 56%;top: 57%;"></div>
            <div id="marker12" class="marker" style="left: 52%;top: 18%;"></div>
            <div id="marker13" class="marker" style="left: 61%;top: 61%;"></div>
            <div id="marker14" class="marker" style="left: 61%;top: 61%;"></div>
            <div id="marker15" class="marker" style="left: 51%;top:32%;"></div>
            <div id="marker16" class="marker" style="left: 54%;top:22%;"></div>
            <div id="marker17" class="marker" style="left: 39%;top:50%;"></div>
            <div id="marker18" class="marker" style="left: 55%;top:42%;"></div>
            <div id="marker19" class="marker" style="left: 49%;top:38%;"></div>
            <div id="marker20" class="marker" style="left: 45%;top:32%;"></div>
            <div id="marker21" class="marker" style="left: 55%;top:22%;"></div>
            <div id="marker22" class="marker" style="left: 41%;top:20%;"></div>
            <div id="marker23" class="marker" style="left: 41%;top:50%;"></div>
            <div id="marker24" class="marker" style="left: 57%;top:80%;"></div>
            <div id="marker25" class="marker" style="left: 45%;top:40%;"></div>
            <div id="marker26" class="marker" style="left: 55%;top:33%;"></div>
            <div id="marker27" class="marker" style="left: 45%;top:23%;"></div>
            <div id="marker28" class="marker" style="left: 49%;top:29%;"></div>
            <div id="marker29" class="marker" style="left: 48%;top:27%;"></div>
            <div id="marker31" class="marker" style="left: 43%;top:25%;"></div>
            <div id="marker32" class="marker" style="left: 35%;top:71%;"></div>
            <div id="marker33" class="marker" style="left: 56%;top:56%;"></div>
            <div id="marker34" class="marker" style="left: 39%;top:63%;"></div>
            <div id="marker35" class="marker" style="left: 64%;top:61%;"></div>
            <div id="marker36" class="marker" style="left: 63%;top:60%;"></div>
            <div id="marker37" class="marker" style="left: 22%;top:65%;"></div>
            <div id="marker38" class="marker" style="left: 36%;top:75%;"></div>
          </div>
          <img class="imgfluid mapdekstop mx-auto" src="images/map.png" alt="map">
          <img class="imgfluid mapmobile mx-auto w-100" src="images/map-mobi.png" alt="map">
          <p class="nearnings">Nationwide Earnings In The UK Now</p>
        </div>

        <div class="earnings">
          <div class="row">
            <div class="col-5 col-sm-4 my-auto">
              <div class="time-wrapper">
                <span id="ukdate" class="date d-none d-sm-inline">24 Mon</span>
                <span id="uktime" class="date time">11:42:15</span>
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="total-wrapper">
                <p class="d-none d-sm-inline">Daily Total Combined Earnings</p>
                <p class="d-block d-sm-none">Daily Total Earnings</p>
                <span class="big-ammount">£<span id="total-earnings"></span></span>
              </div>
            </div>
          </div>
        </div>

        <div class="live-updates">
          <div class="d-block mx-auto text-center">
            <p class="fs16 d-inline-block">Live Updates</p>
          </div>
          <div class="users-wrapper">
            <div class="users-content">
                            <div class="user blue-bg">
                <img class="d-inline float-left" src="users/71.jpg" alt="user">
                <div class="d-inline float-left ml-2 white-color">
                  <span>High Earner</span>
                  <p>Britney F.</p>
                </div>
                <div class="d-inline float-right">
                  <i class="fa fa-angle-up green-color" aria-hidden="true"></i>
                  <span class="ammount"> £1382.08</span>
                </div>
              </div>

                                              <div class="user">
                  <img class="d-inline float-left" src="users/20.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Timmothy P.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £968.28</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/14.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Eddie L.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £498.23</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/68.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Allie C.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £787.3</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/46.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Lloyd R.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £466.19</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/8.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Abbie P.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £548.13</span>
                  </div>
                </div>
              
                            <div class="user blue-bg">
                <img class="d-inline float-left" src="users/47.jpg" alt="user">
                <div class="d-inline float-left ml-2 white-color">
                  <span>High Earner</span>
                  <p>Mario W.</p>
                </div>
                <div class="d-inline float-right">
                  <i class="fa fa-angle-up green-color" aria-hidden="true"></i>
                  <span class="ammount"> £532.57</span>
                </div>
              </div>

                                              <div class="user">
                  <img class="d-inline float-left" src="users/98.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Bruce B.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £687.94</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/3.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Vanessa D.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £840.24</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/91.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Heidi B.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £557.49</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/77.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Catherine M.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £489.56</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/78.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Morris H.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £750.4</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/27.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Nick R.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £732.54</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/11.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Ed B.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £446.63</span>
                  </div>
                </div>
              
                            <div class="user blue-bg">
                <img class="d-inline float-left" src="users/51.jpg" alt="user">
                <div class="d-inline float-left ml-2 white-color">
                  <span>High Earner</span>
                  <p>Thomas R.</p>
                </div>
                <div class="d-inline float-right">
                  <i class="fa fa-angle-up green-color" aria-hidden="true"></i>
                  <span class="ammount"> £1126.01</span>
                </div>
              </div>

                                              <div class="user">
                  <img class="d-inline float-left" src="users/59.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Phoebe M.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £635.24</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/40.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Sharon O.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £879.55</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/72.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Mathew T.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £347.69</span>
                  </div>
                </div>
              
                            <div class="user blue-bg">
                <img class="d-inline float-left" src="users/4.jpg" alt="user">
                <div class="d-inline float-left ml-2 white-color">
                  <span>High Earner</span>
                  <p>Callum A.</p>
                </div>
                <div class="d-inline float-right">
                  <i class="fa fa-angle-up green-color" aria-hidden="true"></i>
                  <span class="ammount"> £1295.46</span>
                </div>
              </div>

                                              <div class="user">
                  <img class="d-inline float-left" src="users/22.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Ross K.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £650.33</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/71.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Britney F.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £565.22</span>
                  </div>
                </div>
                                              <div class="user">
                  <img class="d-inline float-left" src="users/20.jpg" alt="user">
                  <div class="d-inline float-left ml-2">
                    <span>Avg</span>
                    <p>Timmothy P.</p>
                  </div>
                  <div class="d-inline float-right">
                    <i class="fa fa-angle-up blue-color" aria-hidden="true"></i>
                    <span class="ammount"> £383.99</span>
                  </div>
                </div>
                </div>
          </div>
        </div>
      </div>
      <a href="#sc_tg">
        <button class="btn-green d-block mx-auto">START EARNING NOW</button></a>
    </div>
  </div>
  <div class="section-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Big Banks Are Profiting From Brexit. Now You Can Too!</h2>
          <p class="subtitle">Signup now and start earning with the same strategy, systems and technology that Britain's Banking Sector Uses to Earn Millions!</p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-1@2x.png" alt="trusted">
              </a>
            </div>
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-4@2x.png" alt="trusted">
              </a>
            </div>
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-2@2x.png" alt="trusted">
              </a>
            </div>
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-5@2x.png" alt="trusted">
              </a>
            </div>
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-3@2x.png" alt="trusted">
              </a>
            </div>
            <div class="col-6 col-md-6">
              <a href="#sc_tg">
                <img class="img-fluid logobigger" src="images/bank-6@2x.png" alt="trusted">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-6" id="middleform">
    <div class="container">
      <h2>Our Members Talk!</h2>
      <p class="subtitle">Complete Beginners Are Earning Big Bucks And Now With Our Help, You Can Too.</p>
      <div class="members-wrapper">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="rectangle">
              <div class="user-testimonial">
                <div class="testimonial mem1">
                  <div class="testimonial-text">
                    <div class="mb-3">
                        <p class="d-inline font-weight-bold">Lee E.</p>
                      <p class="d-inline">- Glasgow</p>
                    </div>

                    <p class="font-italic">“I worked in the Hospitality sector for 4 years until Corona hit!!! - I’ve been out of work now 7 months but thankfully a friend told me about Brexit Millionaire and I am earning more now than I could imagine. THANK YOU!”</p>
                  </div>
                </div>
              </div>
              <div class="profit">
                <p class="d-inline testifix"><span class="today"></span></p>
                <p class="d-inline"> £40,234.88</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="rectangle">
              <div class="user-testimonial">
                <div class="testimonial mem3">
                  <div class="testimonial-text active">
                    <div class="mb-3">
                                            <p class="d-inline font-weight-bold">Clarke A.</p>
                      <p class="d-inline">- London</p>
                    </div>

                    <p class="font-italic">“I received my notice two weeks ago. With no alternatives I thought my life would be over. Now I'm making about £13,261.42 every week! And for the first time in 2 months I'm not in the dark thanks to Brexit Millioanire!”</p>
                  </div>
                </div>
              </div>
              <div class="profit">
                <p class="d-inline testifix"><span class="today"></span></p>
                <p class="d-inline"> £26,605.38</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="rectangle">
              <div class="user-testimonial">
                <div class="testimonial mem2">
                  <div class="testimonial-text">
                    <div class="mb-3">
                                            <p class="d-inline font-weight-bold">Romero L.</p>
                      <p class="d-inline">- Manchester</p>
                    </div>

                    <p class="font-italic">“I am in my third year of Med school and my part time job was axed, so i started using Brexit Millionaire to earn extra cash. Now i dont have to worry about my Uni Fees”</p>
                  </div>
                </div>
              </div>
              <div class="profit">
                <p class="d-inline testifix"><span class="today"></span></p>
                <p class="d-inline"> £63,626.98</p>
              </div>
            </div>
          </div>
          <div class="d-xs-none col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="rectangle">
              <div class="user-testimonial">
                <div class="testimonial mem4">
                  <div class="testimonial-text">
                    <div class="mb-3">
                                            <p class="d-inline font-weight-bold">Powell A.</p>
                      <p class="d-inline">- Liverpool</p>
                    </div>

                    <p class="font-italic">“My god I did not know where to turn to when my business was falling apart. I started looking online for help when I spotted Brexit Millioanire. I had nothing to lose, but now I have so much more time and wealth”</p>
                  </div>
                </div>
              </div>
              <div class="profit">
                <p class="d-inline testifix"><span class="today"></span></p>
                <p class="d-inline"> £52,172.58</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="white-wrapper">
        <div class="row">
          <div class="col-md-3 my-auto">
            <div class="form-group">
              <p class="red-text">Get Access To Start Earning</p>
            </div>
          </div>
          <div class="col-md-9">
            <div class=" form-block">
              <form action="index.php" method="get" class="d-flex flex-column inlineform">
                  <!--  Form -->
  <input type="hidden" name="ip_form_ho" value="">
  <input type="hidden" name="time" value="1624821031">
  <input type="hidden" name="time__key" value="899fbea5fc572131999ee0790b04dd2d">
  <input type="hidden" name="url__key" value="e02d2f940217562c2d2dee83725239471786d300">
  <input type="hidden" name="t" value="">
  <input type="hidden" name="platform_flag" value="">
  <input type="hidden" name="platform_key" value="">

  <div class="secondary_email">
    <input type="email" class="secondary-email secondary_email" name="secondary_email">
  </div>

                <div class="row">
                  <div class="col-md-4 my-auto">
                  </div>
                  <div class="col-md">
                    <div class="form-group">
					 <a href="#sc_tg">
                      <button class="btn btn-green w-100">
                        Register
                      </button></a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="forbes">
    <div class="forbes-photo">
      <img src="images/forbes@2x.png" alt="">
    </div>
    <div class="forbes-text">
     <h3>“Forex Trading Apps Are Reshaping The Fintech Space In 2021”</h3> 
    </div>
  </div>
  <div class="section-8">
    <div class="container">
      <div class="row">
        <div class="col-md-7 my-auto">
          <h2 class="text-left">Brexit Millionaire</h2>
          <p class="subtitle text-left mt-2 mb-4">A Platform For Profit.</p>
          <div class="row">
            <div class="col-md-6">
              <img class="img-fluid my-3" src="images/secure-mrk.png" alt="">
              <p>Great for beginners and pro’s, hands free, fully automated and secure platform only trading when it’s sure of a profit.</p>
            </div>
            <div class="col-md-6">
              <img class="img-fluid my-3" src="images/cog-mrk.png" alt="">
              <p>Our trading software uses the latest in digital technology, placed in secure servers and encrypted for complete peace of mind.</p>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <img class="img-fluid devices" src="images/devices-3.png" alt="devices">
        </div>
      </div>
    </div>
  </div>


  <div class="section-9">
    <div class="container">
      <div class="white-wrapper">
        <div class="row">
          <div class="col-md-3 my-auto">
            <div class="form-group">
              <p class="red-text">Free Access For GB Only</p>
            </div>
          </div>
          <div class="col-md-9 form-block">
            <form action="index.php" method="get" class="d-flex flex-column inlineform">
                <!--  Form -->
  <input type="hidden" name="ip_form_ho" value="">
  <input type="hidden" name="time" value="1624821031">
  <input type="hidden" name="time__key" value="899fbea5fc572131999ee0790b04dd2d">
  <input type="hidden" name="url__key" value="e02d2f940217562c2d2dee83725239471786d300">
  <input type="hidden" name="t" value="">
  <input type="hidden" name="platform_flag" value="">
  <input type="hidden" name="platform_key" value="">

  <div class="secondary_email">
    <input type="email" class="secondary-email secondary_email" name="secondary_email">
  </div>

              <div class="row">
                <div class="col-md-4 my-auto">
                  <div class="double-fields-step-2-only">

                  </div>
                </div>
                <input type="hidden" maxlength="256" name="country" aria-label="Country Code" required="">
                <div class="col-md">
                  <div class="form-group">
					<a href="#sc_tg">
                      <button class="btn btn-register w-100">
                        Register
                      </button></a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="answer-container">
    <div class="answer-title">
      <h2>You Ask - We Answer!
      </h2>
      <p>This Is A Summary Of The Most Frequent Questions Asked.</p>
    </div>
    <div class="answers">
        <div class="answerh">

            <h3>What kind of a result can I expect ?</h3>
            <p>
              Brexit Millionaire members typically profit a minimum of £710 daily and more, depending on the initial investment.
            </p>
        </div>
        <div class="answerh">
          <h3>How much does the software cost?</h3>
          <p>
            Nothing. Brexit Millionaire members get a copy of our proprietary software free of charge. To become a member, simply fill out the form on this page.
          </p>
      </div>
      <div class="answerh">
        <h3>How many hours per day do I need to work?</h3>
        <p>
          Our members spend on average 20 minutes per day, this is because the software handles the trading so the amount of time required is minimal.
        </p>
    </div>
    <div class="answerh">
      <h3>Is this like MLM or Crypto Investing?</h3>
      <p>
       This is not like MLM, Crypto Trading or anything else out there. Our software profits with a 97% accuracy based on proven strategies used by big banks.
      </p>
  </div>
  <div class="answerh">
    <h3>What is the maximum amount I can make?</h3>
    <p>
     With Brexit Millionaire your profits are unlimited. Some members earned their first million within 61 days.
    </p>
</div>
<div class="answerh">
  <h3>Are there any fees?</h3>
  <p>
   There are no hidden fees, no broker fees or commissions. All of your money is yours 100%, free to withdraw at any moment with no delay.
  </p>
</div>
    </div>
  </div>
  <div class="section-11">
    <div class="container">
      <!-- <object class="img-fluid d-block mx-auto" data="https://brexitmillionaire.co.uk/images/top-logo.svg" type="image/svg+xml"></object> -->
      <img class="img-fluid d-block mx-auto" href="images/top-logo.svg">
      <p class="subtitle mt-3 mb-5" style="font-weight:bold;">Take Advantage Of This Premium Platform For Free. Dont Get Left In The Covid Cold.</p>

      <div class="white-wrapper">
        <div class="row">
          <div class="col-md-3 my-auto">
            <div class="form-group">
              <p class="red-text">Limited Spots Left</p>
            </div>
          </div>
          <div class="col-md-9 form-block">
            <form action="index.php" method="get" class="d-flex flex-column inlineform">
                <!--  Form -->
  <input type="hidden" name="ip_form_ho" value="">
  <input type="hidden" name="time" value="1624821031">
  <input type="hidden" name="time__key" value="899fbea5fc572131999ee0790b04dd2d">
  <input type="hidden" name="url__key" value="e02d2f940217562c2d2dee83725239471786d300">
  <input type="hidden" name="t" value="">
  <input type="hidden" name="platform_flag" value="">
  <input type="hidden" name="platform_key" value="">

  <div class="secondary_email">
    <input type="email" class="secondary-email secondary_email" name="secondary_email">
  </div>

              <div class="row">
                <div class="col-md-4 my-auto">
                </div> 
               <div class="col-md">
                  <div class="form-group">
					<a href="#sc_tg">
                      <button class="btn btn-register w-100">
                        Register
                      </button></a>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="w-form-fail">
                    <div class="w-form-fail-message"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <img class="img-fluid d-block mx-auto mt-3" src="images/ribbon-b-2.png" alt="ribbon">
    </div>
  </div>
  <footer>
    <div class="container">
      <p class="disclaimer">Important Note: Trading in FX and CFDs involves a high risk of loss due to the leveraged nature of the trading which might lead to the total loss of your capital and which might not be appropriate for all types of investors. Please read our full risk warning and the relevant broker you will be registered with to ensure that you understand the risks involved prior to proceeding, taking into consideration your relevant experience. Seek independent advice if necessary. The information contained in this website and disclosure documents is of a general nature only, and does not take into account your personal circumstances, financial situation or needs. You should consider the brokerage Client Agreement carefully, and seek independent advice before deciding whether trading in such products is suitable for you.</p>
      <p class="copyrights mt-3">© <span class="copyright-year"></span> All Rights Reserved - Brexit Millionaire</p>
    </div>
  </footer>
  <button class="btn_calculator btn_blue btn_profit-calc">
    <span class="payout-box">
      <span class="payout-box__title desktop-only extend"><strong>Calculate Your Future Profit</strong></span>
      <span class="payout-box__icon"><img src="images/payout-icon2.svg" alt=""></span>
    </span>
  </button>
  <div class="modal_profit-calc modal">
    <div class="profit-calc modal-box">
      <h1 class="profit-calc__title">Potential Profits Calculator</h1>
      <p class="profit-calc__txt">Use our calculator to see your future earnings from Brexit Millionaire.</p>
      <div class="calc-box">
        <div class="calc-payout">
          <span class="logo-circle"></span>
          <div class="payout-box">
            <div class="payout-box__title">Potential payout
            </div>
            <a href="#sc_tg">
              <div class="payout-box__icon close-position-to-form"><img src="images/payout-icon2.svg" alt=""></div>
            </a>
          </div>
          <div class="payout-box__amount">£3,365</div>
          <a href="#sc_tg">
            <div class="btn_calculator btn_green close-position-to-form">Send Message Now</div>
          </a>
        </div>

        <div class="calc-range">
          <!-- Deposit -->
          <div class="calc-range__deposit">
            <div class="flexr-btw">
              <form onsubmit="inputDeposit();return false">
                <label for="currency" class="calc-range__title">Deposit
                </label>
                <span class="calc-range-input">
                  <span class="currency">£</span>
                  <input id="currency" name="currency" type="number" value="250" min="250" max="5000" class="calc-range-input__deposit">
                </span>
              </form>
            </div>
            <div class="height-helper">
              <input onchange="sliderDeposit(this)" type="range" min="250" max="5000" value="250" step="50" class="custom-range-slider calc-range__deposit__slider">
              <span class="current-value-box" style="display: block;"><span class="current-value-box__num" style="transform: translateX(-50%); left: 9%;">£450</span></span>
              <span class="slider-values slider-min">£250</span>
              <span class="slider-values slider-max">£5000</span>
            </div>
          </div>
          <!-- Time of usage -->
          <div class="calc-range__time">
            <div class="flexr-btw">
              <form onsubmit="inputDays();return false">
                <label for="time-unit-days" class="calc-range__title">Time of usage
                </label>
                <span class="calc-range-input">
                  <input id="time-unit-days" name="time-unit-days" type="number" value="30" min="1" max="180" class="calc-range-input__time">
                  <span class="time-unit">days
                  </span>
                </span>
              </form>
            </div>
            <div class="height-helper">
              <input onchange="sliderDays(this)" type="range" min="1" max="180" value="90" step="1" class="custom-range-slider calc-range__time__slider">
              <span class="current-value-box" style="display: block;"><span class="current-value-box__num" style="transform: translateX(-50%); left: 50%;">30 days</span></span>
              <span class="slider-values slider-min">1 days</span>
              <span class="slider-values slider-max">180 days</span>
            </div>
          </div>
        </div>
      </div>
      <span role="button" type="button" class="close-modal_profit-calc">×</span>
    </div>
  </div>

  <div id="popup">
    <div class="wrapper d-block">
      <span role="button" type="button" class="close-modal_exit" onclick="closePopup();">×</span>
      <img class=" img-fluid d-block mx-auto" src="images/crc-8.png" alt="stop">
      <p>If You Leave Now You Will Lose Your Place In The Queue Which Is Being Held During The Time You Are Viewing This Page!</p>
      <a href="#sc_tg">
        <button class="btn-blue" onclick="closePopup();">I Want To Claim My Spot</button>
      </a>
    </div>

  </div>
  <script>
	function getIp(callback) {
 fetch('https://ipinfo.io/json?token=ee9dceccd60e6f', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
	
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
	initialCountry: "auto",
	geoIpLookup: getIp,
	separateDialCode: true,
      utilsScript:
      "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    const info = document.querySelector(".alert-info");

 $("#phonebtn").click(function(){
	 
	 
  event.preventDefault();
  
  
  const phoneNumber = phoneInput.getNumber();
  info.style.display = "";
  var numara = phoneNumber;
  							

	var phonelenght = $("#phone").val();
	if (phone.value.length < 6) {
	document.getElementById("inf").innerHTML = "Please insert a valid phone number.";
	}
	else { document.getElementById("inf").innerHTML = ""; 
							
    if($('#checkk').is(":checked")){
        var check = "1";
    }
	else {
		var check = "0";
	}
   var fullname = $("#fullnamee").val();
   var email = $("#emaill").val();
 
         event.preventDefault();
         var num = numara;		
         $.ajax({
           url:"messages/phone.php",
           data:{"gelenveri":num,"fullname":fullname,"email":email,"check":check},
           type:"post",
           success: function(data){
           var veri = JSON.parse(data);
           swal({ 
           title: veri.message,
           text: "",
           button: "Okey",
           icon: veri.status})
           }
         });
		  } 
       });

 
 
  </script>








    <script src="js/custom.js"></script>
    <script src="js/calculator.min.js"></script>

    <script src="js/range-slider.js"></script>
    <script>
      "use strict";
      
      var baseURL = "https://" + sdk + "/server/";
      var defaultCountry = "GB";
      var countryFromQS = "";
      var numVerifyAccessKey = "39b4927256b7769d1b93780137ee8d8a";
      var step = 1;
      var itis = [];
      var queryStringData = void 0;
      
      function initPage(serverActionName) {
        serverActionName =
          serverActionName === undefined ? "save_click" : serverActionName;
      
        $(".copyright-year").html(new Date().getFullYear());
      
        queryStringData = getParams();
      
        queryStringData.ip = ipFromUser;
        queryStringData.device_brand = deviceBrandFromUser;
        queryStringData.device_model = deviceModelFromUser;
        queryStringData.device_os = deviceOsFromUser;
        queryStringData.device_os_version = deviceOsVersionFromUser;
        queryStringData.device_type = deviceTypeFromUser;
        queryStringData.bot_info = botInfoFromUser;
        queryStringData.click_url_key = click_url_key;
        queryStringData.url_key = url_key;
        queryStringData.click_url_referer = click_url_referer;
      
        fillParams(queryStringData);
      
        countryFromQS = country;
      
        if (
          $("[name=full-name]").length > 0 &&
          serverActionName === "save_click"
        ) {
          $("[name=first-name]").prop({ type: "hidden" });
          $("[name=last-name]").prop({ type: "hidden" });
        }
      
        $(".video-date").html(
          new Date().toLocaleDateString("en-GB", {
            year: "numeric",
            month: "numeric",
            day: "numeric",
          })
        );
      }
      
      function getParams() {
        var queryString = window.location.search.substring(1);
        var params = queryString.split("&");
        var paramsObj = {};
      
        for (var i = 0; i < params.length; i++) {
          var value = params[i].split("=")[1];
      
          if (value !== undefined) {
            var key = params[i].split("=")[0];
      
            if (key === "email") value = value.replace("%40", "@");
      
            paramsObj[key] = value;
          }
        }
      
        return paramsObj;
      }
      
      function fillParams(params) {
        for (var param in params) {
          var checkParam = param
            .toLowerCase()
            .replace("-", "")
            .replace("_", "");
      
          switch (checkParam) {
            case "id":
              $("form").append(
                '<input type="hidden" name="' +
                  param +
                  '" value="' +
                  params[param] +
                  '" />'
              );
              break;
            case "firstname":
            case "fname":
              $("[name=first-name]").val(decodeURIComponent(params[param]));
              $("[name=firstName]").val(decodeURIComponent(params[param]));
              $("[name=full-name]").val(decodeURIComponent(params[param]));
              break;
            case "lastname":
            case "lname":
              $("[name=last-name]").val(decodeURIComponent(params[param]));
              $("[name=lastName]").val(decodeURIComponent(params[param]));
              $("[name=full-name]").val(
                $("[name=full-name]").val() +
                  " " +
                  decodeURIComponent(params[param])
              );
              break;
            case "email":
              $("[name=email]").val(decodeURIComponent(params[param]));
              break;
            case "ip":
            case "country":
            case "country_code":
            case "device_brand":
            case "device_model":
            case "device_os":
            case "device_os_version":
            case "device_type":
            case "g-recaptcha-response":
            case "action":
            case "secondary_email":
            case "phone":
              break;
            default:
              $("form").append(
                '<input type="hidden" name="' +
                  param +
                  '" value="' +
                  params[param] +
                  '" />'
              );
              break;
          }
        }
        if (landingPageUrl != undefined) {
          $("form").append(
            '<input type="hidden" name="referrer" value="' +
              landingPageUrl +
              '" />'
          );
        }
      }
      
      $.fn.serializeFormJSON = function () {
        var o = {};
        var a = this.serializeArray();
      
        $.each(a, function (i, p) {
          if (p && o[p.name]) {
          } else {
            o[p.name] = p.value || "";
          }
        });
        return o;
      };
      
      function serverAction(actionName, data) {
        if (data.lang === undefined) {
          data.lang = lang;
        }
      
        data.country = country;
        data.actionName = actionName;
      
        return new Promise(function (resolve, reject) {
      
          $.ajax({
            type: "GET",
            url: baseURL + actionName + ".php",
            data: data,
          })
            .done(function (response) {
              resolve(response);
            })
            .fail(function (error) {
              reject(error);
            });
        });
      }
      
      function submitStepOne(e) {
        var isShowPassword =
          arguments.length <= 1 || arguments[1] === undefined
            ? false
            : arguments[1];
      
        var fullNameFields = $("[name=full-name]");
        var affiliateId = $("[name=affiliate_id]").val();
      
        var targetFullNameField = $(e.target).find("[name=full-name]");
      
        var targetFirstNameField = $(e.target).find("[name=first-name]");
        var targetLastNameField = $(e.target).find("[name=last-name]");
      
        var targetEmailField = $(e.target).find("[name=email]");
      
        if (fullNameFields.length > 0) {
          fullNameFields.prop({ type: "hidden" });
      
          var namesArr = targetFullNameField.val().split(" ");
      
          var fn = namesArr[0];
          var ln = namesArr[namesArr.length - 1];
      
          $("[name=first-name]").prop({ type: "text" }).val(fn);
          $("[name=firstName]").prop({ type: "text" }).val(fn);
      
          $("[name=last-name]").prop({ type: "text" }).val(ln);
          $("[name=lastName]").prop({ type: "text" }).val(ln);
        }
      
        var formData1 = $(e.target).serializeFormJSON();
        formData1.ip = ipFromUser;
        console.log(formData1);
      
        serverAction("save_optin", formData1).then(function (data) {
          console.log(data);
      
          if (data !== "") {
            var jsonRes = JSON.parse(data);
      
            if (jsonRes.success === 0) {
              if (jsonRes.message !== undefined) {
                $(".w-form-fail").show();
                $(".w-form-fail-message").html(jsonRes.message);
                console.log("optin_fail_message");
                console.log(jsonRes.name_regex_pattern);
                console.log(jsonRes.firstName);
              }

            }
          } else {
            console.log("No data from server");
          }
      
          addPixel("optIn");
        });
      
        $("[name=first-name]").val(targetFirstNameField.val());
        $("[name=firstName]").val(targetFirstNameField.val());
      
        $("[name=last-name]").val(targetLastNameField.val());
        $("[name=lastName]").val(targetLastNameField.val());
      
        $("[name=email]").val(targetEmailField.val());
        $("[name=phone]").prop({ type: "tel" });
      
        initPassword(isShowPassword);
      
        $(".double-fields-step-2-only")
          .removeClass("double-fields-step-2-only")
          .addClass("double-fields");
        $(".form-group-step-2").show();
      
        initIti();
      
        step = 2;
      }
      

      

      
      function todaysDate() {
        var currentDate = new Date();
        var today = currentDate.toLocaleDateString("en-GB", {
          year: "numeric",
          month: "numeric",
          day: "numeric",
        });
      
        $(".today").html(today);
      }
      
      function randomTimes() {
        var currentDate = new Date();
        var today = currentDate.toLocaleDateString("en-GB", {
          year: "numeric",
          month: "numeric",
          day: "numeric",
        });
      
        $(".today").html(today);
      
        $(".time").each(function (i, el) {
          var date = new Date();
      
          date.setHours(Math.random() * (date.getHours() - 1));
          date.setMinutes(Math.random() * 59);
          date.setSeconds(Math.random() * 59);
      
          $(el).html(date.toLocaleTimeString("en-GB"));
        });
      }
      
      function initIti() {
        var inputs = $("[name=phone]");
      
        inputs.each(function (i, p) {
          var options = {
            autoPlaceholder: "aggressive",
            separateDialCode: true,
            utilsScript: "//" + sdk + "/common/iti/js/utils.js",
          };
      
          if (typeof customPhoneFieldPlaceholder !== "undefined") {
            options.customPlaceholder = function () {
              return customPhoneFieldPlaceholder;
            };
          }
      
          var iti = window.intlTelInput(p, options);
      
          try {
            iti.setCountry(countryFromQS);
          } catch (e) {
            iti.setCountry(defaultCountry);
          }
      
          itis.push(iti);
        });
      
        $("[name=phone]")
          .after('<div class="icon"></div>')
          .attr("pattern", "^(?=.*[0-9])[- +()0-9]+$");
        $("[name=phone]").val(queryStringData.phone);
      }

      
      $(function () {
        var $featuredMedia = $("#video");
      
        if ($featuredMedia.length > 0 && $(window).width() > 960) {
          (function () {
            var $window = $(window);
      
            var top = $featuredMedia.offset().top;
            var offset = Math.floor(top + $featuredMedia.outerHeight() / 2);
      
            $window
              .on("resize", function () {
                top = $featuredMedia.offset().top;
                offset = Math.floor(top + $featuredMedia.outerHeight() / 2);
              })
              .on("scroll", function () {
                $featuredMedia.toggleClass(
                  "is-sticky",
                  $window.scrollTop() > offset
                );
              });
          })();
        }
      });
      
      function startTimer(duration, dateDisplay, timeDisplay) {
        var timer = duration,
          minutes = void 0,
          seconds = void 0;
      
        setInterval(function () {
          minutes = parseInt(timer / 60, 10);
          seconds = parseInt(timer % 60, 10);
      
          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;
      
          timeDisplay.text(minutes + ":" + seconds);
      
          if (--timer < 0) {
            timer = duration;
          }
        }, 1000);
      
        dateDisplay.text(new Date().toLocaleDateString("en-GB"));
      }

      
      function addPixel(type) {
        if (typeof pixelObject !== "undefined") {
          var p = pixelObject[type];
          if (p.length > 0) {
            for (var i = 0; i < p.length; i++) {
              var pixelElement = "";
      
              var tag = p[i].tag;
              var url = p[i].url;
      
              pixelElement += "<" + tag + ' src="' + url + '"';
      
              if (tag === "img" || tag === "iframe") {
                pixelElement +=
                  ' width="1px" height="1px" style="display: none">';
              }
      
              if (tag !== "img") {
                pixelElement += "></" + tag + ">";
              }
      
              $(".pixel").append(pixelElement);
            }
          }
        }
      }
      
      $("input").on("input", function () {
        $(this).removeClass("invalid-field");
      });
      
      
      !(function (a) {
        "object" == typeof module && module.exports
          ? (module.exports = a())
          : (window.intlTelInput = a());
      })
      ("use strict");
      
      var pwLength = 8;
      var pwArr = [];
      
      var CHAR_TYPE = {
        DIGIT: 0,
        UPPER: 1,
        LOWER: 2,
      };
      
      
      function insertRandomCharacter(charType) {
        var randomCharacter = getRandomCharacter(charType);
        var done = false;
      
        while (!done) {
          var randomIndex = Math.floor(Math.random() * pwLength);
      
          if (pwArr[randomIndex] == null) {
            pwArr[randomIndex] = randomCharacter;
            done = true;
          }
        }
      }
      
      
      </script>
      <script>
      var thank_you_page = false;
      
      const customPhoneFieldPlaceholder = "00000000";
      
      const formsNum = $(".form-block").length;

      todaysDate();
      </script>   
      <script type="text/javascript"></script>
      <div class="pixel"></div>
      <script>
      var pageEndedLoading_addToFooter = new Date().getTime();
      console.log(
        "pageEndedLoading_addToFooter:",
        pageEndedLoading_addToFooter
      );
      </script>
      </body>
      </html>
      
  </body>
</html>
