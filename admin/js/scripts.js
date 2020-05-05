var divBox = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(divBox);
$('#load-screen').delay(700).fadeOut(600, function(){
    $(this).remove();
});

});