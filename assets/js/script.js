var ChangeCSS = {
    changeMe: function () {
        $('.footer').css('color', 'red');
    }
};

var PageNavigation = {
    json: function () {
        window.location = "/json";
    },
    mysql: function () {
        window.location = "/mysql";
    }
};

$( document ).ready(function() {
    $('body').on('click', '#myButton', function () {
        ChangeCSS.changeMe();
    });
    $('body').on('click', '#jsonPage', function () {
        PageNavigation.json();
    });
    $('body').on('click', '#mysqlPage', function () {
        PageNavigation.mysql();
    });


    $('body').on('click', '#actionButton', function () {
        if ($(this).attr('name') != '') {
            var action = "?action="+ $(this).attr('name');
            var pathname = window.location.pathname+action;
            $.taconiteGet(pathname);
        }
    });
});