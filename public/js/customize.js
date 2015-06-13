//For Navigation Dropdown
$(function () {

    function setNavigation() {

        var path = window.location.pathname;

        path = path.replace(/\/$/, "");
        path = decodeURIComponent(path);
        var splitUrl = path.split("/");
        if (splitUrl.length < 2)
            return;
        var currentMenuItem = splitUrl[1];

        $(".navbar-nav a").each(function () {

            var menuItemData = $(this).attr('data-action');
            if (menuItemData.trim() == currentMenuItem.trim()) {
                if (!$(this).hasClass('actove')) {
                    $(this).addClass('active');
                }
            }
            else {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            }
        });

        if (currentMenuItem == "tools") {
            $(".left-menu li a").each(function () {
                var itemUrl = $(this).attr("href");
                if (itemUrl == path) {
                    $(this).closest("li").addClass("active");
                }

            });
        }
    }

    setNavigation();
    $("li").has(".sub-menu").hover(
        function () {
            $(this).find(".sub-menu").slideDown();
        },
        function () {
            $(this).find(".sub-menu").slideUp("fast");
        }
    );
    $(".sub-menu li").has(".sub-menu-2").hover(
        function () {
            $(this).find(".sub-menu-2").slideDown();
        },
        function () {
            $(this).find(".sub-menu-2").slideUp("fast");
        }
    );
    $(".sub-menu-2 li").has(".sub-menu-3").hover(
        function () {
            $(this).find(".sub-menu-3").slideDown();
        },
        function () {
            $(this).find(".sub-menu-3").slideUp("fast");
        }
    );
});


//For Navigation Dropdown Responsive - Works on window resize
$(window).resize(function () {
    if ($(window).width() <= 750) {
        $("ul.sub-menu-3").removeClass('sub-menu-3').addClass("subMneu3");
        $("ul.sub-menu-2").removeClass('sub-menu-2').addClass("subMneu2");
        $("ul.sub-menu").removeClass('sub-menu').addClass("subMneu1");
    }
    else {
        $("ul.subMneu3").removeClass('subMneu3').addClass("sub-menu-3");
        $("ul.subMneu2").removeClass('subMneu2').addClass("sub-menu-2");
        $("ul.subMneu1").removeClass('subMneu1').addClass("sub-menu");
    }
});

//For Navigation Dropdown Responsive - Works on fix window
$(function () {
    if ($(window).width() <= 750) {
        $("ul.sub-menu-3").removeClass('sub-menu-3').addClass("subMneu3");
        $("ul.sub-menu-2").removeClass('sub-menu-2').addClass("subMneu2");
        $("ul.sub-menu").removeClass('sub-menu').addClass("subMneu1");
    }
    else {
        $("ul.subMneu3").removeClass('subMneu3').addClass("sub-menu-3");
        $("ul.subMneu2").removeClass('subMneu2').addClass("sub-menu-2");
        $("ul.subMneu1").removeClass('subMneu1').addClass("sub-menu");
    }
});


function parseJsonFromString(jsonString,errorElement) {
    var data;
    try {
        data = JSON.parse(jsonString);
    }
    catch (e) {
        if(errorElement != false)
            errorElement.show();
        return false;
    }
    return data;
}

function select_all(obj) {
    var text_val=eval(obj);
    text_val.focus();
    text_val.select();
    if (!document.all) return; // IE only
    r = text_val.createTextRange();
    r.execCommand('copy');
}
