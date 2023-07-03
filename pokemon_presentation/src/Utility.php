<?php

namespace Src;

class Utility{

    // Fonction pour nettoyer un mot en enlevant les accents
    public function mrPropre($word){
        $search = ['É']; // Liste des caractères accentués à rechercher
        $replace = ['E']; // Liste des caractères de remplacement

        return str_replace($search, $replace, $word); // Remplacement des caractères accentués dans le mot
    }

}