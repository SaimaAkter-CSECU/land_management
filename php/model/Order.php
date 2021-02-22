<?php
	class Order {
		private $dbcon=null;
		private $selftable;
    private $order_detail;
    private $orderstatus;
		private $ostatus;
    // private $cartdelivarycharge;
		private $prefix;
		private $logged_in=false;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."_order";
      $this->order_detail = $this->prefix."_order_detail";
      $this->order_status = $this->prefix."_order_status";
			$this->ostatus = $this->prefix."_ostatus";
    //   $this->cartdelivarycharge = $this->prefix."_cartdelivarycharge";
			$this->dbcon=$dbcon;
	}

	public function get_filtered_orders_for_store($orderno,$pageno,$limit,$storeno)
	{
		$dataset = " where storeno=$storeno ";
		$param = "";
		$value = array();

		if($orderno!=-1)
		{
			$dataset .=" AND orderno=? ";
			$param .="i";
			$value[] = &$orderno;
		}

		// if($userno!=-1)
		// {
		// 	$dataset .=" AND userno=? ";
		// 	$param .="i";
		// 	$value[] = &$userno;
		// } 

		// if($deliverydate!='null')
		// {
		// 	$dataset .=" AND DATE(statustime)=? ";
		// 	$param .="s";
		// 	$value[] = &$deliverydate;
		// }

		$startlimit = ($pageno-1)*$limit;
		$value[] = &$startlimit;
		$value[] = &$limit;
		$dataset .= " ORDER BY statustime DESC LIMIT ?, ? ";
		$param .= "ii";
		//echo $limit." ".$startlimit;

		$sql = "SELECT  *,
						(select ufirstname from aa_user as u where u.userno=o.userno) as ufirstname,
						(select ulastname from aa_user as u where u.userno=o.userno) as ulastname,
						(SELECT delivery_location FROM aa_order_delivery_details as odd WHERE o.orderno=odd.orderno ) as delivery_location,
						(SELECT contact_no FROM aa_order_delivery_details as odd WHERE o.orderno=odd.orderno ) as contact_no,
						(SELECT statusno FROM aa_order_status as os WHERE o.orderno=os.orderno ORDER BY statusno DESC LIMIT 1) as statusno,
						(SELECT statustime FROM aa_order_status as os WHERE o.orderno=os.orderno ORDER BY statusno DESC LIMIT 1) as statustime
						FROM
						 `aa_order`
						 as o".$dataset;

		// echo $sql;
		if( !$stmt = $this->dbcon->prepare($sql) )
			throw new Exception("Prepare statement failed: ".$this->dbcon->error);

		call_user_func_array(array($stmt, "bind_param"), array_merge(array($param), $value));

		$stmt->execute();
		//var_dump($stmt);
		$result=$stmt->get_result();

		return $result;
	}


    public function insert_order_status($orderno,$orderstatus)
    {
      	$sql = "INSERT INTO aa_order_status(orderno, statusno, statustime) VALUES (?,?,current_timestamp)";

      	$stmt = $this->dbcon->prepare($sql);
  		$stmt->bind_param("ii",$orderno,$orderstatus);
  		$stmt->execute();
      	$result = $stmt->affected_rows;
  		$stmt->close();
  		if($result>0)
  		{
  			return true;
  		}
  		else {
  			return false;
  		}
    }


		public function check_ongoing_status_of_an_order($orderno)
		{
			$sql="SELECT statusno FROM aa_order_status WHERE orderno=? ORDER BY statusno DESC LIMIT 1";

			$stmt = $this->dbcon->prepare($sql);
  			$stmt->bind_param("i",$orderno);
  			$stmt->execute();
      		$result = $stmt->get_result();
			return $result;
		}

		// Store
		public function update_deliverydatetime_of_a_store_cart($cartno, $storeno, $deliverydatetime)
		{
			$sql = "UPDATE aa_cart SET delivarydatetime=? WHERE storeno=? AND cartno=?";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("sii", $deliverydatetime, $storeno, $cartno);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			if($result>0)
			{
				return true;
			}
			else {
				return false;
			}
		}

		public function insert_a_cartdeliverycharge($cartno, $storeno, $distance, $servicerate, $deliverytype)
		{
			$sql = "INSERT INTO `aa_cartdelivarycharge` (`cartno`, `storeno`, `distance`, `servicerate`, `deliverytype`) VALUES (?,?,?,?,?)";

			$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param("iiddi", $cartno, $storeno, $distance, $servicerate, $deliverytype);
				$stmt->execute();
			$result = $stmt->affected_rows;
				$stmt->close();
				if($result>0)
				{
					return true;
				}
				else {
					return false;
				}
		}

		public function get_order_primary_info($storeno,$orderno)
		{
			$sql="SELECT * 
				FROM `aa_user` 
				INNER JOIN `aa_order` 
				ON aa_user.userno = aa_order.userno 
				WHERE aa_order.orderno=? AND aa_order.storeno=?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("ii", $orderno, $storeno);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}

		public function get_order_details($orderno)
		{
			$sql="SELECT *,
				(SELECT productname from aa_product as p WHERE od.productno=p.productno) as productname
				FROM `aa_order_detail` as od WHERE orderno=? ";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $orderno);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}

		public function get_order_delivery_details($orderno)
		{
			$sql="SELECT * FROM `aa_order_delivery_details` as o WHERE orderno=? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $orderno);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}

		public function get_order_delivery_rate($storeno)
		{
			$sql="SELECT homedelivaryrate FROM `aa_store` as o WHERE storeno=? ";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i", $storeno);
			$stmt->execute();
			$result = $stmt->get_result();

			return $result;
		}

		public function get_customerinfo_of_an_order($orderno)
		{
			$sql="SELECT * FROM aa_user WHERE userno IN(SELECT userno FROM aa_order WHERE orderno=? )";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$orderno);
  			$stmt->execute();
      		$result = $stmt->get_result();
  			$stmt->close();

			return $result;
		}
  }
?>
