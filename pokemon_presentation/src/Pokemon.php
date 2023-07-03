<?php

namespace Src;
 
// Cette classe abstraite "Pokemon" du namespace "Src" est la classe parente pour toutes les classes de Pokémon.
abstract class Pokemon{

    //initialisation des variables protégées
    protected string $name; // Nom du Pokémon
    protected int $pv; //valeur de point de vie
    protected int $pa; //valeur max de point d'attaque
    protected int $pd; //valeur max de point de point de défense
    protected int $niveau; // Niveau du Pokémon
    protected string $image; // URL de l'image du Pokémon

    // Constructeur de la classe
    public function __construct($name, $pv, $pa, $pd, $niveau, $image)
    {
        // Définition des variables lors de l'initialisation
        $this->name = $name; // Nom du Pokémon
        $this->pv = $pv; // Point de vie du Pokémon
        $this->pa = $pa; // Point d'attaque du Pokémon
        $this->pd = $pd; // Point de défense du Pokémon
        $this->niveau = $niveau; // Niveau ou génération du Pokémon
        $this->image = $image; // Image du Pokémon

        // Appel de la méthode "presentation()" pour afficher la présentation du Pokémon
        $this->presentation();
    }

    // Début des getters et setters
    public function getName():string 
    {
        return $this->name;
    }
    
    public function getPv():string 
    {
        return $this->pv;
    }
    public function setPv(int $pv){
        $this->pv = $pv;
    }
    
    public function getPa():string 
    {
        return $this->pa;
    }
    public function setPa(int $pa){
        $this->pa = $pa;
    }
    
    public function getPd():string 
    {
        return $this->pd;
    }
    public function setPd(int $pd){
        $this->pd = $pd;
    }

    public function getNiveau():string 
    {
        return $this->niveau;
    }
    public function setNiveau(int $niveau){
        $this->niveau = $niveau;
    }
    // Fin des getters et setters
    
    // Méthode pour effectuer une attaque sur un Pokémon adversaire
    public function attaque(Pokemon $adversaire):void
    {
        $nbPa = rand(1, $this->pa);
        $adversaire->setPv($adversaire->getPv() - $nbPa);
        
        echo $this->name . ' a attaquer ' . $adversaire->getName() . ', il lui a infliger ' . $nbPa . ' point(s) de degat.<br />' . $adversaire->getName() . ' a maintenant ' . $adversaire->getPv() . ' point(s) de vie.<br />';

        if($adversaire->getPV() <= 0){
            $adversaire->mort();
        }
    }

    // Méthode pour soigner le Pokémon actuel
    public function soigner():void
    {
        $nbPa = rand(1, $this->pa);
        $this->setPv($this->getPv() + $nbPa);

        echo $this->name . ' s\'est soigner et a repris ' . $nbPa . ' point(s) de vie.<br />';
    }

    // Méthode privée pour gérer la mort du Pokémon
    private function mort(){
        echo $this->name . ' est mort';
    }

    public function presentation(){
        // Affichage d'un tableau HTML pour présenter les informations du Pokémon
        echo '<table class="table">';
        // Nom du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Nom du Pokemon :';
        echo '</td>';
        echo '<td>';
        echo $this->name;
        echo '</td>';
        echo '</tr>';
        // Type du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Type :';
        echo '</td>';
        echo '<td>';
        echo explode('\\', get_class($this))[2];
        echo '</td>';
        echo '</tr>';
        // Point de vie du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Point de vie :';
        echo '</td>';
        echo '<td>';
        echo $this->pv;
        echo '</td>';
        echo '</tr>';
         // Point d'attaque du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Point de d\'attaque :';
        echo '</td>';
        echo '<td>';
        echo $this->pa;
        echo '</td>';
        echo '</tr>';
        // Point de défense du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Point de défense :';
        echo '</td>';
        echo '<td>';
        echo $this->pd;
        echo '</td>';
        echo '</tr>';
        // Génération du Pokemon
        echo '<tr>';
        echo '<td>';
        echo 'Generation :';
        echo '</td>';
        echo '<td>';
        echo $this->niveau;
        echo '</td>';
        echo '</tr>';
        // Image du Pokemon
        echo '<tr>';
        echo '<td colspan="2">';
        echo '<img src="'.$this->image.'" />';
        echo '</td>';
        echo '</tr>';

        echo '</table>';// Fin du tableau HTML
    }

    

}