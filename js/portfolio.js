$(function(){
	$('.element').hide();

	$('#dLabel1').click(function(){
		if ($('.retail').is(':visible')){
			$('.retail').hide();
		} else {
			$('.retail').show();
			$('.office').hide();
			$('.consulting').hide();

		}
	});

	$('#dLabel2').click(function(){
		if ($('.office').is(':visible')){
			$('.office').hide();
		} else {
			$('.office').show();
			$('.retail').hide();
			$('.consulting').hide();
		}
	});

	$('#dLabel3').click(function(){
		if ($('.consulting').is(':visible')){
			$('.consulting').hide();
		} else {
			$('.consulting').show();
			$('.office').hide();
			$('.retail').hide();
		}
	});
});