$(document).ready(function() {
	$('#game').append($('canvas'));
});

var codeAreaElement = '.CodeMirror';

$('#execute').click(function(){
	$("#coding-result").attr('class', '');
	$("#coding-result").html("");

	if($(codeAreaElement).text().length > 0){
		try{
			var exec = eval($(codeAreaElement).text());
			// $(codeAreaElement).val("");

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

function reload(){
	this.location.reload();
}