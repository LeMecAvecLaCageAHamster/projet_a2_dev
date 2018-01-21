$(document).ready(function() {
	$('#game').append($('canvas'));
});

$('#execute').click(function(){
	$("#coding-result").attr('class', '');
	$("#coding-result").html("");

	if($('#code-area')[0].value.length > 0){
		try{
			var exec = eval($('#code-area').val());
			// $('#code-area').val("");

			if(exec){
				$("#coding-result").attr('class', 'alert alert-success');
				$("#coding-result").append(exec);
			}

		}catch(e){
			$("#coding-result").attr('class', 'alert alert-danger');
			$("#coding-result").append("Ton code n'est pas bon : " + e);
		}
	}
});