function closePopup() {
    $("#popup").css("display", "none");
    $("body").css("overflow", "initial");
}

function initCountDown() {
    var $target = $("#cdown");
    var count = $target.text();
    var countdown;
    // var initialCount = count;
    count = count ? count : 45;

    countdown = setInterval(function () {
        $target.html(count);
        count--;
        if (count == 2) {
            clearInterval(countdown);
        }
    }, 13332); //4min
}

function scrollTopForm() {
    $("html, body").animate(
        {
            scrollTop: $("#topform").offset().top,
        },
        500
    );
}

function scrollMiddleForm() {
    $("html, body").animate(
        {
            scrollTop: $("#middleform").offset().top,
        },
        500
    );
}

function liveUkTime() {
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {
        var d = new Date();
        var t = d.toLocaleTimeString("en-GB", { timeZone: "Europe/London" });
        document.getElementById("uktime").innerHTML = t;
    }
}

function liveDate() {
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    var newDate = new Date();
    newDate.setDate(newDate.getDate());
    $("#ukdate").html(newDate.getDate() + " " + dayNames[newDate.getDay()]);
}

// function scrollDownLiveUpdates() {
//     var div = $(".users-wrapper");
//     setInterval(function () {
//         var pos = div.scrollTop();
//         div.scrollTop(pos + 1);
//     }, 50);
// }

//live updates scroller
function animateContent(direction) {
    var animationOffset = $(".users-wrapper").height() - $(".users-content").height() - 30;
    if (direction == "up") {
        animationOffset = 0;
    }

    // console.log("animationOffset:" + animationOffset);
    $(".users-content").animate({ marginTop: animationOffset + "px" }, 40000);
}

function up() {
    animateContent("up");
}
function down() {
    animateContent("down");
}

function start() {
    setTimeout(function () {
        down();
    }, 2000);
    setTimeout(function () {
        up();
    }, 2000);
    setTimeout(function () {
        // console.log("wait...");
    }, 5000);
}
//end scroller

//map pins
function show_hide_pins() {
    var markers = $(".markers .marker");
    var numberMakers = markers.length;

    var randomNumber = Math.floor(Math.random() * numberMakers) + 1;
    $("#marker" + randomNumber).hide();

    var randomNumber = Math.floor(Math.random() * numberMakers) + 1;
    $("#marker" + randomNumber)
        .show()
        .addClass("user-online");

    setTimeout(function () {
        $("#marker" + randomNumber).removeClass("user-online");
    }, 6000);
}

function displayFirstPins(numberPins) {
    var markers = $(".markers .marker");
    var numberMakers = markers.length;

    for (i = 0; i < numberPins; i++) {
        var randomNumber = Math.floor(Math.random() * numberMakers) + 1;
        $("#marker" + randomNumber).show();
        // $("#marker" + randomNumber).css("box-shadow", "10px 10px 5px #888");

        // setTimeout(function () {
        //     $("#marker" + randomNumber).css("box-shadow", "10px 10px 5px #888");
        // }, 2000);
    }
}
//end map pins

function changeTimezone(date, ianatz) {

    // suppose the date is 12:00 UTC
    var invdate = new Date(date.toLocaleString('en-US', {
      timeZone: ianatz
    }));
  
    // then invdate will be 07:00 in Toronto
    // and the diff is 5 hours
    var diff = date.getTime() - invdate.getTime();
  
    // so 12:00 in Toronto is 17:00 UTC
    return new Date(date.getTime() - diff); // needs to substract
}

(function ($) {
    $.fn.countTo = function (options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});
        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;
        return $(this).each(function () {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);
            function updateTimer() {
                value = parseFloat(value) + increment;
                value += increment;
                loopCount++;
                value = "" + value;
                valueParts = value.split(".");
                var left = valueParts[0];
                var right = valueParts[1];
                var leftlength = left.length;
                let val = "";
                if (leftlength == 6) {
                    val = left.slice(0, 3) + "," + left.slice(3, 6) + "." + right.substring(0, 2);
                }
                if (leftlength == 7) {
                    val = left.slice(0, 1) + "," + left.slice(1, 4) + "," + left.slice(4, 7) + "." + right.substring(0, 2);
                }
                // $(_this).html(parseFloat(val).toFixed(options.decimals));
                $(_this).html(val);
                if (typeof options.onUpdate == "function") {
                    options.onUpdate.call(_this, value);
                }
                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;
                    if (typeof options.onComplete == "function") {
                        options.onComplete.call(_this, value);
                    }
                } else {
                    clearInterval(interval);
                    interval = setInterval(updateTimer, Math.floor((Math.random() * 10) + 1) * 1000);
                }
            }
        });
    };
    $.fn.countTo.defaults = {
        from: 0, // the number the element should start at
        to: 100, // the number the element should end at
        speed: 1000, // how long it should take to count between the target numbers
        refreshInterval: 100, // how often the element should be updated
        decimals: 0, // the number of decimal places to show
        onUpdate: null, // callback method for every time the element is updated,
        onComplete: null, // callback method for when the element finishes updating
    };
})(jQuery);
jQuery(function ($) {
    // Setup a custom hour to test the script
    // var day = new Date("July 21, 1983 22:00:00");

    var day = new Date();
    var day_uk = changeTimezone(day, 'Europe/London'); 
    var currentSecondFromDay = day_uk.getSeconds() + (60 * (day_uk.getMinutes() + (60 * day_uk.getHours())));

    if( currentSecondFromDay < 3600 ) {
        var startNumber = 234367;
    } else {
        var startNumber = 69.8 * currentSecondFromDay;
    }

    $("#total-earnings").countTo({
        from: startNumber,
        to: 6267541,
        speed: 8.64e7, //24h
        refreshInterval: 1000,
        decimals: 2,
        onComplete: function (value) {
            // console.debug(this);
        },
    });
});

$(document).ready(function () {
    var e = 0;
    if (
        (document.addEventListener(
            "mouseleave",
            function (a) {
                a.clientY < 0 && $(window).width() > 268 && e < 2 && $("#popup").length && !$("#popup").hasClass("open") && ($("body").css("overflow", "hidden"), $("#popup").css("display", "flex"), e++);
            },
            !1
        ),
        $("#exit-popup .close").click(function () {
            $("#popup").hide(), $("body").css("overflow", "auto");
        }),
        $(window).scroll(function () {
            0 != $(window).scrollTop() ? $("header").addClass("show") : $("header").removeClass("show");
        }),
        $("html").is(":lang(ar)"))
    )
        var a = [{}];

    //testimonials hovers functions
    $(".testimonial-text").hover(function () {
        $(".testimonial-text").removeClass("active");
        $(this).addClass("active");
    });
    $(".members-wrapper").mouseleave(function () {
        $(".testimonial-text").removeClass("active");
    });

    //live updates scroller
    if ($(".users-content").height() > $(".users-wrapper").height()) {
        setInterval(function () {
            start();
        }, 3000);
    }

    // scrollDownLiveUpdates();
    displayFirstPins(22);
    setInterval(function () {
        show_hide_pins();
    }, 3000);

    initCountDown();
    liveUkTime();
    liveDate();
});
