$('.go_to_seq_1').click(function(){
	mySequence1.goTo(1);
	window.scrollTo(0, 0);

	$('.setup-tab').removeClass('active');
	$('.setup-tab').removeClass('done');
	$('#setup-tab-1').addClass('active');
	$('#setup-tab-2').removeClass('done');
	$('#setup-tab-3').removeClass('done');
	$('#setup-tab-4').removeClass('done');
});	
$('.go_to_seq_2').click(function(){
	mySequence1.goTo(2);
	window.scrollTo(0, 0);

	$('.setup-tab').removeClass('active');
	$('.setup-tab').removeClass('done');
	$('#setup-tab-1').addClass('done');
	$('#setup-tab-2').addClass('active');
	$('#setup-tab-3').removeClass('done');
	$('#setup-tab-4').removeClass('done');
});	
$('.go_to_seq_3').click(function(){
	mySequence1.goTo(3);
	window.scrollTo(0, 0);

	$('.setup-tab').removeClass('active');
	$('.setup-tab').removeClass('done');
	$('#setup-tab-1').addClass('done');
	$('#setup-tab-2').addClass('done');
	$('#setup-tab-3').addClass('active');
	$('#setup-tab-4').removeClass('done');
});	
$('.go_to_seq_4').click(function(){
	mySequence1.goTo(4);
	window.scrollTo(0, 0);

	$('.setup-tab').removeClass('active');
	$('.setup-tab').removeClass('done');
	$('#setup-tab-1').addClass('done');
	$('#setup-tab-2').addClass('done');
	$('#setup-tab-3').addClass('done');
	$('#setup-tab-4').addClass('active');
});

$('#coa-tab-1 button').click(function(){
	coaSequence.goTo(1);
	$('.coa-tab').removeClass('active');
	$('#coa-tab-1').addClass('active');
	window.scrollTo(0, 0);
});
$('#coa-tab-2 button').click(function(){
	coaSequence.goTo(2);
	$('.coa-tab').removeClass('active');
	$('#coa-tab-2').addClass('active');
	window.scrollTo(0, 0);
});
$('#coa-tab-3 button').click(function(){
	coaSequence.goTo(3);
	$('.coa-tab').removeClass('active');
	$('#coa-tab-3').addClass('active');
	window.scrollTo(0, 0);
});
$('#coa-tab-4 button').click(function(){
	coaSequence.goTo(4);
	$('.coa-tab').removeClass('active');
	$('#coa-tab-4').addClass('active');
	window.scrollTo(0, 0);
});
$('#coa-tab-5 button').click(function(){
	coaSequence.goTo(5);
	$('.coa-tab').removeClass('active');
	$('#coa-tab-5').addClass('active');
	window.scrollTo(0, 0);
});
// $('#coa-tab-6 button').click(function(){
// 	coaSequence.goTo(6);
// 	$('.coa-tab').removeClass('active');
// 	$('#coa-tab-6').addClass('active');
// 	window.scrollTo(0, 0);
// });

$('#go_to_users').click(function(){
	mySequence1.goTo(2);
	$('.setup-tab').removeClass('active');
	$('#setup-tab-2').addClass('active');
	window.scrollTo(0, 0);
});