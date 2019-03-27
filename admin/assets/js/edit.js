    $(document).ready(function() {

            $(function() {
                $('span.clickMe').click(function(e) {
                    $.get("edit_item.php?uid=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });
                    
                    var hiddenSection = $('section.hiddener');
                    hiddenSection.fadeIn()
                        .css({
                            'display': 'block'
                        })

                        .css({
                            width: $(window).width() + 'px',
                            height: $(window).height() + 'px'
               
                    })
                        .css({
                            top: ($(window).height() - hiddenSection.height()) / 2 + 'px',
                            left: ($(window).width() - hiddenSection.width()) / 2 + 'px'
                        })
                    
                        .css({
                            'background-color': 'rgba(0,0,0,0.5)'
                        })
                        .appendTo('wrapper');
                    
                    $('span.close').click(function() {
                        $(hiddenSection).fadeOut();
                    });
                });
            });

        });
