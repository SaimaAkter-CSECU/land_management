<?php
	class Orderstatus{
		private $dbcon=null;
		private $selftable;
		private $ostatus;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."order_status";
			$this->ostatus = $this->prefix."_ostatus";
			$this->dbcon=$dbcon;
    }

    public function get_order_status($orderno)
	{
		$sql="SELECT * FROM `aa_order_status` as ostatus 
			INNER JOIN `aa_ostatus` as os 
			ON ostatus.statusno = os.statusno 
			WHERE ostatus.orderno=?";

		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("i", $orderno);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;
	}

		public function get_order_status_not_sent_to_store($storeno)
		{
			$sql="SELECT orderno,statusno,statustime,statustitle
						FROM
						(SELECT orderno,statusno,statustime FROM aa_order_status) as ods
						INNER JOIN (SELECT statusno,statustitle FROM aa_ostatus) as os
						ON ods.statusno = os.statusno"; 

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result;
		}
}
