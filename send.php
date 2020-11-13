<?php

if(isset($_POST['submit-price'])) {
    $pseudo = $_POST['pseudo'];
    $commentaire = $_POST['commentaire'];
    
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
    $req->execute(array(
	    'nom' => $nom,
	    'possesseur' => $possesseur,
	    'console' => $console,
	    'prix' => $prix,
	    'nbre_joueurs_max' => $nbre_joueurs_max,
	    'commentaires' => $commentaires
	));

echo 'Le jeu a bien été ajouté !';
}

if(isset($_POST['submit-agenda'])) {

}

if(isset($_POST['submit-contact'])) {

}

?>