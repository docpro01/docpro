$('.go_to_seq_1').click(function(){
	mySequence1.goTo(1);
	window.scrollTo(0, 0);
	currentStepId = 1;
	eval();
});	
$('.go_to_seq_2').click(function(){
	mySequence1.goTo(2);
	window.scrollTo(0, 0);
	currentStepId = 2;
	eval();
});	
$('.go_to_seq_3').click(function(){
	mySequence1.goTo(3);
	window.scrollTo(0, 0);
	currentStepId = 3;
	eval();
});	
$('.go_to_seq_4').click(function(){
	mySequence1.goTo(4);
	window.scrollTo(0, 0);
	currentStepId = 4;
	eval();
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
$('#tax-tab-1 button').click(function(){
	taxSequence.goTo(1);
	$('.tax-tab').removeClass('active');
	$('#tax-tab-1').addClass('active');
	window.scrollTo(0, 0);
});
$('#tax-tab-2 button').click(function(){
	taxSequence.goTo(2);
	$('.tax-tab').removeClass('active');
	$('#tax-tab-2').addClass('active');
	window.scrollTo(0, 0);
});

$('#go_to_users').click(function(){
	mySequence1.goTo(2);
	$('.setup-tab').removeClass('active');
	$('#setup-tab-2').addClass('active');
	window.scrollTo(0, 0);
});