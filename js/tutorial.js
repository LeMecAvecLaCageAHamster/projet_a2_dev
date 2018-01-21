var tutorialDialogue = [
    'Bonjour jeune betterave, tu es ici dans le fabuleux monde du JavaScript !',
    'Tu ne dois pas savoir pourquoi tu es ici je suppose ?',
    'C\'est très simple, tu es l\'élu de la prophétie !',
    'Celui qui ramènera l\'ordre dans notre royaume !'
];


var speaker = function(){
	for (var i = 0; i < tutorialDialogue.length; i++) {
		alert(tutorialDialogue[i]);
	}
};

setTimeout(
	function(){
		speaker()
	}, 1000
);