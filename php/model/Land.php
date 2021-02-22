<?php
  class Land
  {
    private $dbcon=null;
		private $selftable;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."land_info";
			$this->dbcon=$dbcon;
    }

    public function getUserAllInfo($userno){
      $sql = "SELECT *, 
                (SELECT role_name FROM `role` WHERE `role_id` = u.`user_role_id`) as role_name
              FROM `user` as u 
              WHERE u.`user_id`=?";

      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("i", $userno);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result; 
    }

    public function getAllDivision(){
      $sql = "SELECT * FROM `division`"; 

      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }
    public function getAllDistrict(){
      $sql = "SELECT * FROM `district`"; 

      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getAllThana(){
      $sql = "SELECT * FROM `thana`"; 

      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getAllUserRole(){
      $sql = "SELECT * FROM `role`"; 
      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getAllGender(){
      $sql = "SELECT * FROM `gender`"; 
      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getAllReligion(){
      $sql = "SELECT * FROM `religion`"; 
      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }
    
    public function getAllTransactionType(){
      $sql = "SELECT * FROM `transaction_type`"; 
      $stmt = $this->dbcon->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getlandInfo($div, $dist, $thana, $sheet, $mouza, $daag){
        $sql = "SELECT *, 
                  (SELECT division_name FROM `division` WHERE `division_id`=?) as division_name,
                  (SELECT district_name FROM `district` WHERE `district_id`=?) as district_name,
                  (SELECT thana_name FROM `thana` WHERE `thana_id`=?) as thana_name 
                  FROM `land_info` as li 
                  INNER JOIN `mouza_map` as mm 
                  ON mm.`mouza_map_id` = li.`mouza_map_id`
                  WHERE li.`division_id`=? AND li.`district_id` = ? AND li.`thana_id`=? AND li.`sheet_no`=? AND li.`mouza_no`=? AND li.`daag_no`=?";
      
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("iiiiiisss", $div, $dist, $thana, $div, $dist, $thana, $sheet, $mouza, $daag);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getLandOwnerInfo($land_id){
      $sql = "SELECT *,
                  (SELECT division_name FROM `division` WHERE `division_id`= oi.`owner_present_address_division_id`) as present_division_name,
                  (SELECT district_name FROM `district` WHERE `district_id`= oi.`owner_present_address_district_id`) as present_district_name,
                  (SELECT thana_name FROM `thana` WHERE `thana_id`= oi.`owner_present_address_thana_id`) as present_thana_name,
                  (SELECT division_name FROM `division` WHERE `division_id`= oi.`owner_permanent_address_division_id`) as permanent_division_name,
                  (SELECT district_name FROM `district` WHERE `district_id`= oi.`owner_permanent_address_district_id`) as permanent_district_name,
                  (SELECT thana_name FROM `thana` WHERE `thana_id`= oi.`owner_permanent_address_thana_id`) as permanent_thana_name
              FROM `land_owner_info` as lo 
              INNER JOIN `owner_info` as oi 
              ON oi.`owner_id` = lo.`owner_id`
              INNER JOIn `gender` as g 
              ON g.`gender_id` = oi.`owner_gender_id`
              INNER JOIn `religion` as r 
              ON r.`religion_id` = oi.`owner_religion_id`
              WHERE lo.`land_id`=?"; 
      
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("i", $land_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    } 

    public function getLandTransactionInfo($land_id){
      $sql = "SELECT *, 
                (SELECT owner_name FROM `owner_info` as os WHERE `owner_national_id_no` = lt.`seller_national_id`) as seller_name, 
                (SELECT owner_name FROM `owner_info` as ob WHERE `owner_national_id_no` = lt.`buyer_national_id`) as buyer_name, 
                (SELECT khatiyan_no FROM `khatiyan` as kno WHERE `khatiyan_id` = lt.`khatiyan_id`) as khatiyan_no, 
                (SELECT khatiyan_document FROM `khatiyan` as kdoc WHERE `khatiyan_id` = lt.`khatiyan_id`) as khatiyan_document, 
                (SELECT mutation_no FROM `mutation` as mno WHERE `mutation_id` = lt.`mutation_id`) as mutation_no, 
                (SELECT mutation_document FROM `mutation` as mdoc WHERE `mutation_id` = lt.`mutation_id`) as mutation_document, 
                (SELECT land_deed_document FROM `land_deed` as ld WHERE `land_deed_id` = lt.`land_deed_id`) as land_deed_document 
              FROM `land_transaction_info` as lt 
              WHERE lt.`land_id`=? ORDER BY lt.`transaction_datetime` DESC"; 
      
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("i", $land_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getOwnerInfo($nid){
      $sql = "SELECT *, 
                (SELECT division_name FROM `division` WHERE `division_id`= oi.`owner_present_address_division_id`) as present_division_name,
                (SELECT district_name FROM `district` WHERE `district_id`= oi.`owner_present_address_district_id`) as present_district_name,
                (SELECT thana_name FROM `thana` WHERE `thana_id`= oi.`owner_present_address_thana_id`) as present_thana_name,
                (SELECT division_name FROM `division` WHERE `division_id`= oi.`owner_permanent_address_division_id`) as permanent_division_name,
                (SELECT district_name FROM `district` WHERE `district_id`= oi.`owner_permanent_address_district_id`) as permanent_district_name,
                (SELECT thana_name FROM `thana` WHERE `thana_id`= oi.`owner_permanent_address_thana_id`) as permanent_thana_name,
                (SELECT gender_name FROM `gender` WHERE `gender_id`= oi.`owner_gender_id`) as gender_name,
                (SELECT religion_name FROM `religion` WHERE `religion_id`= oi.`owner_religion_id`) as religion_name, 
                (SELECT owner_status FROM `owner_status` WHERE `owner_status_id`= oi.`owner_status_id`) as owner_status_name 
                FROM `owner_info` as oi 
                WHERE oi.`owner_national_id_no`=?";
    
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("s", $nid);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function getOwnerLandInfo($owner_id){
      $sql = "SELECT *,
                  (SELECT land_deed_document FROM `land_deed` WHERE `land_deed_id` = loi.`land_deed_id`) as land_deed_document,
                  (SELECT division_name from `division` WHERE `division_id` = lo.`division_id`) as division_name,
                  (SELECT district_name from `district` WHERE `district_id` = lo.`district_id`) as district_name,
                  (SELECT thana_name from `thana` WHERE `thana_id` = lo.`thana_id`) as thana_name
              FROM `land_owner_info` as loi
              INNER JOIN `land_info` as lo 
              ON lo.`land_id` = loi.`land_id`
              WHERE loi.`owner_id`=?";

      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("i", $owner_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result; 
    }

    public function getOwnerTransactionInfo($nid){
      $sql = "SELECT *, 
                (SELECT owner_name FROM `owner_info` as os WHERE `owner_national_id_no` = lt.`seller_national_id`) as seller_name, 
                (SELECT owner_name FROM `owner_info` as ob WHERE `owner_national_id_no` = lt.`buyer_national_id`) as buyer_name, 
                (SELECT khatiyan_no FROM `khatiyan` as kno WHERE `khatiyan_id` = lt.`khatiyan_id`) as khatiyan_no, 
                (SELECT khatiyan_document FROM `khatiyan` as kdoc WHERE `khatiyan_id` = lt.`khatiyan_id`) as khatiyan_document, 
                (SELECT mutation_no FROM `mutation` as mno WHERE `mutation_id` = lt.`mutation_id`) as mutation_no, 
                (SELECT mutation_document FROM `mutation` as mdoc WHERE `mutation_id` = lt.`mutation_id`) as mutation_document, 
                (SELECT land_deed_document FROM `land_deed` as ld WHERE `land_deed_id` = lt.`land_deed_id`) as land_deed_document 
              FROM `land_transaction_info` as lt 
              WHERE lt.`seller_national_id`=? OR lt.`buyer_national_id`=? ORDER BY lt.`transaction_datetime` DESC"; 
      
      $stmt = $this->dbcon->prepare($sql);
      $stmt->bind_param("ss", $nid, $nid);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      return $result;   
    }

    public function insertALandInfo($div, $dist, $thana, $sheet, $mouza, $daag, $total_land_area, $land_type)
    {
      $sql = "INSERT INTO land_info(division_id,district_id,thana_id,sheet_no, mouza_no, daag_no, land_area_total, land_type) VALUES (?,?,?,?,?,?,?,?)";
        
      $stmt = $this->dbcon->prepare($sql);
  		$stmt->bind_param("iiisssss",$div, $dist, $thana, $sheet, $mouza, $daag, $total_land_area, $land_type);
  		$stmt->execute();
      $result = $stmt->affected_rows;
  		$stmt->close();
  		if($result>0)
  		{
        $sql = "SELECT LAST_INSERT_ID();";
        $insert_id_result=$this->dbcon->query($sql);
        if($insert_id_result->num_rows>0){
          $row = $insert_id_result->fetch_array(MYSQLI_ASSOC);
          return $row['LAST_INSERT_ID()'];
        }
  		}
  		else {
  			return false;
  		}
    }
    
    public function insertALandOwnerInfo($owner_name, $owner_father_name, $owner_mother_name, $owner_spouse_name, $owner_birthdate, $owner_gender, $owner_religion, $owner_nid, $owner_contactno, $owner_email, $owner_present_division, $owner_present_district, $owner_present_thana, $owner_present_address, $owner_permanent_division, $owner_permanent_district, $owner_permanent_thana, $owner_permanent_address)
    {
      $sql = "INSERT INTO owner_info (owner_name, owner_father_name, owner_mother_name, owner_spouse_name, owner_birthdate, owner_gender_id, owner_religion_id, owner_status_id, owner_national_id_no, owner_mobile_no, owner_email, owner_present_address_division_id, owner_present_address_district_id, owner_present_address_thana_id, owner_present_address, owner_permanent_address_division_id, owner_permanent_address_district_id, owner_permanent_address_thana_id, owner_permanent_address, owner_national_id) VALUES (?,?,?,?,?,?,?,1,?,?,?,?,?,?,?,?,?,?,?,'01521222087.pdf' )";
        
      $stmt = $this->dbcon->prepare($sql);
  		$stmt->bind_param("sssssiisssiiisiiis",$owner_name, $owner_father_name, $owner_mother_name, $owner_spouse_name, $owner_birthdate, $owner_gender, $owner_religion, $owner_nid, $owner_contactno, $owner_email, $owner_present_division, $owner_present_district, $owner_present_thana, $owner_present_address, $owner_permanent_division, $owner_permanent_district, $owner_permanent_thana, $owner_permanent_address);
  		$stmt->execute();
      $result = $stmt->affected_rows;
  		$stmt->close();
  		if($result>0)
  		{
        $sql = "SELECT LAST_INSERT_ID();";
        $insert_id_result=$this->dbcon->query($sql);
        if($insert_id_result->num_rows>0){
          $row = $insert_id_result->fetch_array(MYSQLI_ASSOC);
          return $row['LAST_INSERT_ID()'];
        }
  		}
  		else {
  			return false;
  		}
	  }

    

    
  }
?>
