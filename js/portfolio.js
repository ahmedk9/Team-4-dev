$(function(){
	$('.element').hide();

	$('.caret1').click(function(){
		if ($('.retail').is(':visible')){
			$('.retail').hide();
		} else {
			$('.retail').show();
		}
	});

	$('.caret2').click(function(){
		if ($('.office').is(':visible')){
			$('.office').hide();
		} else {
			$('.office').show();
		}
	});

	$('.caret3').click(function(){
		if ($('.consulting').is(':visible')){
			$('.consulting').hide();
		} else {
			$('.consulting').show();
		}
	});

	// $('.element').hide();
	// $('.dropdown-toggle').dropdown(){
	// 	$('.element').hide();
	// }


});


// <div class="dropdown">
//   <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
//     Dropdown <span class="caret"></span>
//   </a>


//   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
//     ...
//   </ul>
// </div>