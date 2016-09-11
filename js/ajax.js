$( document ).ready(function() {
    $('.pagination li').each(function(){
        var anchor = this.children;
        $(anchor).click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var page = href.substr(href.lastIndexOf('/')+ 1);
            var target = $('.content-area');

            $.ajax({
                type: "POST",
                url: "/home/ajaxRequest/",
                data: "page=" + page,
                beforeSend: function(){
                    var loadGif = $('<img>');
                    loadGif.attr('src', '/images/load.gif');
                    target.html('').append(loadGif);
                },
                success: function (response) {
                    var response = $.parseJSON(response);
                    var img = $('<img>');
                    var div = $('<div></div>');
                    var innerDiv = $('<div></div>');
                    var h2 = $('<h2></h2>');
                    var a = $('<a></a>');

                    img.attr('src', response[0]['imgPath']);
                    div.attr('class', 'content-text');
                    innerDiv.text(response[0]['article']);
                    h2.attr('class', 'content-title');
                    a.attr('href', '/article/view/' + response[0]['id']);
                    a.text(response[0]['title']);
                    h2.append(a);
                    div.append(h2).append(innerDiv);
                    target.html('').append(img).append(div);
                },
                error: function (response){
                    var p = $('<p></p>');
                    p.text('You have an error! Return to ');
                    var homeLink = $('<a></a>');
                    homeLink.attr('href', '/');
                    homeLink.text('Home page');
                    p.append(homeLink);
                    target.html('').append(p);
                }
            });
        });
    });
});