<?php

namespace App\View;

use App\Model\Modal;

class GameView{

    public static function getView(){
        include('html/game.html');
        GameView::getModalTutorial();
    }

	private static function getModalTutorial(){
		$modal = new Modal(
			"tutorial-modal",   // id
			"modal",            // classes
			"Niveau 1",         // modal title
            "
            Bonjour jeune betterave, tu es ici dans le fabuleux monde du JavaScript !
            <br>
            <br>
            Le but est de te familiariser avec la syntaxe de ce langage
            en traversant ce niveau.
            <br>
            <br>
            Sers toi des flèches directionelles du clavier pour te déplacer.
            <br>
            <br>
            Exécute du code dans la console pour résoudre les énigmes, surtout n'hésite pas à faire des recherches sur le JS pour ça.
            <br>
            <br>
            A toi de jouer ;)
            ", 
			"Commencer"     // button text
		);

		echo $modal->getModal();
		echo $modal->showModal('tutorial-modal', 1000);
	}

}