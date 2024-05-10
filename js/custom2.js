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
    // data.key = key_hash;
    //console.log(data.key);

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
        // } else {
        //     console.log('{"success":true}')
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

function submitStepTwo(e) {
  var submitText = $("[type=submit]").html();
  $("input").removeClass("invalid-field");
  $("[type=submit]").attr("disabled", true);
  console.log("Submit button disabled");

  var isRedirectToNewPage =
    arguments.length <= 1 || arguments[1] === undefined
      ? false
      : arguments[1];
  var countdown =
    arguments.length <= 2 || arguments[2] === undefined
      ? 30
      : arguments[2];
  var isRedirectToThanksPage =
    arguments.length <= 3 || arguments[3] === undefined
      ? false
      : arguments[3];
  var thanksPageLogo = arguments[4];

  var formData2 = $(e.target).serializeFormJSON();
  var formIndex = $(e.target).data("index") || 0;

  formData2.phone = itis[formIndex].getNumber();
  formData2.country = itis[formIndex]
    .getSelectedCountryData()
    .iso2.toUpperCase();
  formData2.landingPageUrl = landingPageUrl;
  formData2.ip = ipFromUser;

  e.stopPropagation();

  var periodNum = 3;
  var periodDir = -1;

  var waitingTimer = setInterval(function () {
    if (countdown >= 0) {
      $("[type=submit]").html(waiting + "..." + countdown);
      countdown--;
    } else {
      $("[type=submit]").html(waiting + ".".repeat(periodNum));

      if (
        (periodNum === 0 && periodDir < 0) ||
        (periodNum === 3 && periodDir > 0)
      ) {
        periodDir *= -1;
      }

      periodNum += periodDir;
    }
  }, 1000);

  $(".w-form-fail").hide();

  serverAction("save_lead", formData2).then(function (data) {
    clearTimeout(waitingTimer);

    console.log(formData2);

    $("[type=submit]").html(submitText);

    console.log(data);

    var jsonRes = JSON.parse(data);

    if (jsonRes.success == 0) {
      $(".w-form-fail").show();
      $(".w-form-fail-message").html(jsonRes.message);

      $("[type=submit]").removeAttr("disabled");
      console.log("Submit button enabled");

      console.log("general_fail_message");
      console.log(jsonRes.name_regex_pattern);
      console.log(jsonRes.firstName);

      $("[name=" + jsonRes.invalidField + "]").addClass("invalid-field");
    } else {
      if (isRedirectToNewPage || isRedirectToThanksPage) {
        document.cookie =
          "leadPixelArray=" + JSON.stringify(pixelObject["lead"]);

        if (isRedirectToThanksPage) {
          var redirectUrl = "";

          if (window.location.hostname === "localhost") {
            redirectUrl = "../thank-you-page";
          } else {
            // redirectUrl = '//thankyou.' + window.location.hostname
            redirectUrl = "//thank-you-page-lp.com";
          }

          redirectUrl += "?logo_url=" + jsonRes.logo_url;
          redirectUrl += "&deposit_url=" + jsonRes.depositUrl;
          redirectUrl += "&brand_name=" + jsonRes.brand_name;
          redirectUrl += "&logo=" + thanksPageLogo;

          window.location.href = redirectUrl;
        } else {
          window.location.href = "./invest-now?url=" + jsonRes.depositUrl;
        }
      } else {
        addPixel("lead");

        $(".gtd-brand-logo").attr("src", jsonRes.logo_url);
        $(".gtd-redirect-url").attr("href", jsonRes.depositUrl);
        $(".gtd-lead-wrapper .brand-name").replaceWith(
          jsonRes.brand_name
        );
        $(".gtd-lead-wrapper").css("display", "flex");
      }
    }
  });
}

function onFormSubmit(formType) {
  var isShowPassword =
    arguments.length <= 1 || arguments[1] === undefined
      ? false
      : arguments[1];
  var isShowSteps =
    arguments.length <= 2 || arguments[2] === undefined
      ? false
      : arguments[2];
  var isRedirectToNewPage =
    arguments.length <= 3 || arguments[3] === undefined
      ? false
      : arguments[3];
  var countdown =
    arguments.length <= 4 || arguments[4] === undefined
      ? 30
      : arguments[4];

  var _this = this;

  var isRedirectToThanksPage =
    arguments.length <= 5 || arguments[5] === undefined
      ? false
      : arguments[5];
  var thanksPageLogo =
    arguments.length <= 6 || arguments[6] === undefined
      ? ""
      : arguments[6];

  $("form").submit(function (e) {
    var formAction = $(e.target).attr("action");

    if (
      typeof formAction === "undefined" ||
      formAction !== "members.php"
    ) {
      e.preventDefault();

      if (queryStringData["id"] !== undefined) {
        if (!isShowSteps) {
          switch (formType) {
            case "index":
              switch (step) {
                case 1:
                  submitStepOne(e, isShowPassword);
                  break;
                case 2:
                  submitStepTwo(
                    e,
                    isRedirectToNewPage,
                    countdown,
                    isRedirectToThanksPage,
                    thanksPageLogo
                  );
                  break;
              }
              break;
            case "members":
              submitStepTwo(
                e,
                isRedirectToNewPage,
                countdown,
                isRedirectToThanksPage,
                thanksPageLogo
              );
              break;
            default:
              break;
          }
        } else {
          switch (step) {
            case 1:
              submitStepOne(e, isShowPassword);
              $("[data-ix=fade-in-2]").removeClass("g");
              break;
            case 2:
              submitStepTwo(
                e,
                isRedirectToNewPage,
                countdown,
                isRedirectToThanksPage,
                thanksPageLogo
              );
              $("[data-ix=fade-in-3]").removeClass("g");
              break;
          }
        }
      } else {
        $(".w-form-fail").show();
        $(".w-form-fail-message").html("No ID Parameter");
      }
    } else {
      if (queryStringData["id"] === undefined) {
        e.preventDefault();

        $(".w-form-fail").show();
        $(".w-form-fail-message").html("No ID Parameter");
      } else {
        var fullNameFields = $("[name=full-name]");
        var targetFullNameField = $(e.target).find("[name=full-name]");

        if (fullNameFields.length > 0) {
          var namesArr = targetFullNameField.val().split(" ");

          var fn = namesArr[0];
          var ln = namesArr[namesArr.length - 1];

          $($(e.target)[0]).append(
            '<input type="hidden" name="first-name" value="' + fn + '">'
          );
          $($(e.target)[0]).append(
            '<input type="hidden" name="last-name" value="' + ln + '">'
          );
        }

        $(_this).submit();
      }
    }
  });
}

