<?php
	class Login {
		private $dbcon=null;
		private $prefix;

		public function __construct($dbcon){
				$this->prefix=constant('PREFIX');
				$this->dbcon=$dbcon;
		}

		public function get_existance_of_an_user($userid)
		{
			$sql = "SELECT * FROM `user` WHERE `user_email`=? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("s",$userid);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result;
		}

		public function update_profile_of_user($user_id, $user_name, $user_email, $user_mobile_no, $user_password, $user_institution, $user_designation, $user_role_id)
		{
			$sql = "UPDATE user SET user_name=?, user_email=?, user_mobile_no=?, user_password=?, user_institution=?, user_designation=?, user_role_id=? WHERE user_id=? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("ssssssii", $user_name, $user_email, $user_mobile_no, $user_password, $user_institution, $user_designation, $user_role_id, $user_id);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			if($result > 0){
				return true;
			}else {
				return false;
			}
		}

		public function add_new_user($user_name, $user_email, $user_mobile_no, $user_password, $user_institution, $user_designation, $user_role_id){
			$sql = "INSERT INTO user  (user_name, user_email, user_mobile_no, user_password, user_institution, user_designation, user_role_id) VALUES(?,?,?,?,?,?,?) ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("ssssssi", $user_name, $user_email, $user_mobile_no, $user_password, $user_institution, $user_designation, $user_role_id);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			if($result > 0){
				return true;
			}else {
				return false;
			}
		}

		public function deleteAnUser($user_id){
			$sql = "DELETE FROM user WHERE user_id = ? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			if($result > 0){
				return true;
			}else {
				return false;
			}
		}


		public function getAllUser()
		{
			$sql = "SELECT * 
						FROM `user` as u
						INNER JOIN `role` as r
						ON  r.`role_id` = u.`user_role_id`";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result;
		}


		public function get_store($userno)
		{
			$sql="SELECT s.storeno,s.name FROM
				(SELECT storeno FROM `aa_storeuser` WHERE userno=?) as su
				INNER JOIN
				(SELECT * FROM aa_store) as s
				ON su.storeno=s.storeno";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$userno);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result;
		}

		public function get_a_user_password_by_userno($userno)
		{
			$sql="SELECT `passphrase` FROM `aa_user` WHERE userno=? AND ucatno<=2";
			$values = array(&$userno);
			return $this->get($sql,"i",$values);
		}

		public function update_password_of_admin($userno,$new_password)
		{
			$sql="UPDATE aa_user SET passphrase = ? WHERE userno=?";
			$values = array(&$new_password,&$userno);
			return $this->affectedRows($sql,"si",$values);
		}

		private function get($sql,$types,$values)
		{
			$stmt = $this->dbcon->prepare($sql);
			call_user_func_array(array($stmt, "bind_param"), array_merge(array($types), $values));
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			return $result;
		}

		private function affectedRows($sql,$types,$values)
		{
			$stmt = $this->dbcon->prepare($sql);
			call_user_func_array(array($stmt, "bind_param"), array_merge(array($types), $values));
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			return $result;
		}

	}
 ?>
