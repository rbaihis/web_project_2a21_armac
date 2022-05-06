<?php
	include_once '../../config.php';
	include_once '../model/categorie.php';

	class categorieC {
		function afficherCategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$listec = $db->query($sql);
				return $listec;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerCategorie($idCategorie){
			$sql="DELETE FROM categorie WHERE idCategorie=:idCategorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idCategorie', $idCategorie);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterCategorie($categorie){
			$sql="INSERT INTO categorie(nomCategorie) 
			VALUES (:nomCategorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nomCategorie' => $categorie->getnomcategorie(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		
		function recuperercategorie($idCategorie){
			$sql="SELECT * from categorie where idCategorie=$idCategorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierCategorie($categorie, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE categorie SET nomCategorie=:nomCategorie where idCategorie=$id"
				);
				$query->execute([
				
					'nomCategorie' =>$categorie->getnomcategorie(),
				]);
				echo $query->rowCount() ;
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>