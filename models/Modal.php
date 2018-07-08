<?php

namespace App\Model;

class Modal{

	private $id;
	private $class;
	private $title;
	private $body;
	private $buttonText;
	private $link;

	function __construct($id, $class, $title, $body, $buttonText, $link='#'){
		$this->id = $id;
		$this->class = $class;
		$this->title = $title;
		$this->body = $body;
		$this->buttonText = $buttonText;
		$this->link = $link;
	}

	function getModal(){

		return "
			<div id='$this->id' class='$this->class' tabindex='-1' role='dialog'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-header'>
							<h5 class='modal-title'>$this->title</h5>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						<div class='modal-body'>
							<p>
								$this->body
							</p>
						</div>
						<div class='modal-footer'>
							<a onclick='document.location = \"$this->link\"' type='button' class='btn btn-primary' data-dismiss='modal'>$this->buttonText</a>
						</div>
					</div>
				</div>
			</div>
		";
	}

	function showModal($id, $timeout=0){
		return "
			<script>
				function modal(content=null){
					console.log(content);
					if(content) $('.modal-body p').text(content);
					setTimeout(() => $('#$id').modal(), $timeout);
				}
			</script>
		";
	}

}