<?php

namespace Src;

class Api{
    // Cette classe "Api" du namespace "Src" est responsable de récupérer les informations d'un Pokémon à partir de son identifiant.

    public function getPokemonById($id){
        // On crée une instance de la classe "Utility" pour les opérations utilitaires.
        $utility = new Utility();

        // Appel de l'API pour récupérer les informations du Pokémon par son identifiant.
        $obj = file_get_contents('https://pokebuildapi.fr/api/v1/pokemon/'.$id);
        //on transforme en JSON la string (la chaîne de caractères ) recuperer dans l'API
        $obj = json_decode($obj);
        // On utilise la méthode "mrPropre" de la classe "Utility" pour enlever les éventuels accents dans le nom du Pokémon.
        $type = $utility->mrPropre($obj->apiTypes[0]->name);

        //on instncie une classe avec un nom dynamique basé sur le type du Pokémon.
        $className = "Src\\Pokemons\\$type";
        // On retourne une nouvelle instance de la classe correspondante au type du Pokémon, en passant les informations nécessaires au constructeur.
        return new $className(
            $obj->name,
            $obj->stats->HP,
            $obj->stats->attack,
            $obj->stats->defense,
            $obj->apiGeneration,
            $obj->image
        );
    }

}