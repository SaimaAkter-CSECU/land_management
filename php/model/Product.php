<?php
	class Product {
		private $dbcon=null;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->dbcon=$dbcon;
    }

    public function get_filtered_store_products($pageno, $productname, $storeno, $limit){
          $prefix = constant('PREFIX');
          $productTable = $prefix."product";
          $storeProductTable = $prefix."storeproduct";
          $productCategoryTable = $prefix."productcategory";

          $params = array();
          $types = "";
          $dataset = "";

          if($productname != NULL){
              $productname = "%".$productname."%";
              $params[] = &$productname;
              $dataset .= " AND p.productname LIKE ?";
              $types .= 's';
          }

          $startlimit = ($pageno-1)*$limit;
          $params[] = &$startlimit;
          $params[] = &$limit;
          $dataset .= " LIMIT ?, ?";
          $types .= "ii";

          //echo $types;
          //var_dump($params);
          $sql = "SELECT p.productno, p.productname, pc.catno, s.imageurl, s.rate, s.availability, (SELECT discountedrate FROM aa_storediscount WHERE productno=p.productno AND storeno='$storeno') as drate
                FROM (SELECT productno, productname FROM $productTable) AS p,
                (SELECT st.productno, st.rate, st.imageurl, st.availability
				 FROM $storeProductTable AS st WHERE storeno='$storeno') AS s,
                 (SELECT * FROM $productCategoryTable) AS pc
                 WHERE p.productno=s.productno AND pc.productno=p.productno".$dataset;

          //echo $sql;

          if( !$stmt = $this->dbcon->prepare($sql) )
              throw new Exception("Prepare statement failed: ".$this->dbcon->error);

          call_user_func_array(array($stmt, "bind_param"), array_merge(array($types), $params));

          $stmt->execute();
          $results = $stmt->get_result();
          $stmt->close();

          return $results;
    }

			// get all products not in a store
			public function getAllProductsNotInAStore($storeno){
					$prefix = constant('PREFIX');
					$productTable = $prefix."product";
					$storeProductTable = $prefix."storeproduct";

					$sql = "SELECT productno, productname
										FROM $productTable
										WHERE productno NOT IN(SELECT productno FROM $storeProductTable WHERE storeno=?)";

					//echo $sql."\n";
					$stmt = $this->dbcon->prepare($sql);
					$stmt->bind_param("i", $storeno);
					$stmt->execute();
					$result = $stmt->get_result();
					$stmt->close();
					return $result;
			}
			
			// get all products
			public function getAllProducts(){
					$prefix = constant('PREFIX');
					$productTable = $prefix."product";

					$sql = "SELECT productno, productname
										FROM $productTable";

					//echo $sql."\n";
					$stmt = $this->dbcon->prepare($sql);
					$stmt->execute();
					$result = $stmt->get_result();
					$stmt->close();
					return $result;
			}

			// Update a store product
			public function update_a_store_product($storeno, $productno, $rate, $availability){
					$prefix = constant('PREFIX');
					$storeProductTable = $prefix."storeproduct";

					$params = array();
					$types = "";
					$dataset = "";
					$count = 0;
					$updatecount = 0;

					if($rate != NULL){
							$updatecount++;
							$params[] = &$rate;
							if($count==0){
								$count++;
								$dataset .= "rate=?";
							}
							else {
								$dataset .= ",rate=?";
							}
							$types .= 'd';
					}
					
					if($availability >= 0){
							$updatecount++;
							$params[] = &$availability;
							if($count==0){
								$count++;
								$dataset .= "availability=?";
							}else{
								$dataset .= ",availability=?";
							}
							$types .= 'i';
					}


					if($updatecount > 0){
							$sql="UPDATE $storeProductTable SET $dataset WHERE storeno=? AND productno=?";
							//echo $sql;
							$params[] = &$storeno;
							$types .= 'i';

							$params[] = &$productno;
							$types .= 'i';

							//$stmt = $this->dbcon->prepare($sql);

							if( !$stmt = $this->dbcon->prepare($sql) )
									throw new Exception("Prepare statement failed: ".$this->dbcon->error);

							call_user_func_array(array($stmt, "bind_param"), array_merge(array($types), $params));

							$stmt->execute();
							//var_dump($params);

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

			public function updateProductImageName($productimagename, $productno, $storeno){
				$sql = "UPDATE `aa_storeproduct` SET `imageurl`=? WHERE `productno`=? AND `storeno`=? ";
				$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param("sii", $productimagename, $productno, $storeno);
				$stmt->execute();
				$result = $stmt->affected_rows;
				$stmt->close();
				if($result > 0){
					return "true";
				}else {
					return "false";
				}
			}
			
			public function check_if_product_has_discount($storeno,$productno)
			{
			    $sql="SELECT * FROM `aa_storediscount` WHERE `productno`=? AND `storeno`=?";
			    
			    $stmt = $this->dbcon->prepare($sql);
			    $stmt->bind_param("ii",$productno,$storeno);
				$stmt->execute();
				$result = $stmt->get_result();
				$stmt->close();
				if($result->num_rows>0)
				{
				    return true;
				}
				else{
				    return false;
				}
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
        	
        	public function update_store_product_discount($storeno,$productno,$drate)
        	{
        	    $sql="UPDATE `aa_storediscount` SET `discountedrate`=? WHERE `productno`=? AND `storeno`=?";
        	    
        	    $stmt = $this->dbcon->prepare($sql);
        		$stmt->bind_param("dii",$drate, $productno,$storeno);
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
