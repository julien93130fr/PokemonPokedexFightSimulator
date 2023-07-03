<?php

    use Src\Api;
    use Src\Utility;

    // Inclusion de l'autoloader pour charger les classes automatiquement
    include_once './vendor/autoload.php';

    // Instanciation de la classe Utility
    $utility = new Utility();

    // Vérification de l'arrivée des données du formulaire
    if(isset($_POST['pokemon'])){
        // Récupération des Pokémon sélectionnés dans le formulaire
        $pokemons = $_POST['pokemon'];
    }else{
        // Redirection vers la page d'index si les données n'ont pas été reçues
        header('Location:index.php');
    }

    // Dissociation des IDs des combattants qui sont arrivés tous les deux dans un tableau
    $combatant1 = $pokemons[0];
    $combatant2 = $pokemons[1];

    // Instanciation de la classe Api
    $api = new Api();

    // Appel de la méthode qui va récupérer les informations de chaque Pokémon dans l'API
    $combatant1 = $api->getPokemonById($combatant1);
    $combatant2 = $api->getPokemonById($combatant2);

    // Appel de la méthode "attaque()" du premier combattant en passant le deuxième combattant en paramètre
    $combatant1->attaque($combatant2);
    // Appel de la méthode "attaque()" du deuxième combattant en passant le premier combattant en paramètre
    $combatant2->attaque($combatant1);


