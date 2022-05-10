<?php
	include_once '../config.php';
	include_once '../model/reponse.php';

	class reponseC {
		function afficherreponse(){
			$sql="SELECT * FROM reponse";
			$db = config::getConnexion();
			try{
				$listec = $db->query($sql);
				return $listec;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerreponse($id){
			$sql="DELETE FROM reponse WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterreponse(reponse $reponse){
			$sql="INSERT INTO reponse(id,date,texte,id_question) 
			VALUES (:id,:date,:text,:id_question)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $reponse->getid(),
                    'date' => $reponse->getdate(),
					'text' => $reponse->gettext(),
					'id_question' => $reponse->getid_question()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		
		function recupererreponse($id){
			$sql="SELECT * from reponse where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reponse=$query->fetch();
				return $reponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreponse(reponse $reponse, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE reponse SET texte=:text where id=$id"
				);
				$query->execute([
				
					'text' =>$reponse->gettext(),
				]);
				echo $query->rowCount() ;
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function triquestion($tri1,$tri2){
            $sql="SELECT * FROM question ORDER BY $tri1 $tri2 ";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
		function sortByDate() {
			$sql="SELECT * FROM question inner join reponse on(id_question = id_utilisateur)  inner join texte on (id_question=id_utilisateur) order by date";
			$db = config::getConnection();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function recherche($search_value)
        {
            $sql="SELECT * FROM question where texte like '$search_value' ";
        
            //global $db;
            $db =Config::getConnexion();
        
            try{
                $result=$db->query($sql);
        
                return $result;
        
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

	}
?>