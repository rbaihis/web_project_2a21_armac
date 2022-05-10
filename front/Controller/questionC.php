<?php
	include_once 'C:\xampp\htdocs\t\config.php';
	include_once '../model/question.php';

	class question_c {
		function afficherquestion(){
			$sql="SELECT * FROM question";
			$db = config::getConnexion();
			try{
				$listec = $db->query($sql);
				return $listec;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerquestion($idquestion){
			$sql="DELETE FROM question WHERE id_question=:idquestion";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idquestion', $idquestion);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterquestion(question $question){
			$sql="INSERT INTO question(id_utilisateur,date,texte,id_question) 
			VALUES (:id_utilisateur,:date,:texte,:id_question)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_utilisateur' => $question->getid_utilisateur(),
					'date' => $question->getdate(),
					'texte' => $question->gettext(),
					'id_question' => $question->getid_question()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		
		function recupererquestion($idquestion){
			$sql="SELECT * from question where id_question=$idquestion";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$question=$query->fetch();
				return $question;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierquestion(question $question, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE question SET texte=:nomquestion where id_question=$id"
				);
				$query->execute([
				
					'nomquestion' =>$question->gettext(),
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