function setCountry(iso, nameEl, flagEl) {
  if (typeof setCountryRanOnce === "undefined") {
    window.setCountryRanOnce = true;

    $.getJSON("//" + sdk + "/common/countries.json", function (res) {
      var country =
        res.filter(function (c) {
          return c.country_iso === iso;
        })[0] ||
        res.filter(function (c) {
          return c.country_iso === defaultCountry;
        })[0];

      var countryISO = country.country_iso;
      var countryName = country.name;

      $(nameEl).html(countryName);
      $(flagEl).attr(
        "src",
        "https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/flags/4x3/" +
          countryISO.toLowerCase() +
          ".svg"
      );
    });
  }
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

function initPassword() {
  var isShowPassword =
    arguments.length <= 0 || arguments[0] === undefined
      ? false
      : arguments[0];

  if (!isShowPassword) {
    // $('[name=password]').prop({type: 'hidden'}).val(Math.random().toString(36).slice(-5) + 'Qq7');
    $("[name=password]").prop({ type: "hidden" }).val("Aa123456");
    $(".password-double-fields").hide();
  } else {
    $("[name=password]").prop({ type: "password" });
  }
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

// test
/*
 * International Telephone Input v17.0.0
 * https://github.com/jackocnr/intl-tel-input.git
 * Licensed under the MIT license
 */

!(function (a) {
  "object" == typeof module && module.exports
    ? (module.exports = a())
    : (window.intlTelInput = a());
})(function (a) {
  "use strict";
  return (function () {
    function b(a, b) {
      if (!(a instanceof b))
        throw new TypeError("Cannot call a class as a function");
    }
    function c(a, b) {
      for (var c = 0; c < b.length; c++) {
        var d = b[c];
        (d.enumerable = d.enumerable || !1),
          (d.configurable = !0),
          "value" in d && (d.writable = !0),
          Object.defineProperty(a, d.key, d);
      }
    }
    function d(a, b, d) {
      return b && c(a.prototype, b), d && c(a, d), a;
    }
    for (
      var e = [
          ["Afghanistan (‫افغانستان‬‎)", "af", "93"],
          ["Albania (Shqipëri)", "al", "355"],
          ["Algeria (‫الجزائر‬‎)", "dz", "213"],
          ["American Samoa", "as", "1", 5, ["684"]],
          ["Andorra", "ad", "376"],
          ["Angola", "ao", "244"],
          ["Anguilla", "ai", "1", 6, ["264"]],
          ["Antigua and Barbuda", "ag", "1", 7, ["268"]],
          ["Argentina", "ar", "54"],
          ["Armenia (Հայաստան)", "am", "374"],
          ["Aruba", "aw", "297"],
          ["Australia", "au", "61", 0],
          ["Austria (Österreich)", "at", "43"],
          ["Azerbaijan (Azərbaycan)", "az", "994"],
          ["Bahamas", "bs", "1", 8, ["242"]],
          ["Bahrain (‫البحرين‬‎)", "bh", "973"],
          ["Bangladesh (বাংলাদেশ)", "bd", "880"],
          ["Barbados", "bb", "1", 9, ["246"]],
          ["Belarus (Беларусь)", "by", "375"],
          ["Belgium (België)", "be", "32"],
          ["Belize", "bz", "501"],
          ["Benin (Bénin)", "bj", "229"],
          ["Bermuda", "bm", "1", 10, ["441"]],
          ["Bhutan (འབྲུག)", "bt", "975"],
          ["Bolivia", "bo", "591"],
          ["Bosnia and Herzegovina (Босна и Херцеговина)", "ba", "387"],
          ["Botswana", "bw", "267"],
          ["Brazil (Brasil)", "br", "55"],
          ["British Indian Ocean Territory", "io", "246"],
          ["British Virgin Islands", "vg", "1", 11, ["284"]],
          ["Brunei", "bn", "673"],
          ["Bulgaria (България)", "bg", "359"],
          ["Burkina Faso", "bf", "226"],
          ["Burundi (Uburundi)", "bi", "257"],
          ["Cambodia (កម្ពុជា)", "kh", "855"],
          ["Cameroon (Cameroun)", "cm", "237"],
          [
            "Canada",
            "ca",
            "1",
            1,
            [
              "204",
              "226",
              "236",
              "249",
              "250",
              "289",
              "306",
              "343",
              "365",
              "387",
              "403",
              "416",
              "418",
              "431",
              "437",
              "438",
              "450",
              "506",
              "514",
              "519",
              "548",
              "579",
              "581",
              "587",
              "604",
              "613",
              "639",
              "647",
              "672",
              "705",
              "709",
              "742",
              "778",
              "780",
              "782",
              "807",
              "819",
              "825",
              "867",
              "873",
              "902",
              "905",
            ],
          ],
          ["Cape Verde (Kabu Verdi)", "cv", "238"],
          ["Caribbean Netherlands", "bq", "599", 1, ["3", "4", "7"]],
          ["Cayman Islands", "ky", "1", 12, ["345"]],
          [
            "Central African Republic (République centrafricaine)",
            "cf",
            "236",
          ],
          ["Chad (Tchad)", "td", "235"],
          ["Chile", "cl", "56"],
          ["China (中国)", "cn", "86"],
          ["Christmas Island", "cx", "61", 2],
          ["Cocos (Keeling) Islands", "cc", "61", 1],
          ["Colombia", "co", "57"],
          ["Comoros (‫جزر القمر‬‎)", "km", "269"],
          ["Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)", "cd", "243"],
          ["Congo (Republic) (Congo-Brazzaville)", "cg", "242"],
          ["Cook Islands", "ck", "682"],
          ["Costa Rica", "cr", "506"],
          ["Côte d’Ivoire", "ci", "225"],
          ["Croatia (Hrvatska)", "hr", "385"],
          ["Cuba", "cu", "53"],
          ["Curaçao", "cw", "599", 0],
          ["Cyprus (Κύπρος)", "cy", "357"],
          ["Czech Republic (Česká republika)", "cz", "420"],
          ["Denmark (Danmark)", "dk", "45"],
          ["Djibouti", "dj", "253"],
          ["Dominica", "dm", "1", 13, ["767"]],
          [
            "Dominican Republic (República Dominicana)",
            "do",
            "1",
            2,
            ["809", "829", "849"],
          ],
          ["Ecuador", "ec", "593"],
          ["Egypt (‫مصر‬‎)", "eg", "20"],
          ["El Salvador", "sv", "503"],
          ["Equatorial Guinea (Guinea Ecuatorial)", "gq", "240"],
          ["Eritrea", "er", "291"],
          ["Estonia (Eesti)", "ee", "372"],
          ["Ethiopia", "et", "251"],
          ["Falkland Islands (Islas Malvinas)", "fk", "500"],
          ["Faroe Islands (Føroyar)", "fo", "298"],
          ["Fiji", "fj", "679"],
          ["Finland (Suomi)", "fi", "358", 0],
          ["France", "fr", "33"],
          ["French Guiana (Guyane française)", "gf", "594"],
          ["French Polynesia (Polynésie française)", "pf", "689"],
          ["Gabon", "ga", "241"],
          ["Gambia", "gm", "220"],
          ["Georgia (საქართველო)", "ge", "995"],
          ["Germany (Deutschland)", "de", "49"],
          ["Ghana (Gaana)", "gh", "233"],
          ["Gibraltar", "gi", "350"],
          ["Greece (Ελλάδα)", "gr", "30"],
          ["Greenland (Kalaallit Nunaat)", "gl", "299"],
          ["Grenada", "gd", "1", 14, ["473"]],
          ["Guadeloupe", "gp", "590", 0],
          ["Guam", "gu", "1", 15, ["671"]],
          ["Guatemala", "gt", "502"],
          ["Guernsey", "gg", "44", 1, ["1481", "7781", "7839", "7911"]],
          ["Guinea (Guinée)", "gn", "224"],
          ["Guinea-Bissau (Guiné Bissau)", "gw", "245"],
          ["Guyana", "gy", "592"],
          ["Haiti", "ht", "509"],
          ["Honduras", "hn", "504"],
          ["Hong Kong (香港)", "hk", "852"],
          ["Hungary (Magyarország)", "hu", "36"],
          ["Iceland (Ísland)", "is", "354"],
          ["India (भारत)", "in", "91"],
          ["Indonesia", "id", "62"],
          ["Iran (‫ایران‬‎)", "ir", "98"],
          ["Iraq (‫العراق‬‎)", "iq", "964"],
          ["Ireland", "ie", "353"],
          [
            "Isle of Man",
            "im",
            "44",
            2,
            ["1624", "74576", "7524", "7924", "7624"],
          ],
          ["Israel (‫ישראל‬‎)", "il", "972"],
          ["Italy (Italia)", "it", "39", 0],
          ["Jamaica", "jm", "1", 4, ["876", "658"]],
          ["Japan (日本)", "jp", "81"],
          [
            "Jersey",
            "je",
            "44",
            3,
            ["1534", "7509", "7700", "7797", "7829", "7937"],
          ],
          ["Jordan (‫الأردن‬‎)", "jo", "962"],
          ["Kazakhstan (Казахстан)", "kz", "7", 1, ["33", "7"]],
          ["Kenya", "ke", "254"],
          ["Kiribati", "ki", "686"],
          ["Kosovo", "xk", "383"],
          ["Kuwait (‫الكويت‬‎)", "kw", "965"],
          ["Kyrgyzstan (Кыргызстан)", "kg", "996"],
          ["Laos (ລາວ)", "la", "856"],
          ["Latvia (Latvija)", "lv", "371"],
          ["Lebanon (‫لبنان‬‎)", "lb", "961"],
          ["Lesotho", "ls", "266"],
          ["Liberia", "lr", "231"],
          ["Libya (‫ليبيا‬‎)", "ly", "218"],
          ["Liechtenstein", "li", "423"],
          ["Lithuania (Lietuva)", "lt", "370"],
          ["Luxembourg", "lu", "352"],
          ["Macau (澳門)", "mo", "853"],
          ["Macedonia (FYROM) (Македонија)", "mk", "389"],
          ["Madagascar (Madagasikara)", "mg", "261"],
          ["Malawi", "mw", "265"],
          ["Malaysia", "my", "60"],
          ["Maldives", "mv", "960"],
          ["Mali", "ml", "223"],
          ["Malta", "mt", "356"],
          ["Marshall Islands", "mh", "692"],
          ["Martinique", "mq", "596"],
          ["Mauritania (‫موريتانيا‬‎)", "mr", "222"],
          ["Mauritius (Moris)", "mu", "230"],
          ["Mayotte", "yt", "262", 1, ["269", "639"]],
          ["Mexico (México)", "mx", "52"],
          ["Micronesia", "fm", "691"],
          ["Moldova (Republica Moldova)", "md", "373"],
          ["Monaco", "mc", "377"],
          ["Mongolia (Монгол)", "mn", "976"],
          ["Montenegro (Crna Gora)", "me", "382"],
          ["Montserrat", "ms", "1", 16, ["664"]],
          ["Morocco (‫المغرب‬‎)", "ma", "212", 0],
          ["Mozambique (Moçambique)", "mz", "258"],
          ["Myanmar (Burma) (မြန်မာ)", "mm", "95"],
          ["Namibia (Namibië)", "na", "264"],
          ["Nauru", "nr", "674"],
          ["Nepal (नेपाल)", "np", "977"],
          ["Netherlands (Nederland)", "nl", "31"],
          ["New Caledonia (Nouvelle-Calédonie)", "nc", "687"],
          ["New Zealand", "nz", "64"],
          ["Nicaragua", "ni", "505"],
          ["Niger (Nijar)", "ne", "227"],
          ["Nigeria", "ng", "234"],
          ["Niue", "nu", "683"],
          ["Norfolk Island", "nf", "672"],
          ["North Korea (조선 민주주의 인민 공화국)", "kp", "850"],
          ["Northern Mariana Islands", "mp", "1", 17, ["670"]],
          ["Norway (Norge)", "no", "47", 0],
          ["Oman (‫عُمان‬‎)", "om", "968"],
          ["Pakistan (‫پاکستان‬‎)", "pk", "92"],
          ["Palau", "pw", "680"],
          ["Palestine (‫فلسطين‬‎)", "ps", "970"],
          ["Panama (Panamá)", "pa", "507"],
          ["Papua New Guinea", "pg", "675"],
          ["Paraguay", "py", "595"],
          ["Peru (Perú)", "pe", "51"],
          ["Philippines", "ph", "63"],
          ["Poland (Polska)", "pl", "48"],
          ["Portugal", "pt", "351"],
          ["Puerto Rico", "pr", "1", 3, ["787", "939"]],
          ["Qatar (‫قطر‬‎)", "qa", "974"],
          ["Réunion (La Réunion)", "re", "262", 0],
          ["Romania (România)", "ro", "40"],
          ["Russia (Россия)", "ru", "7", 0],
          ["Rwanda", "rw", "250"],
          ["Saint Barthélemy", "bl", "590", 1],
          ["Saint Helena", "sh", "290"],
          ["Saint Kitts and Nevis", "kn", "1", 18, ["869"]],
          ["Saint Lucia", "lc", "1", 19, ["758"]],
          [
            "Saint Martin (Saint-Martin (partie française))",
            "mf",
            "590",
            2,
          ],
          [
            "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
            "pm",
            "508",
          ],
          ["Saint Vincent and the Grenadines", "vc", "1", 20, ["784"]],
          ["Samoa", "ws", "685"],
          ["San Marino", "sm", "378"],
          ["São Tomé and Príncipe (São Tomé e Príncipe)", "st", "239"],
          ["Saudi Arabia (‫المملكة العربية السعودية‬‎)", "sa", "966"],
          ["Senegal (Sénégal)", "sn", "221"],
          ["Serbia (Србија)", "rs", "381"],
          ["Seychelles", "sc", "248"],
          ["Sierra Leone", "sl", "232"],
          ["Singapore", "sg", "65"],
          ["Sint Maarten", "sx", "1", 21, ["721"]],
          ["Slovakia (Slovensko)", "sk", "421"],
          ["Slovenia (Slovenija)", "si", "386"],
          ["Solomon Islands", "sb", "677"],
          ["Somalia (Soomaaliya)", "so", "252"],
          ["South Africa", "za", "27"],
          ["South Korea (대한민국)", "kr", "82"],
          ["South Sudan (‫جنوب السودان‬‎)", "ss", "211"],
          ["Spain (España)", "es", "34"],
          ["Sri Lanka (ශ්‍රී ලංකාව)", "lk", "94"],
          ["Sudan (‫السودان‬‎)", "sd", "249"],
          ["Suriname", "sr", "597"],
          ["Svalbard and Jan Mayen", "sj", "47", 1, ["79"]],
          ["Swaziland", "sz", "268"],
          ["Sweden (Sverige)", "se", "46"],
          ["Switzerland (Schweiz)", "ch", "41"],
          ["Syria (‫سوريا‬‎)", "sy", "963"],
          ["Taiwan (台灣)", "tw", "886"],
          ["Tajikistan", "tj", "992"],
          ["Tanzania", "tz", "255"],
          ["Thailand (ไทย)", "th", "66"],
          ["Timor-Leste", "tl", "670"],
          ["Togo", "tg", "228"],
          ["Tokelau", "tk", "690"],
          ["Tonga", "to", "676"],
          ["Trinidad and Tobago", "tt", "1", 22, ["868"]],
          ["Tunisia (‫تونس‬‎)", "tn", "216"],
          ["Turkey (Türkiye)", "tr", "90"],
          ["Turkmenistan", "tm", "993"],
          ["Turks and Caicos Islands", "tc", "1", 23, ["649"]],
          ["Tuvalu", "tv", "688"],
          ["U.S. Virgin Islands", "vi", "1", 24, ["340"]],
          ["Uganda", "ug", "256"],
          ["Ukraine (Україна)", "ua", "380"],
          [
            "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)",
            "ae",
            "971",
          ],
          ["United Kingdom", "gb", "44", 0],
          ["United States", "us", "1", 0],
          ["Uruguay", "uy", "598"],
          ["Uzbekistan (Oʻzbekiston)", "uz", "998"],
          ["Vanuatu", "vu", "678"],
          ["Vatican City (Città del Vaticano)", "va", "39", 1, ["06698"]],
          ["Venezuela", "ve", "58"],
          ["Vietnam (Việt Nam)", "vn", "84"],
          ["Wallis and Futuna (Wallis-et-Futuna)", "wf", "681"],
          [
            "Western Sahara (‫الصحراء الغربية‬‎)",
            "eh",
            "212",
            1,
            ["5288", "5289"],
          ],
          ["Yemen (‫اليمن‬‎)", "ye", "967"],
          ["Zambia", "zm", "260"],
          ["Zimbabwe", "zw", "263"],
          ["Åland Islands", "ax", "358", 1, ["18"]],
        ],
        f = 0;
      f < e.length;
      f++
    ) {
      var g = e[f];
      e[f] = {
        name: g[0],
        iso2: g[1],
        dialCode: g[2],
        priority: g[3] || 0,
        areaCodes: g[4] || null,
      };
    }
    var h = {
      getInstance: function (a) {
        var b = a.getAttribute("data-intl-tel-input-id");
        return window.intlTelInputGlobals.instances[b];
      },
      instances: {},
    };
    "object" == typeof window && (window.intlTelInputGlobals = h);
    var i = 0,
      j = {
        allowDropdown: !0,
        autoHideDialCode: !0,
        autoPlaceholder: "polite",
        customContainer: "",
        customPlaceholder: null,
        dropdownContainer: null,
        excludeCountries: [],
        formatOnDisplay: !0,
        geoIpLookup: null,
        hiddenInput: "",
        initialCountry: "",
        localizedCountries: null,
        nationalMode: !0,
        onlyCountries: [],
        placeholderNumberType: "MOBILE",
        preferredCountries: ["us", "gb"],
        separateDialCode: !1,
        utilsScript: "",
      },
      k = [
        "800",
        "822",
        "833",
        "844",
        "855",
        "866",
        "877",
        "880",
        "881",
        "882",
        "883",
        "884",
        "885",
        "886",
        "887",
        "888",
        "889",
      ];
    "object" == typeof window &&
      window.addEventListener("load", function () {
        window.intlTelInputGlobals.windowLoaded = !0;
      });
    var l = function (a, b) {
        for (var c = Object.keys(a), d = 0; d < c.length; d++)
          b(c[d], a[c[d]]);
      },
      m = function (a) {
        l(window.intlTelInputGlobals.instances, function (b) {
          window.intlTelInputGlobals.instances[b][a]();
        });
      },
      n = (function () {
        function c(a, d) {
          var e = this;
          b(this, c),
            (this.id = i++),
            (this.a = a),
            (this.b = null),
            (this.c = null);
          var f = d || {};
          (this.d = {}),
            l(j, function (a, b) {
              e.d[a] = f.hasOwnProperty(a) ? f[a] : b;
            }),
            (this.e = Boolean(a.getAttribute("placeholder")));
        }
        return (
          d(c, [
            {
              key: "_init",
              value: function () {
                var a = this;
                if (
                  (this.d.nationalMode && (this.d.autoHideDialCode = !1),
                  this.d.separateDialCode &&
                    (this.d.autoHideDialCode = this.d.nationalMode = !1),
                  (this.g =
                    /Android.+Mobile|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                      navigator.userAgent
                    )),
                  this.g &&
                    (document.body.classList.add("iti-mobile"),
                    this.d.dropdownContainer ||
                      (this.d.dropdownContainer = document.body)),
                  "undefined" != typeof Promise)
                ) {
                  var b = new Promise(function (b, c) {
                      (a.h = b), (a.i = c);
                    }),
                    c = new Promise(function (b, c) {
                      (a.i0 = b), (a.i1 = c);
                    });
                  this.promise = Promise.all([b, c]);
                } else
                  (this.h = this.i = function () {}),
                    (this.i0 = this.i1 = function () {});
                (this.s = {}),
                  this._b(),
                  this._f(),
                  this._h(),
                  this._i(),
                  this._i3();
              },
            },
            {
              key: "_b",
              value: function () {
                this._d(),
                  this._d2(),
                  this._e(),
                  this.d.localizedCountries && this._d0(),
                  (this.d.onlyCountries.length ||
                    this.d.localizedCountries) &&
                    this.p.sort(this._d1);
              },
            },
            {
              key: "_c",
              value: function (b, c, d) {
                c.length > this.dialCodeMaxLen &&
                  (this.dialCodeMaxLen = c.length),
                  this.q.hasOwnProperty(c) || (this.q[c] = []);
                for (var e = 0; e < this.q[c].length; e++)
                  if (this.q[c][e] === b) return;
                var f = d !== a ? d : this.q[c].length;
                this.q[c][f] = b;
              },
            },
            {
              key: "_d",
              value: function () {
                if (this.d.onlyCountries.length) {
                  var a = this.d.onlyCountries.map(function (a) {
                    return a.toLowerCase();
                  });
                  this.p = e.filter(function (b) {
                    return a.indexOf(b.iso2) > -1;
                  });
                } else if (this.d.excludeCountries.length) {
                  var b = this.d.excludeCountries.map(function (a) {
                    return a.toLowerCase();
                  });
                  this.p = e.filter(function (a) {
                    return -1 === b.indexOf(a.iso2);
                  });
                } else this.p = e;
              },
            },
            {
              key: "_d0",
              value: function () {
                for (var a = 0; a < this.p.length; a++) {
                  var b = this.p[a].iso2.toLowerCase();
                  this.d.localizedCountries.hasOwnProperty(b) &&
                    (this.p[a].name = this.d.localizedCountries[b]);
                }
              },
            },
            {
              key: "_d1",
              value: function (a, b) {
                return a.name.localeCompare(b.name);
              },
            },
            {
              key: "_d2",
              value: function () {
                (this.dialCodeMaxLen = 0), (this.q = {});
                for (var a = 0; a < this.p.length; a++) {
                  var b = this.p[a];
                  this._c(b.iso2, b.dialCode, b.priority);
                }
                for (var c = 0; c < this.p.length; c++) {
                  var d = this.p[c];
                  if (d.areaCodes)
                    for (
                      var e = this.q[d.dialCode][0], f = 0;
                      f < d.areaCodes.length;
                      f++
                    ) {
                      for (
                        var g = d.areaCodes[f], h = 1;
                        h < g.length;
                        h++
                      ) {
                        var i = d.dialCode + g.substr(0, h);
                        this._c(e, i), this._c(d.iso2, i);
                      }
                      this._c(d.iso2, d.dialCode + g);
                    }
                }
              },
            },
            {
              key: "_e",
              value: function () {
                this.preferredCountries = [];
                for (
                  var a = 0;
                  a < this.d.preferredCountries.length;
                  a++
                ) {
                  var b = this.d.preferredCountries[a].toLowerCase(),
                    c = this._y(b, !1, !0);
                  c && this.preferredCountries.push(c);
                }
              },
            },
            {
              key: "_e2",
              value: function (a, b, c) {
                var d = document.createElement(a);
                return (
                  b &&
                    l(b, function (a, b) {
                      return d.setAttribute(a, b);
                    }),
                  c && c.appendChild(d),
                  d
                );
              },
            },
            {
              key: "_f",
              value: function () {
                this.a.hasAttribute("autocomplete") ||
                  (this.a.form &&
                    this.a.form.hasAttribute("autocomplete")) ||
                  this.a.setAttribute("autocomplete", "off");
                var a = "iti";
                this.d.allowDropdown && (a += " iti--allow-dropdown"),
                  this.d.separateDialCode &&
                    (a += " iti--separate-dial-code"),
                  this.d.customContainer &&
                    ((a += " "), (a += this.d.customContainer));
                var b = this._e2("div", { class: a });
                if (
                  (this.a.parentNode.insertBefore(b, this.a),
                  (this.k = this._e2(
                    "div",
                    { class: "iti__flag-container" },
                    b
                  )),
                  b.appendChild(this.a),
                  (this.selectedFlag = this._e2(
                    "div",
                    {
                      class: "iti__selected-flag",
                      role: "combobox",
                      "aria-owns": "iti-".concat(
                        this.id,
                        "__country-listbox"
                      ),
                      "aria-expanded": "false",
                    },
                    this.k
                  )),
                  (this.l = this._e2(
                    "div",
                    { class: "iti__flag" },
                    this.selectedFlag
                  )),
                  this.d.separateDialCode &&
                    (this.t = this._e2(
                      "div",
                      { class: "iti__selected-dial-code" },
                      this.selectedFlag
                    )),
                  this.d.allowDropdown &&
                    (this.selectedFlag.setAttribute("tabindex", "0"),
                    (this.u = this._e2(
                      "div",
                      { class: "iti__arrow" },
                      this.selectedFlag
                    )),
                    (this.m = this._e2("ul", {
                      class: "iti__country-list iti__hide",
                      id: "iti-".concat(this.id, "__country-listbox"),
                      role: "listbox",
                    })),
                    this.preferredCountries.length &&
                      (this._g(
                        this.preferredCountries,
                        "iti__preferred",
                        !0
                      ),
                      this._e2(
                        "li",
                        {
                          class: "iti__divider",
                          role: "separator",
                          "aria-disabled": "true",
                        },
                        this.m
                      )),
                    this._g(this.p, "iti__standard"),
                    this.d.dropdownContainer
                      ? ((this.dropdown = this._e2("div", {
                          class: "iti iti--container",
                        })),
                        this.dropdown.appendChild(this.m))
                      : this.k.appendChild(this.m)),
                  this.d.hiddenInput)
                ) {
                  var c = this.d.hiddenInput,
                    d = this.a.getAttribute("name");
                  if (d) {
                    var e = d.lastIndexOf("[");
                    -1 !== e &&
                      (c = "".concat(d.substr(0, e), "[").concat(c, "]"));
                  }
                  (this.hiddenInput = this._e2("input", {
                    type: "hidden",
                    name: c,
                  })),
                    b.appendChild(this.hiddenInput);
                }
              },
            },
            {
              key: "_g",
              value: function (a, b, c) {
                for (var d = "", e = 0; e < a.length; e++) {
                  var f = a[e],
                    g = c ? "-preferred" : "";
                  (d += "<li class='iti__country "
                    .concat(b, "' tabIndex='-1' id='iti-")
                    .concat(this.id, "__item-")
                    .concat(f.iso2)
                    .concat(g, "' role='option' data-dial-code='")
                    .concat(f.dialCode, "' data-country-code='")
                    .concat(f.iso2, "'>")),
                    (d +=
                      "<div class='iti__flag-box'><div class='iti__flag iti__".concat(
                        f.iso2,
                        "'></div></div>"
                      )),
                    (d += "<span class='iti__country-name'>".concat(
                      f.name,
                      "</span>"
                    )),
                    (d += "<span class='iti__dial-code'>+".concat(
                      f.dialCode,
                      "</span>"
                    )),
                    (d += "</li>");
                }
                this.m.insertAdjacentHTML("beforeend", d);
              },
            },
            {
              key: "_h",
              value: function () {
                var a = this.a.value,
                  b = this._5(a),
                  c = this._w(a),
                  d = this.d,
                  e = d.initialCountry,
                  f = d.nationalMode,
                  g = d.autoHideDialCode,
                  h = d.separateDialCode;
                b && !c
                  ? this._v(a)
                  : "auto" !== e &&
                    (e
                      ? this._z(e.toLowerCase())
                      : b && c
                      ? this._z("us")
                      : ((this.j = this.preferredCountries.length
                          ? this.preferredCountries[0].iso2
                          : this.p[0].iso2),
                        a || this._z(this.j)),
                    a ||
                      f ||
                      g ||
                      h ||
                      (this.a.value = "+".concat(this.s.dialCode))),
                  a && this._u(a);
              },
            },
            {
              key: "_i",
              value: function () {
                this._j(),
                  this.d.autoHideDialCode && this._l(),
                  this.d.allowDropdown && this._i2(),
                  this.hiddenInput && this._i0();
              },
            },
            {
              key: "_i0",
              value: function () {
                var a = this;
                (this._a14 = function () {
                  a.hiddenInput.value = a.getNumber();
                }),
                  this.a.form &&
                    this.a.form.addEventListener("submit", this._a14);
              },
            },
            {
              key: "_i1",
              value: function () {
                for (var a = this.a; a && "LABEL" !== a.tagName; )
                  a = a.parentNode;
                return a;
              },
            },
            {
              key: "_i2",
              value: function () {
                var a = this;
                this._a9 = function (b) {
                  a.m.classList.contains("iti__hide")
                    ? a.a.focus()
                    : b.preventDefault();
                };
                var b = this._i1();
                b && b.addEventListener("click", this._a9),
                  (this._a10 = function () {
                    !a.m.classList.contains("iti__hide") ||
                      a.a.disabled ||
                      a.a.readOnly ||
                      a._n();
                  }),
                  this.selectedFlag.addEventListener("click", this._a10),
                  (this._a11 = function (b) {
                    a.m.classList.contains("iti__hide") &&
                      -1 !==
                        [
                          "ArrowUp",
                          "Up",
                          "ArrowDown",
                          "Down",
                          " ",
                          "Enter",
                        ].indexOf(b.key) &&
                      (b.preventDefault(), b.stopPropagation(), a._n()),
                      "Tab" === b.key && a._2();
                  }),
                  this.k.addEventListener("keydown", this._a11);
              },
            },
            {
              key: "_i3",
              value: function () {
                var a = this;
                this.d.utilsScript && !window.intlTelInputUtils
                  ? window.intlTelInputGlobals.windowLoaded
                    ? window.intlTelInputGlobals.loadUtils(
                        this.d.utilsScript
                      )
                    : window.addEventListener("load", function () {
                        window.intlTelInputGlobals.loadUtils(
                          a.d.utilsScript
                        );
                      })
                  : this.i0(),
                  "auto" === this.d.initialCountry
                    ? this._i4()
                    : this.h();
              },
            },
            {
              key: "_i4",
              value: function () {
                window.intlTelInputGlobals.autoCountry
                  ? this.handleAutoCountry()
                  : window.intlTelInputGlobals
                      .startedLoadingAutoCountry ||
                    ((window.intlTelInputGlobals.startedLoadingAutoCountry =
                      !0),
                    "function" == typeof this.d.geoIpLookup &&
                      this.d.geoIpLookup(
                        function (a) {
                          (window.intlTelInputGlobals.autoCountry =
                            a.toLowerCase()),
                            setTimeout(function () {
                              return m("handleAutoCountry");
                            });
                        },
                        function () {
                          return m("rejectAutoCountryPromise");
                        }
                      ));
              },
            },
            {
              key: "_j",
              value: function () {
                var a = this;
                (this._a12 = function () {
                  a._v(a.a.value) && a._8();
                }),
                  this.a.addEventListener("keyup", this._a12),
                  (this._a13 = function () {
                    setTimeout(a._a12);
                  }),
                  this.a.addEventListener("cut", this._a13),
                  this.a.addEventListener("paste", this._a13);
              },
            },
            {
              key: "_j2",
              value: function (a) {
                var b = this.a.getAttribute("maxlength");
                return b && a.length > b ? a.substr(0, b) : a;
              },
            },
            {
              key: "_l",
              value: function () {
                var a = this;
                (this._a8 = function () {
                  a._l2();
                }),
                  this.a.form &&
                    this.a.form.addEventListener("submit", this._a8),
                  this.a.addEventListener("blur", this._a8);
              },
            },
            {
              key: "_l2",
              value: function () {
                if ("+" === this.a.value.charAt(0)) {
                  var a = this._m(this.a.value);
                  (a && this.s.dialCode !== a) || (this.a.value = "");
                }
              },
            },
            {
              key: "_m",
              value: function (a) {
                return a.replace(/\D/g, "");
              },
            },
            {
              key: "_m2",
              value: function (a) {
                var b = document.createEvent("Event");
                b.initEvent(a, !0, !0), this.a.dispatchEvent(b);
              },
            },
            {
              key: "_n",
              value: function () {
                this.m.classList.remove("iti__hide"),
                  this.selectedFlag.setAttribute("aria-expanded", "true"),
                  this._o(),
                  this.b && (this._x(this.b, !1), this._3(this.b, !0)),
                  this._p(),
                  this.u.classList.add("iti__arrow--up"),
                  this._m2("open:countrydropdown");
              },
            },
            {
              key: "_n2",
              value: function (a, b, c) {
                c && !a.classList.contains(b)
                  ? a.classList.add(b)
                  : !c &&
                    a.classList.contains(b) &&
                    a.classList.remove(b);
              },
            },
            {
              key: "_o",
              value: function () {
                var a = this;
                if (
                  (this.d.dropdownContainer &&
                    this.d.dropdownContainer.appendChild(this.dropdown),
                  !this.g)
                ) {
                  var b = this.a.getBoundingClientRect(),
                    c =
                      window.pageYOffset ||
                      document.documentElement.scrollTop,
                    d = b.top + c,
                    e = this.m.offsetHeight,
                    f =
                      d + this.a.offsetHeight + e <
                      c + window.innerHeight,
                    g = d - e > c;
                  if (
                    (this._n2(
                      this.m,
                      "iti__country-list--dropup",
                      !f && g
                    ),
                    this.d.dropdownContainer)
                  ) {
                    var h = !f && g ? 0 : this.a.offsetHeight;
                    (this.dropdown.style.top = "".concat(d + h, "px")),
                      (this.dropdown.style.left = "".concat(
                        b.left + document.body.scrollLeft,
                        "px"
                      )),
                      (this._a4 = function () {
                        return a._2();
                      }),
                      window.addEventListener("scroll", this._a4);
                  }
                }
              },
            },
            {
              key: "_o2",
              value: function (a) {
                for (
                  var b = a;
                  b &&
                  b !== this.m &&
                  !b.classList.contains("iti__country");

                )
                  b = b.parentNode;
                return b === this.m ? null : b;
              },
            },
            {
              key: "_p",
              value: function () {
                var a = this;
                (this._a0 = function (b) {
                  var c = a._o2(b.target);
                  c && a._x(c, !1);
                }),
                  this.m.addEventListener("mouseover", this._a0),
                  (this._a1 = function (b) {
                    var c = a._o2(b.target);
                    c && a._1(c);
                  }),
                  this.m.addEventListener("click", this._a1);
                var b = !0;
                (this._a2 = function () {
                  b || a._2(), (b = !1);
                }),
                  document.documentElement.addEventListener(
                    "click",
                    this._a2
                  );
                var c = "",
                  d = null;
                (this._a3 = function (b) {
                  b.preventDefault(),
                    "ArrowUp" === b.key ||
                    "Up" === b.key ||
                    "ArrowDown" === b.key ||
                    "Down" === b.key
                      ? a._q(b.key)
                      : "Enter" === b.key
                      ? a._r()
                      : "Escape" === b.key
                      ? a._2()
                      : /^[a-zA-ZÀ-ÿа-яА-Я ]$/.test(b.key) &&
                        (d && clearTimeout(d),
                        (c += b.key.toLowerCase()),
                        a._s(c),
                        (d = setTimeout(function () {
                          c = "";
                        }, 1e3)));
                }),
                  document.addEventListener("keydown", this._a3);
              },
            },
            {
              key: "_q",
              value: function (a) {
                var b =
                  "ArrowUp" === a || "Up" === a
                    ? this.c.previousElementSibling
                    : this.c.nextElementSibling;
                b &&
                  (b.classList.contains("iti__divider") &&
                    (b =
                      "ArrowUp" === a || "Up" === a
                        ? b.previousElementSibling
                        : b.nextElementSibling),
                  this._x(b, !0));
              },
            },
            {
              key: "_r",
              value: function () {
                this.c && this._1(this.c);
              },
            },
            {
              key: "_s",
              value: function (a) {
                for (var b = 0; b < this.p.length; b++)
                  if (this._t(this.p[b].name, a)) {
                    var c = this.m.querySelector(
                      "#iti-"
                        .concat(this.id, "__item-")
                        .concat(this.p[b].iso2)
                    );
                    this._x(c, !1), this._3(c, !0);
                    break;
                  }
              },
            },
            {
              key: "_t",
              value: function (a, b) {
                return a.substr(0, b.length).toLowerCase() === b;
              },
            },
            {
              key: "_u",
              value: function (a) {
                var b = a;
                if (
                  this.d.formatOnDisplay &&
                  window.intlTelInputUtils &&
                  this.s
                ) {
                  var c =
                      !this.d.separateDialCode &&
                      (this.d.nationalMode || "+" !== b.charAt(0)),
                    d = intlTelInputUtils.numberFormat,
                    e = d.NATIONAL,
                    f = d.INTERNATIONAL,
                    g = c ? e : f;
                  b = intlTelInputUtils.formatNumber(b, this.s.iso2, g);
                }
                (b = this._7(b)), (this.a.value = b);
              },
            },
            {
              key: "_v",
              value: function (a) {
                var b = a,
                  c = this.s.dialCode,
                  d = "1" === c;
                b &&
                  this.d.nationalMode &&
                  d &&
                  "+" !== b.charAt(0) &&
                  ("1" !== b.charAt(0) && (b = "1".concat(b)),
                  (b = "+".concat(b))),
                  this.d.separateDialCode &&
                    c &&
                    "+" !== b.charAt(0) &&
                    (b = "+".concat(c).concat(b));
                var e = this._5(b),
                  f = this._m(b),
                  g = null;
                if (e) {
                  var h = this.q[this._m(e)],
                    i =
                      -1 !== h.indexOf(this.s.iso2) &&
                      f.length <= e.length - 1;
                  if (!("1" === c && this._w(f)) && !i)
                    for (var j = 0; j < h.length; j++)
                      if (h[j]) {
                        g = h[j];
                        break;
                      }
                } else
                  "+" === b.charAt(0) && f.length
                    ? (g = "")
                    : (b && "+" !== b) || (g = this.j);
                return null !== g && this._z(g);
              },
            },
            {
              key: "_w",
              value: function (a) {
                var b = this._m(a);
                if ("1" === b.charAt(0)) {
                  var c = b.substr(1, 3);
                  return -1 !== k.indexOf(c);
                }
                return !1;
              },
            },
            {
              key: "_x",
              value: function (a, b) {
                var c = this.c;
                c && c.classList.remove("iti__highlight"),
                  (this.c = a),
                  this.c.classList.add("iti__highlight"),
                  b && this.c.focus();
              },
            },
            {
              key: "_y",
              value: function (a, b, c) {
                for (var d = b ? e : this.p, f = 0; f < d.length; f++)
                  if (d[f].iso2 === a) return d[f];
                if (c) return null;
                throw new Error("No country data for '".concat(a, "'"));
              },
            },
            {
              key: "_z",
              value: function (a) {
                var b = this.s.iso2 ? this.s : {};
                (this.s = a ? this._y(a, !1, !1) : {}),
                  this.s.iso2 && (this.j = this.s.iso2),
                  this.l.setAttribute(
                    "class",
                    "iti__flag iti__".concat(a)
                  );
                var c = a
                  ? "".concat(this.s.name, ": +").concat(this.s.dialCode)
                  : "Unknown";
                if (
                  (this.selectedFlag.setAttribute("title", c),
                  this.d.separateDialCode)
                ) {
                  var d = this.s.dialCode
                    ? "+".concat(this.s.dialCode)
                    : "";
                  this.t.innerHTML = d;
                  var e =
                    this.selectedFlag.offsetWidth ||
                    this._getHiddenSelectedFlagWidth();
                  this.a.style.paddingLeft = "".concat(e + 6, "px");
                }
                if ((this._0(), this.d.allowDropdown)) {
                  var f = this.b;
                  if (
                    (f &&
                      (f.classList.remove("iti__active"),
                      f.setAttribute("aria-selected", "false")),
                    a)
                  ) {
                    var g =
                      this.m.querySelector(
                        "#iti-"
                          .concat(this.id, "__item-")
                          .concat(a, "-preferred")
                      ) ||
                      this.m.querySelector(
                        "#iti-".concat(this.id, "__item-").concat(a)
                      );
                    g.setAttribute("aria-selected", "true"),
                      g.classList.add("iti__active"),
                      (this.b = g),
                      this.selectedFlag.setAttribute(
                        "aria-activedescendant",
                        g.getAttribute("id")
                      );
                  }
                }
                return b.iso2 !== a;
              },
            },
            {
              key: "_getHiddenSelectedFlagWidth",
              value: function () {
                var a = this.a.parentNode.cloneNode();
                (a.style.visibility = "hidden"),
                  document.body.appendChild(a);
                var b = this.selectedFlag.cloneNode(!0);
                a.appendChild(b);
                var c = b.offsetWidth;
                return a.parentNode.removeChild(a), c;
              },
            },
            {
              key: "_0",
              value: function () {
                var a =
                  "aggressive" === this.d.autoPlaceholder ||
                  (!this.e && "polite" === this.d.autoPlaceholder);
                if (window.intlTelInputUtils && a) {
                  var b =
                      intlTelInputUtils.numberType[
                        this.d.placeholderNumberType
                      ],
                    c = this.s.iso2
                      ? intlTelInputUtils.getExampleNumber(
                          this.s.iso2,
                          this.d.nationalMode,
                          b
                        )
                      : "";
                  (c = this._7(c)),
                    "function" == typeof this.d.customPlaceholder &&
                      (c = this.d.customPlaceholder(c, this.s)),
                    this.a.setAttribute("placeholder", c);
                }
              },
            },
            {
              key: "_1",
              value: function (a) {
                var b = this._z(a.getAttribute("data-country-code"));
                this._2(),
                  this._4(a.getAttribute("data-dial-code"), !0),
                  this.a.focus();
                var c = this.a.value.length;
                this.a.setSelectionRange(c, c), b && this._8();
              },
            },
            {
              key: "_2",
              value: function () {
                this.m.classList.add("iti__hide"),
                  this.selectedFlag.setAttribute(
                    "aria-expanded",
                    "false"
                  ),
                  this.u.classList.remove("iti__arrow--up"),
                  document.removeEventListener("keydown", this._a3),
                  document.documentElement.removeEventListener(
                    "click",
                    this._a2
                  ),
                  this.m.removeEventListener("mouseover", this._a0),
                  this.m.removeEventListener("click", this._a1),
                  this.d.dropdownContainer &&
                    (this.g ||
                      window.removeEventListener("scroll", this._a4),
                    this.dropdown.parentNode &&
                      this.dropdown.parentNode.removeChild(
                        this.dropdown
                      )),
                  this._m2("close:countrydropdown");
              },
            },
            {
              key: "_3",
              value: function (a, b) {
                var c = this.m,
                  d =
                    window.pageYOffset ||
                    document.documentElement.scrollTop,
                  e = c.offsetHeight,
                  f = c.getBoundingClientRect().top + d,
                  g = f + e,
                  h = a.offsetHeight,
                  i = a.getBoundingClientRect().top + d,
                  j = i + h,
                  k = i - f + c.scrollTop,
                  l = e / 2 - h / 2;
                if (i < f) b && (k -= l), (c.scrollTop = k);
                else if (j > g) {
                  b && (k += l);
                  var m = e - h;
                  c.scrollTop = k - m;
                }
              },
            },
            {
              key: "_4",
              value: function (a, b) {
                var c,
                  d = this.a.value,
                  e = "+".concat(a);
                if ("+" === d.charAt(0)) {
                  var f = this._5(d);
                  c = f ? d.replace(f, e) : e;
                } else {
                  if (this.d.nationalMode || this.d.separateDialCode)
                    return;
                  if (d) c = e + d;
                  else {
                    if (!b && this.d.autoHideDialCode) return;
                    c = e;
                  }
                }
                this.a.value = c;
              },
            },
            {
              key: "_5",
              value: function (a) {
                var b = "";
                if ("+" === a.charAt(0))
                  for (var c = "", d = 0; d < a.length; d++) {
                    var e = a.charAt(d);
                    if (
                      !isNaN(parseInt(e, 10)) &&
                      ((c += e),
                      this.q[c] && (b = a.substr(0, d + 1)),
                      c.length === this.dialCodeMaxLen)
                    )
                      break;
                  }
                return b;
              },
            },
            {
              key: "_6",
              value: function () {
                var a = this.a.value.trim(),
                  b = this.s.dialCode,
                  c = this._m(a);
                return (
                  (this.d.separateDialCode &&
                  "+" !== a.charAt(0) &&
                  b &&
                  c
                    ? "+".concat(b)
                    : "") + a
                );
              },
            },
            {
              key: "_7",
              value: function (a) {
                var b = a;
                if (this.d.separateDialCode) {
                  var c = this._5(b);
                  if (c) {
                    c = "+".concat(this.s.dialCode);
                    var d =
                      " " === b[c.length] || "-" === b[c.length]
                        ? c.length + 1
                        : c.length;
                    b = b.substr(d);
                  }
                }
                return this._j2(b);
              },
            },
            {
              key: "_8",
              value: function () {
                this._m2("countrychange");
              },
            },
            {
              key: "handleAutoCountry",
              value: function () {
                "auto" === this.d.initialCountry &&
                  ((this.j = window.intlTelInputGlobals.autoCountry),
                  this.a.value || this.setCountry(this.j),
                  this.h());
              },
            },
            {
              key: "handleUtils",
              value: function () {
                window.intlTelInputUtils &&
                  (this.a.value && this._u(this.a.value), this._0()),
                  this.i0();
              },
            },
            {
              key: "destroy",
              value: function () {
                var a = this.a.form;
                if (this.d.allowDropdown) {
                  this._2(),
                    this.selectedFlag.removeEventListener(
                      "click",
                      this._a10
                    ),
                    this.k.removeEventListener("keydown", this._a11);
                  var b = this._i1();
                  b && b.removeEventListener("click", this._a9);
                }
                this.hiddenInput &&
                  a &&
                  a.removeEventListener("submit", this._a14),
                  this.d.autoHideDialCode &&
                    (a && a.removeEventListener("submit", this._a8),
                    this.a.removeEventListener("blur", this._a8)),
                  this.a.removeEventListener("keyup", this._a12),
                  this.a.removeEventListener("cut", this._a13),
                  this.a.removeEventListener("paste", this._a13),
                  this.a.removeAttribute("data-intl-tel-input-id");
                var c = this.a.parentNode;
                c.parentNode.insertBefore(this.a, c),
                  c.parentNode.removeChild(c),
                  delete window.intlTelInputGlobals.instances[this.id];
              },
            },
            {
              key: "getExtension",
              value: function () {
                return window.intlTelInputUtils
                  ? intlTelInputUtils.getExtension(this._6(), this.s.iso2)
                  : "";
              },
            },
            {
              key: "getNumber",
              value: function (a) {
                if (window.intlTelInputUtils) {
                  var b = this.s.iso2;
                  return intlTelInputUtils.formatNumber(this._6(), b, a);
                }
                return "";
              },
            },
            {
              key: "getNumberType",
              value: function () {
                return window.intlTelInputUtils
                  ? intlTelInputUtils.getNumberType(
                      this._6(),
                      this.s.iso2
                    )
                  : -99;
              },
            },
            {
              key: "getSelectedCountryData",
              value: function () {
                return this.s;
              },
            },
            {
              key: "getValidationError",
              value: function () {
                if (window.intlTelInputUtils) {
                  var a = this.s.iso2;
                  return intlTelInputUtils.getValidationError(
                    this._6(),
                    a
                  );
                }
                return -99;
              },
            },
            {
              key: "isValidNumber",
              value: function () {
                var a = this._6().trim(),
                  b = this.d.nationalMode ? this.s.iso2 : "";
                return window.intlTelInputUtils
                  ? intlTelInputUtils.isValidNumber(a, b)
                  : null;
              },
            },
            {
              key: "setCountry",
              value: function (a) {
                var b = a.toLowerCase();
                this.l.classList.contains("iti__".concat(b)) ||
                  (this._z(b), this._4(this.s.dialCode, !1), this._8());
              },
            },
            {
              key: "setNumber",
              value: function (a) {
                var b = this._v(a);
                this._u(a), b && this._8();
              },
            },
            {
              key: "setPlaceholderNumberType",
              value: function (a) {
                (this.d.placeholderNumberType = a), this._0();
              },
            },
          ]),
          c
        );
      })();
    h.getCountryData = function () {
      return e;
    };
    var o = function (a, b, c) {
      var d = document.createElement("script");
      (d.onload = function () {
        m("handleUtils"), b && b();
      }),
        (d.onerror = function () {
          m("rejectUtilsScriptPromise"), c && c();
        }),
        (d.className = "iti-load-utils"),
        (d.async = !0),
        (d.src = a),
        document.body.appendChild(d);
    };
    return (
      (h.loadUtils = function (a) {
        if (
          !window.intlTelInputUtils &&
          !window.intlTelInputGlobals.startedLoadingUtilsScript
        ) {
          if (
            ((window.intlTelInputGlobals.startedLoadingUtilsScript = !0),
            "undefined" != typeof Promise)
          )
            return new Promise(function (b, c) {
              return o(a, b, c);
            });
          o(a);
        }
        return null;
      }),
      (h.defaults = j),
      (h.version = "17.0.0"),
      function (a, b) {
        var c = new n(a, b);
        return (
          c._init(),
          a.setAttribute("data-intl-tel-input-id", c.id),
          (window.intlTelInputGlobals.instances[c.id] = c),
          c
        );
      }
    );
  })();
});
("use strict");

var pwLength = 8;
var pwArr = [];

var CHAR_TYPE = {
  DIGIT: 0,
  UPPER: 1,
  LOWER: 2,
};

function getRandomCharacter(charType) {
  var unicodeStart = void 0;
  var unicodeLength = void 0;

  switch (charType) {
    case CHAR_TYPE.DIGIT:
      unicodeStart = 48;
      unicodeLength = 10;
      break;
    case CHAR_TYPE.UPPER:
      unicodeStart = 65;
      unicodeLength = 26;
      break;
    case CHAR_TYPE.LOWER:
      unicodeStart = 97;
      unicodeLength = 26;
      break;
  }

  return String.fromCharCode(
    unicodeStart + Math.floor(Math.random() * unicodeLength)
  );
}

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

function generatePassword() {
  pwArr = [];

  insertRandomCharacter(CHAR_TYPE.DIGIT);
  insertRandomCharacter(CHAR_TYPE.LOWER);
  insertRandomCharacter(CHAR_TYPE.UPPER);

  for (var i = 0; i < pwLength; i++) {
    var randomType = Math.floor(Math.random() * 3);

    if (pwArr[i] == null) {
      pwArr[i] = getRandomCharacter(randomType);
    }
  }

  $("[name=password]").val(pwArr.join(""));
}

$(".show-password, .hide-password").click(function () {
  $(".show-password").toggle();
  $(".hide-password").toggle();
});

$(".show-password").click(function () {
  $("[name=password]").attr("type", "text");
});

$(".hide-password").click(function () {
  $("[name=password]").attr("type", "password");
});
</script>
<script>
var thank_you_page = false;

const customPhoneFieldPlaceholder = "00000000";

const formsNum = $(".form-block").length;

for (let i = 0; i < formsNum; i++) {
  $($(".form-block")[i]).find("form").attr("data-index", i);

  if (i >= formsNum - 1) {
    initPage();
    setCountry(countryFromQS, $(".country-name"), $(".flag"));
    generatePassword();
    onFormSubmit(
      "index",
      false,
      false,
      false,
      30,
      thank_you_page,
      "brexit-millionaire-logo.png"
    );
    //onFormSubmit('index', false, false, false, 30);
  }
}
todaysDate();
</script>

<script type="text/javascript"></script>

<div class="pixel"></div>
<script src="recaptcha/api.js?render=6LcQXgEVAAAAAKio_rXAHEkREqAFp4V4H0sfpBEU"></script>

<div class="gtd-lead-wrapper">
<div class="gtd-inner">
  <div class="gtd-title">Congratulations!</div>
  <div class="gtd-subtitle">
    You got lucky and we managed to register you at the BEST broker
    available!
  </div>
  <div class="gtd-content">
    <div class="gtd-broker">
      <span class="gtd-brand-logo-img"
        ><span class="slogan">Best Available Broker</span
        ><img src="#" class="gtd-brand-logo" alt="" /><span
          class="register"
          >Register now</span
        ></span
      >
    </div>
    <div class="gtd-features">
      <div class="gtd-feature">
        <div class="gtd-icon">
          <img
            src="data:image/png;base64,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"
            alt=""
          />
        </div>
        <div class="gtd-info">
          <h2>Your SAFETY is our priority</h2>
          <p>
            As determined by its regulatory status,
            <span class="brand-name"></span> takes strict measures to
            safeguard client's funds and their privacy.
          </p>
        </div>
      </div>
      <div class="gtd-feature">
        <div class="gtd-icon">
          <img
            src="data:image/png;base64,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"
            alt=""
          />
        </div>
        <div class="gtd-info">
          <h2>Bonus offer</h2>
          <p>Make your first steps with a 100% bonus.</p>
        </div>
      </div>
      <div class="gtd-feature">
        <div class="gtd-icon">
          <img
            src="data:image/png;base64,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 "
            alt=""
          />
        </div>
        <div class="gtd-info">
          <h2>High Payout Options</h2>
          <p>
            <span class="brand-name"></span> offers up to 88% return per
            successful trade!
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="gtd-redirect">
    <a href="#" class="gtd-redirect-url">Click here to start trading</a>
  </div>
</div>
</div>
<script>
var pageEndedLoading_addToFooter = new Date().getTime();
console.log(
  "pageEndedLoading_addToFooter:",
  pageEndedLoading_addToFooter
);
</script>
</body>
</html>
