<?php
	class Store {
		private $dbcon=null;
		private $selftable;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."store";
			$this->dbcon=$dbcon;
    }

	
	// Get a store info
	public function getAStoreInfo($storeno){
			$prefix = constant('PREFIX');
			$storeTable = $prefix."store";

			$sql = "SELECT *
							FROM $storeTable
							WHERE storeno=?";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $storeno);
			$stmt->execute();

			$result = $stmt->get_result();

			$stmt->close();

			return $result;

	}

    public function get_store_info($storeno)
    {
      $sql = "SELECT *,
              (SELECT storetypetitle FROM aa_storetype as st WHERE  st.storetypeno = s.storetypeno) as storetypetitle,
              (SELECT statustitle  FROM aa_storestatus as ss WHERE ss.statusno=s.statusno) as storestatustitle
              FROM `aa_store` as s WHERE storeno=?";

      $stmt = $this->dbcon->prepare($sql);
  		$stmt->bind_param("i",$storeno);
  		$stmt->execute();
      $result = $stmt->get_result();

			return $result;
    }

		// Insert a store product
		public function insert_a_store_product($productno, $rate, $storeno, $storeProductImageName){
			$prefix = constant('PREFIX');
			$storeProductTable = $prefix."storeproduct";

			$sql = "INSERT INTO $storeProductTable(productno, rate, storeno, imageurl) VALUES (?, ?, ?, ?)";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("idis", $productno, $rate, $storeno, $storeProductImageName);

			$stmt->execute();
	    	$result = $stmt->affected_rows;
			$stmt->close();
			if($result>0){
				return true;
			}
			else {
				return false;
			}
		}

		// Check if a userid exists in the database
		public function checkUseridExists($userid){
				$prefix = constant('PREFIX');
				$userTable = $prefix."user";

				$sql = "SELECT *
									FROM $userTable
									WHERE userid=?";

				//echo $sql."\n";
				$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param("s", $userid);

				$stmt->execute();

				$result = $stmt->get_result();

				$stmt->close();

				return $result;
		}

		// Insert a store user
		public function insert_a_store_user($userno, $roleid, $storeno){
			$prefix = constant('PREFIX');
			$storeUserTable = $prefix."storeuser";

			$sql = "INSERT INTO $storeUserTable(storeno, userno, roleid) VALUES (?, ?, ?)";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("iii", $storeno, $userno, $roleid);

			$stmt->execute();
	    	$result = $stmt->affected_rows;
			$stmt->close();
			if($result>0){
				return true;
			}
			else {
				return false;
			}
		}

		// Update a store
		public function updateAStoreInfo($storeno, $storename, $storecontact, $street, $city, $openingTime, $closingTime, $weekend1, $weekend2, $statusNo, $homeDeliveryRate, $postDelivary){
				$prefix = constant('PREFIX');
				$storeTable = $prefix."store";

				$params = array();
				$types = "";
				$dataset = "";
				$count = 0;
				$updatecount = 0;

				if($storename != NULL){
						$updatecount++;
						$params[] = &$storename;
						if($count==0){
							$count++;
							$dataset .= "name=?";
						}
						else {
							$dataset .= ",name=?";
						}
						$types .= 's';
				}

				if($storecontact != NULL){
						$updatecount++;
						$params[] = &$storecontact;
						if($count==0){
							$count++;
							$dataset .= "contactno=?";
						}
						else {
							$dataset .= ",contactno=?";
						}
						$types .= 's';
				}

				if($street != NULL){
						$updatecount++;
						$params[] = &$street;
						if($count==0){
							$count++;
							$dataset .= "street=?";
						}else{
							$dataset .= ",street=?";
						}
						$types .= 's';
				}

				if($city != NULL){
						$updatecount++;
						$params[] = &$city;
						if($count==0){
							$count++;
							$dataset .= "city=?";
						}
						else {
							$dataset .= ",city=?";
						}
						$types .= 's';
				}

				if($openingTime != NULL){
						$updatecount++;
						$params[] = &$openingTime;
						if($count==0){
							$count++;
							$dataset .= "opening=?";
						}else{
							$dataset .= ",opening=?";
						}
						$types .= 's';
				}

				if($closingTime != NULL){
						$updatecount++;
						$params[] = &$closingTime;
						if($count==0){
							$count++;
							$dataset .= "closing=?";
						}
						else {
							$dataset .= ",closing=?";
						}
						$types .= 's';
				}
				if($weekend1 != NULL){
						$updatecount++;
						$params[] = &$weekend1;
						if($count==0){
							$count++;
							$dataset .= "weekend1=?";
						}else{
							$dataset .= ",weekend1=?";
						}
						$types .= 's';
				}

				if($weekend2 != NULL){
						$updatecount++;
						$params[] = &$weekend2;
						if($count==0){
							$count++;
							$dataset .= "weekend2=?";
						}
						else {
							$dataset .= ",weekend2=?";
						}
						$types .= 's';
				}

				if($statusNo > 0){
						$updatecount++;
						$params[] = &$statusNo;
						if($count==0){
							$count++;
							$dataset .= "statusno=?";
						}
						else {
							$dataset .= ",statusno=?";
						}
						$types .= 'i';
				}

				if($homeDeliveryRate != NULL){
						$updatecount++;
						$params[] = &$homeDeliveryRate;
						if($count==0){
							$count++;
							$dataset .= "homedelivaryrate=?";
						}else{
							$dataset .= ",homedelivaryrate=?";
						}
						$types .= 'd';
				}

				if($postDelivary > 0){
						$updatecount++;
						$params[] = &$postDelivary;
						if($count==0){
							$count++;
							$dataset .= "postdelivary=?";
						}else{
							$dataset .= ",postdelivary=?";
						}
						$types .= 'i';
				}

				if($updatecount > 0){
						$sql = "UPDATE $storeTable SET $dataset WHERE storeno=?";
						//echo $sql;
						$params[] = &$storeno;
						$types .= 'i';

						if( !$stmt = $this->dbcon->prepare($sql) )
								throw new Exception("Prepare statement failed: ".$this->dbcon->error);

						call_user_func_array(array($stmt, "bind_param"), array_merge(array($types), $params));

						$stmt->execute();

						$res = $stmt->affected_rows;

						$stmt->close();

						if($res > 0){
							return "true";
						}else {
							return "false";
						}
				}
				else {
						return "N";
				}
		}

		// Get all users of a store
		public function getAllUsersOfAStore($storeno){
				$prefix = constant('PREFIX');
				$storeUserTable = $prefix."storeuser";
				$userTable = $prefix."user";
				$roleTable = $prefix."role";

				$sql = "SELECT su.userno,
									(SELECT u.ufirstname FROM $userTable AS u WHERE u.userno=su.userno) AS firstname,
									(SELECT u.ulastname FROM $userTable AS u WHERE u.userno=su.userno) AS lastname,
									(SELECT u.contactno FROM $userTable AS u WHERE u.userno=su.userno) AS contactno, su.roleid,
									(SELECT r.rolename FROM $roleTable AS r WHERE r.roleid=su.roleid) AS rolename
								FROM $storeUserTable AS su WHERE su.storeno=?";

				$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param("i", $storeno);
				$stmt->execute();

				$result = $stmt->get_result();

				$stmt->close();

				return $result;

		}

		// Get All stores of a users
		public function get_all_stores_of_a_user($userno){
			$sql = "SELECT s.storeno,s.name,s.street,s.city,s.storeimage,su.roleid FROM
								(SELECT `storeno`,`name`,`street`,`city`,`storeimage` FROM `aa_store`) as s
								INNER JOIN
								(SELECT * FROM aa_storeuser WHERE userno=?) as su
								ON s.storeno=su.storeno";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $userno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			return $result;
		}

		// delete a store user
	public function delete_a_store_user($storeno, $userno){
		$prefix = constant('PREFIX');
		$storeUserTable = $prefix."storeuser";

		$sql = "DELETE FROM $storeUserTable
								WHERE storeno=? AND userno=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii", $storeno, $userno);

		$stmt->execute();
		$result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function updateRoleOfAStoreUser($storeno, $userno, $roleid){
			$prefix=constant('PREFIX');
		$storeUserTable = $prefix."storeuser";

			$sql = "UPDATE $storeUserTable SET roleid=? WHERE storeno=? AND userno=?";
			$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("iii", $roleid, $storeno, $userno);

		if($stmt->execute()){
					$result = $stmt->affected_rows;
			}
			else {
					$result = 0;
			}
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function getProductsOfAStoreOfACategory($storeno, $catno){
		$prefix = constant('PREFIX');
		$productTable = $prefix."product";
		$storeProductTable = $prefix."storeproduct";
		$storePageDisplayProductTable = $prefix."storepagedisplayproduct";
		$storePageDisplayTable = $prefix."storepagedisplay";

		$sql ="SELECT spd.storeno, spd.categoryno, spd.storepagedisplayno, spdt.productno, spd.displayorderno, p.productname
				FROM $storePageDisplayTable as spd 
				INNER JOIN 
				$storePageDisplayProductTable as spdt
				ON spd.storepagedisplayno = spdt.storepagedisplayno
				INNER JOIN $storeProductTable as sp
				ON sp.productno = spdt.productno
				INNER JOIN $productTable as p
				ON p.productno = sp.productno
				WHERE spd.storeno=? AND spd.categoryno=?";

		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii",$storeno, $catno);
		$stmt->execute();

		$result = $stmt->get_result();

		$stmt->close();

		return $result;
	}

	public function getStoreProductsNotInDispaly($storeno, $storepagedisplayno){
		$sql = "SELECT *, (SELECT productname from aa_product WHERE productno=st.productno ) as productname
				FROM `aa_storeproduct` as st WHERE `storeno`=? AND `availability`=1
				AND `productno` not in 
				(SELECT `productno` 
				FROM `aa_storepagedisplayproduct`
				WHERE `storepagedisplayno`=?)
				";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii", $storeno, $storepagedisplayno);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		return $result;
	}

	public function insertStoreProductsToDispaly($storepagedisplayno, $productno){
		$sql = "INSERT INTO `aa_storepagedisplayproduct` (`storepagedisplayno`, `productno`) VALUES (?, ?)";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii", $storepagedisplayno, $productno);
		$stmt->execute();
		$result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function getStoreDisplayNo($storeno, $catno){
		$sql = "SELECT storepagedisplayno FROM `aa_storepagedisplay` WHERE `storeno`=? and `categoryno`=? ";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii", $storeno, $catno);
		$stmt->execute();

		$result = $stmt->get_result();
		$stmt->close();
		return $result;
	}

	public function deleteAStoreProductFromDispaly($storedisplayno, $productno){
		$sql = "DELETE FROM `aa_storepagedisplayproduct` WHERE `storepagedisplayno`=? AND `productno`=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("ii", $storedisplayno, $productno);
		$stmt->execute();
		$result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function updateStoreImageName($storeimagename, $storeno){
		$sql = "UPDATE `aa_store` SET `storeimage`=? WHERE `storeno`=? ";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("si", $storeimagename, $storeno);
		$stmt->execute();
		$result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function updateUserInfo($ufirstname,$ulastname,$email, $userno){
		$sql = "UPDATE `aa_user` SET `ufirstname`=?, `ulastname`=?, `email`=? WHERE `userno`=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("sssi", $ufirstname,$ulastname,$email, $userno);
		$stmt->execute();
		$result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function getUserUpdateInfo($userno){
		$sql = "SELECT * FROM `aa_user` WHERE `userno`=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("i", $userno);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		return $result;
	}
	
	public function insert_store_product_discount($storeno,$productno,$drate)
	{
	    $sql="INSERT INTO `aa_storediscount`(`productno`, `storeno`, `discountedrate`) VALUES (?,?,?)";
	    $stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("iid", $productno,$storeno,$drate);
		$stmt->execute();
	    $result = $stmt->affected_rows;
		$stmt->close();
		if($result>0){
			return true;
		}
		else {
			return false;
		}
	}
}
?>
