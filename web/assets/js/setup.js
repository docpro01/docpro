var sequenceElement = document.getElementById("sequence1");

var options = {
	keyNavigation: false,
	fadeStepWhenSkipped: false,
	swipeNavigation: false,
}

var mySequence1 = sequence(sequenceElement, options);


var sequenceCOA = document.getElementById('coa-seq');

var coa_options = {
	keyNavigation: false,
	fadeStepWhenSkipped: false,
	swipeNavigation: false,
}

var coaSequence = sequence(sequenceCOA, coa_options);