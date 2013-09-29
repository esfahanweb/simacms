$(document).ready(function() {
	var accordion = $("#example3").zAccordion({
		slideWidth:465,
		width: 635,
		height: 239,
		timeout: 3000,
		slideClass: "frame",
		slideOpenClass: "frame-open",
		slideClosedClass: "frame-closed",
		easing: "easeOutCirc"
	});
	$("#thumbs .thumb-0").click(function(){
		accordion.start();
		return false;
	});
	$("#thumbs .thumb-1").click(function(){
		accordion.click(0);
		return false;
	});
	$("#thumbs .thumb-2").click(function(){
		accordion.click(1);
		return false;
	});
	$("#thumbs .thumb-3").click(function(){
		accordion.click(2);
		return false;
	});
	$("#thumbs .thumb-4").click(function(){
		accordion.click(3);
		return false;
	});
	$("#thumbs .thumb-5").click(function(){
		accordion.stop();
		return false;
	});
});
	