<?php
	class Message {
		private $dbcon=null;
		private $selftable;
		private $prefix;

    public function __construct($dbcon){
			$this->prefix=constant('PREFIX');
			$this->selftable = $this->prefix."storecustomermessage";
			$this->dbcon=$dbcon;
    }

		public function insert_a_message($message,$customerno,$storeno,$datetime)
		{
			$sql="INSERT INTO $this->selftable(`message`, `fromcustomer`, `tostore`, `msgdatetime`,sender) VALUES (?,?,?,?,0)";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("siis",$message,$customerno,$storeno,$datetime);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close();
			if($result>0)
			{
				$lastid = $this->dbcon->insert_id;
					return $lastid;
			}
			else {
				return -1;
			}
		}

		public function get_messages($customerno,$storeno,$pageno,$limit)
		{
			$startlimit = ($pageno-1)*$limit;

			$sql="SELECT * FROM `aa_storecustomermessage`
						WHERE fromcustomer=? AND tostore=? ORDER by msgdatetime DESC LIMIT ?,?";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("iiii",$customerno,$storeno,$startlimit,$limit);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}

		public function get_messages_by_last_slno($customerno,$storeno,$lastslno,$limit)
		{
			// $startlimit = ($pageno-1)*$limit;

			$sql="SELECT * FROM `aa_storecustomermessage`
						WHERE fromcustomer=? AND tostore=? AND slno<? ORDER by msgdatetime DESC LIMIT ?";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("iiii",$customerno,$storeno,$lastslno,$limit);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}


		public function get_customer_from_messages($storeno)
		{
			// $sql="SELECT userid, fromcustomer,ufirstname,ulastname, imageurl
			// 			FROM
			// 			(SELECT DISTINCT fromcustomer FROM `aa_storecustomermessage` WHERE tostore=?) as scm
			// 			INNER JOIN
			// 			(SELECT userno,userid,ufirstname,ulastname, imageurl from aa_user ) as u
			// 			ON scm.fromcustomer = u.userno";

			// new code 2019-05-17
			$sql="SELECT userid, fromcustomer,ufirstname,ulastname, imageurl,mdt
						FROM (SELECT fromcustomer,max(`msgdatetime`) as mdt FROM `aa_storecustomermessage` WHERE tostore=? GROUP BY fromcustomer) as scm
						INNER JOIN
						(SELECT userno,userid,ufirstname,ulastname, imageurl from aa_user ) as u
						ON scm.fromcustomer = u.userno
						ORDER BY mdt DESC";
			// new code ends

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}

		public function get_total_new_message_counts_between_store_and_customer($storeno)
		{
			$sql="SELECT COUNT(*) as totalnewmsg,scm.fromcustomer
						FROM
						(SELECT * FROM aa_storecustomermessage WHERE `tostore`=?) as scm
						INNER JOIN
						(SELECT * FROM aa_conversation WHERE storeno=?) as c
						ON scm.tostore = c.storeno AND scm.fromcustomer = c.customerno
						WHERE scm.slno>c.storelastseen AND senttostore=0
						GROUP BY scm.fromcustomer";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("ii",$storeno,$storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}

		public function get_total_unseen_message_counts_between_store_and_customer($storeno){
			$sql="SELECT COUNT(*) as totalnewmsg,scm.fromcustomer
						FROM
						(SELECT * FROM aa_storecustomermessage WHERE `tostore`=?) as scm
						INNER JOIN
						(SELECT * FROM aa_conversation WHERE storeno=?) as c
						ON scm.tostore = c.storeno AND scm.fromcustomer = c.customerno
						WHERE scm.slno>c.storelastseen 
						GROUP BY scm.fromcustomer";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("ii",$storeno,$storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}

		public function last_seen_by_store($customerno)
		{
			$sql="SELECT `storelastseen` FROM `aa_conversation` WHERE `storeno`=? AND `customerno`=?";

			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$storeno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}

		public function update_senttostore_of_a_conversation($storeno,$customerno,$senttostore)
		{
			$sql = "UPDATE `aa_conversation` SET  `senttostore`=$senttostore
							WHERE storeno=$storeno AND customerno=$customerno";
			$result = $this->dbcon->query($sql);
			return $result;
		}

		public function update_senttostore_of_conversations($storeno,$senttostore)
		{
			$sql = "UPDATE `aa_conversation` SET  `senttostore`=$senttostore
							WHERE storeno=$storeno";
			$result = $this->dbcon->query($sql);
			return $result;
		}

		public function update_senttocustomer_of_a_conversation($storeno,$customerno,$senttocustomer)
		{
			$sql = "UPDATE `aa_conversation` SET  `senttocustomer`=$senttocustomer
							WHERE storeno=$storeno AND customerno=$customerno ";

			$result = $this->dbcon->query($sql);
			return $result;
		}

		public function update_lastseen_store($storeno,$customerno,$slno)
		{
			$sql="UPDATE `aa_conversation` SET  storelastseen=$slno WHERE storeno=$storeno AND customerno=$customerno";
			$result = $this->dbcon->query($sql);
			return $result;
		}

		public function get_customerinfo($customerno)
		{
			$sql="SELECT * FROM `aa_user` WHERE `userno`=?";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param("i",$customerno);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}
	}
?>
