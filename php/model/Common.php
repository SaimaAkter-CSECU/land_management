<?php
	class Common {
		private $dbcon=null;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->dbcon=$dbcon;
    }

    public function getLastLevelCategories(){
        $prefix = constant('PREFIX');
        $categoryTable = $prefix."category";

        $sql = "SELECT * FROM $categoryTable WHERE catno NOT IN(SELECT parentcatno FROM $categoryTable WHERE parentcatno != 'NULL') AND parentcatno !='NULL'";

        //echo $sql."\n";
        $stmt = $this->dbcon->prepare($sql);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        return $result;
    }

		// Get role
		public function getRole(){
				$prefix = constant('PREFIX');
				$roleTable = $prefix."role";

				$sql = "SELECT * FROM $roleTable";

				$stmt = $this->dbcon->prepare($sql);

				$stmt->execute();

				$result = $stmt->get_result();

				$stmt->close();

				return $result;
		}
  }
?>
