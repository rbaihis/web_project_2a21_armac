<?PHP
	class reponse
    {
		private  $id;
		private  $date;
		private  $text;
		private  $id_question;	
		function __construct($id,$date,$text,$id_question)
        {
			$this->id=$id;
			$this->date=$date;
			$this->text=$text;
			$this->id_question=$id_question;
			
		}
		
		function getid(){
			return $this->id;
		}
		function getdate() {
			return $this->date;
		}
		function gettext(){
			return $this->text;
		}
		function getid_question(){
			return $this->id_question;
		}
		function setid($id): void
        {
			$this->id=$id;
		}
		function setdate($date): void
        {
			$this->date=$date;
		}
		function settext($text): void
        {
			$this->text=$text;
		}
		function setid_question($id_question): void
        {
			$this->id_question=$id_question;
		}
		
		
    }
?>