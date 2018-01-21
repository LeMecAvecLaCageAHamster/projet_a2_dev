$(document).ready(function() {
	$('#game').append($('canvas'));
});
$('#execute').click(function(){
	try{
		var exec = eval($('#code-area').val());
		$('#code-area').val("");
	}catch(e){
		alert("Ton code n'est pas bon : " + e);	
	}
});