<?php
	class categorie{
		private $idCategorie;
		private $nomCategorie;
		
		function __construct($nomCategorie){
			$this->nomCategorie=$nomCategorie;
		}


		function getnomcategorie(){
			return $this->nomCategorie;
		}
  
		
		function setidcategorie(int $idCategorie){
			$this->idCategorie=$idCategorie;
		}
		function setnomcategorie(string $nomCategorie){
			$this->nomCategorie=$nomCategorie;
		}
		
		
	}


?>
