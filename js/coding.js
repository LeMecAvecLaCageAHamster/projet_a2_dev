$(document).ready(function() {
	$('#game').append($('canvas'));
});

var codeArea = document.getElementById("code-area");
var editor = CodeMirror.fromTextArea(codeArea, {
	lineNumbers: true,
	gutter: true,
	lineWrapping: true
});

$('#execute').click(function(){
	$("#coding-result").attr('class', '');
	$("#coding-result").html("");

	if(editor.getValue().length > 0){
		try{
			var exec = eval(editor.getValue());

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