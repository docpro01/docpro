$(document).ready(function(){
	var taxes = document.getElementById('taxes-seq');
	var options = {
					keyNavigation: false,
					fadeStepWhenSkipped: false,
					swipeNavigation: false,
					// startingStepId: $('#taxes-active').val(),
				};

	var taxes_seq = sequence(taxes, options);

	$('#setup-tab-1 button').click(function(){
	 	$('.popover').popover('hide');
	 	$('.btn-seq').removeClass('seq-selected');
	 	$(this).addClass('seq-selected');
        taxes_seq.goTo(1);
 	});
 	$('#setup-tab-2 button').click(function(){
	 	$('.popover').popover('hide');
	 	$('.btn-seq').removeClass('seq-selected');
	 	$(this).addClass('seq-selected');
        taxes_seq.goTo(2);
 	});

 	$('.next-seq-btn').click(function(){
 		$('.popover').popover('hide');
 		$('#setup-tab-1 button').removeClass('seq-selected');
 		$('#setup-tab-2 button').addClass('seq-selected');
      	taxes_seq.next();
 	});
 	$('.prev-seq-btn').click(function(){
 		$('.popover').popover('hide');
 		$('#setup-tab-2 button').removeClass('seq-selected');
 		$('#setup-tab-1 button').addClass('seq-selected');
     	taxes_seq.prev();
 	});
});