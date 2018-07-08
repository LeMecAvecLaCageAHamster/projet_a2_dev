<?php

namespace App\View;

use App\Model\Modal;

class LevelView{

	public static function getView(){
		include 'html/level.html';
		LevelView::getModalConfirm();
	}

	private static function getModalConfirm(){
		$modal = new Modal(
			"levelconfirm-modal", 
			"modal", 
			"", 
			"Go to the x World ?", 
			"LET'S GO !",
			"index.php?page=game"
		);

		echo $modal->getModal();
		echo $modal->showModal('levelconfirm-modal', 0);
	}

}