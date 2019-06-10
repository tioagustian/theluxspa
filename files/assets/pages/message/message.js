  'use strict';
$(document).ready(function() {
	var $window = $(window);
	var windowHeight = $(window).innerHeight();
	if ($window.width() >= 1400) {
		var a = $(window).height() - 445;
    $(".chat-scroll").slimScroll({
        height: a,
		color:'rgba(0,0,0,0.5)',
		setTop: "1px",
		size: '3px',
		wheelStep: 10,
        allowPageScroll: false,
    });  
	var a = $(window).height() - 365;
    $(".usr-chat-scroll").slimScroll({
        height: a,
				color:'rgba(0,0,0,0.5)',
		setTop: "1px",
		size: '3px',
		wheelStep: 10,

        allowPageScroll: false,
    }); 
	} else {
    $(".chat-scroll").slimScroll({
        height: '435px',
		color:'rgba(0,0,0,0.5)',
		setTop: "1px",
		size: '3px',
		wheelStep: 10,
        allowPageScroll: false,
    });  
    $(".usr-chat-scroll").slimScroll({
        height: '500px',
				color:'rgba(0,0,0,0.5)',
		setTop: "1px",
		size: '3px',
		wheelStep: 10,

        allowPageScroll: false,
    }); 
	}
	$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});
});