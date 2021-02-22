<?php
  class Display
  {
    private $dbcon=null;
		private $selftable;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."storepagedisplay";
			$this->dbcon=$dbcon;
    }

    public function getStoreDisplayCategory($storeno){
      $prefix = constant('PREFIX');
      $storePageDisplayCategoryTable = $prefix."category";
      $storePageDisplayTable = $prefix."storepagedisplay";

      $sql = "SELECT spd.categoryno, 
              (SELECT sc.cattitle FROM $storePageDisplayCategoryTable as sc WHERE spd.categoryno = sc.catno) as cattitle,
              spd.displayorderno
              FROM $storePageDisplayTable as spd 
              WHERE spd.storeno =? ORDER BY spd.displayorderno";

      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("i", $storeno);

      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();

      return $result;
  }

    public function getStoreDisplayType(){
        $prefix = constant('PREFIX');
        $storeDisplayTypeTable = $prefix."storedisplaytype";

        $sql = "SELECT * FROM $storeDisplayTypeTable";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getStoreDisplayCategoryNotInStore($storeno){
        $sql = "SELECT * FROM `aa_category` WHERE `parentcatno` IS NOT NULL  
                AND `catno` NOT in 
                  (SELECT `categoryno` from `aa_storepagedisplay` WHERE `storeno`=?) 
                AND catno NOT IN
                  (SELECT parentcatno FROM `aa_category` WHERE `parentcatno` IS NOT NULL)";

        $stmt = $this->dbcon->prepare($sql);
        $stmt->bind_param("i", $storeno);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function insertStoreDisplayCategoryToStore($storeno,$catno,$displayorderno){
      $sql = "INSERT INTO `aa_storepagedisplay`(`storeno`, `categoryno`, `displayorderno`) VALUES (?,?,?)";
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("iii",$storeno,$catno,$displayorderno);
      $stmt->execute();
      $result = $stmt->affected_rows;
      $stmt->close();
      if($result>0){
        return true;
      }else{
        return false;
      }
    }

    public function deleteStoreDisplayCategory($storeno, $catno){
      $sql = "DELETE FROM `aa_storepagedisplay` WHERE `storeno`=? AND `categoryno`=?";
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("ii",$storeno,$catno);
      $stmt->execute();
      $result = $stmt->affected_rows;
      $stmt->close();
      if($result>0){
        return true;
      }else{
        return false;
      }
    }
  }
?>
