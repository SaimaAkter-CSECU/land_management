<?php
	class Slider{
		private $dbcon=null;
		private $selftable;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."storeimages";
			$this->dbcon=$dbcon;
    }

		// Main Slider Images
    public function geTotalImagesOfAStore($storeno)
    {
      $sql = "SELECT COUNT(*) AS totalimages FROM `aa_storeimages` WHERE storeno=?";
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param('i', $storeno);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;
    }

		public function getSliderImagesOfaStore($storeno){
			$sql = "SELECT * FROM `aa_storeimages` WHERE storeno=?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('i', $storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			return $result;
		}

		public function insertStoreSliderImages($storeno, $storeimg)
    {
      $sql = "INSERT INTO `aa_storeimages`(storeno, `storeimages`) VALUES (?, ?)";
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param('is', $storeno, $storeimg);
      $stmt->execute();
      $result = $stmt->affected_rows;
      if($result>0){
        return true;
      }else{
        return false;
      }
    }

		public function deleteAnImageFromMainSlider($storeno, $slno){
			$sql = "DELETE FROM `aa_storeimages` WHERE `storeno`=? AND `slno`=?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('ii', $storeno, $slno);
			$stmt->execute();
			$result = $stmt->affected_rows;
			if($result>0){
				return true;
			}else{
				return false;
			}
		}

		// Display Type images
		public function geTotalImagesOfACategory($storepagedisplayno){
			$sql = "SELECT COUNT(*) AS totalimages FROM `aa_storepagedisplayimages` WHERE `storepagedisplayno`=? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('i', $storepagedisplayno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			return $result;
		}

		public function getDisplayCategoryImages($storeno, $catno){
			$sql = "SELECT * 
					FROM `aa_storepagedisplay` as spd
					INNER JOIN `aa_storepagedisplayimages` as spdi 
					ON spd.storepagedisplayno = spdi.storepagedisplayno
					WHERE spd.storeno=? AND spd.categoryno = ?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('ii', $storeno, $catno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			return $result;
		}

		public function insertCategorySliderImages($storepagedisplayno, $storeimg){
			$sql = "INSERT INTO `aa_storepagedisplayimages` (`storepagedisplayno`, `imageurl`)
						VALUES (?, ?)";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('is', $storepagedisplayno, $storeimg);
			$stmt->execute();
			$result = $stmt->affected_rows;
			if($result>0){
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteAnImageFromTypeSlider($storeno, $typeno, $slno){
			$sql = "DELETE FROM `aa_storepagedisplayimages` WHERE `storeno`=? AND `typeno`=? AND `slno`=?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('iii', $storeno, $typeno, $slno);
			$stmt->execute();
			$result = $stmt->affected_rows;
			if($result>0){
				return true;
			}else{
				return false;
			}
		}
  }
?>
