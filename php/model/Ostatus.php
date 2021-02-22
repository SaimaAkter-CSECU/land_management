<?php
	class Ostatus {
		private $dbcon=null;
		private $selftable;
		private $prefix;


    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."_ostatus";
			$this->dbcon=$dbcon;
    }

    public function get_all()
    {
      $sql="SELECT * FROM `aa_ostatus`";

      $stmt = $this->dbcon->prepare($sql);
  		$stmt->execute();
      $result = $stmt->get_result();

			return $result;
    }
  }
?>
