<?PHP
	class question
    {
		private  $id_utilisateur = null;
		private  $date = null;
		private  $text= null;
		private  $id_question = null;	
		function __construct($id_utilisateur,$date,$text,$id_question)
        {
			$this->id_utilisateur=$id_utilisateur;
			$this->date=$date;
			$this->text=$text;
			$this->id_question=$id_question;
			
		}
		function getid_utilisateur(){
			return $this->id_utilisateur;
		}
		function getdate(){
			return $this->date;
		}
		function gettext(){
			return $this->text;
		}
		function getid_question(){
			return $this->id_question;
		}
		function setid_utilisateur(int $id_utilisateur): void
        {
			$this->id_utilisateur=$id_utilisateur;
		}
		function setdate(date $date): void
        {
			$this->date=$date;
		}
		function settext(string $text): void
        {
			$this->text=$text;
		}
		function setid_question(int $id_question): void
        {
			$this->id_question=$id_question;
		}
		
		
    }
?>