<?php
class Cron_model extends CI_Model {
	protected $array_config = array();

	function __construct() {
		$this->load->database();
		$this->array_config = $this->loadConfig();
	}

	public function loadConfig(){
		$this->db->select('*');
		$query = $this->db->get("config");
		return $query->row_array();
	}

	public function getTime(){
		$time = array(
			'PH' => $this->array_config['time_ph'],
			'GH' => $this->array_config['time_gh'],
			'JoinPH' => $this->array_config['time_join_ph'],
			'JoinGH' => $this->array_config['time_join_gh'],
		);
		return $time;
	}

	public function preciousGH($num = "1"){
		$sql = "SELECT * FROM  joingh WHERE status = 1 AND verify = 0";
		$query = $this->db->query($sql);
		if ($num == 1 ) {
			$num = $query->num_rows();
		}
		if ($num <= 0) {
			$CI =& get_instance();
			$CI->load->model('Gh_model');
			$data_config = $this->array_config;
			$string_userid = $this->array_config['preciousGH'];
			$array_userid = explode(",",$string_userid);
			foreach ($array_userid as $key => $userid) {
				$CI->Gh_model->activateGH($userid);
			}
		}
	}

	public function penanceGH(){
		$sql = "SELECT * FROM `joinph`WHERE sent = 1";
		//select * from joingh inner join joinph ON joinph.code = joingh.ghid group by code
		$time = time();
		$this->db->select('*');
		$this->db->where('endtime <= '.$time);
		$this->db->where('sent = 1');
		$query = $this->db->get('joinph');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$this->db->where('joinphid', $row['joinphid']);
				$this->db->update('joinph', array(
					'penance' => 1,
					'status' => 3,
					'verify' => 1
				));

				$this->db->select('*');
				$this->db->where('ghid', $row['code']);
				$query_gh = $this->db->get('joingh');
				if ($query_gh->num_rows() >= 1) {
					$row_gh = $query_gh->row_array();
					$userid = $row_gh['userid'];

					$this->db->select('*');
					$this->db->where('userid', $userid);
					$this->db->where('penanceGH', 1);
					$query = $this->db->get('user');
					if ($query->num_rows() != 1) {
						$CI =& get_instance();
						$CI->load->model('Ph_model');
						$CI->Ph_model->activatePH('A', 3, $userid, $userid);
						$sql = "UPDATE  `user` SET penance = penance + 1  WHERE  `user`.`userid` = '$userid' ;";
						$this->db->query($sql);
						$sql = "UPDATE  `user` SET penanceGH = 1 WHERE  `user`.`userid` = '$userid' ;";
						$this->db->query($sql);
					}
				}

				/*$this->db->where('phid', $row['phid']);
				$this->db->update('ph', array(
					'penance' => 1,
				));*/
			}
		}

	}

	public function penancePH(){
		$sql = "SELECT * FROM `joinph`WHERE sent = 1";
		//select * from joingh inner join joinph ON joinph.code = joingh.ghid group by code
		$time = time();
		$this->db->select('*');
		$this->db->where('endtime <= '.$time);
		$this->db->where('verify = 1');
		$this->db->where('status = 2');
		$this->db->where('sent = 0');
		
		$query = $this->db->get('joinph');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$idsource = $row['userid'];
				$room = $row['room'];

				$this->db->select('*');
				$this->db->where('userid', $idsource);
				$query = $this->db->get('user');
				$array_username_referral = $query->row_array();
				$idsource = $array_username_referral['userid'];

				$this->db->select('*');
				$this->db->where('username', $array_username_referral['referral']);
				$query = $this->db->get('user');
				$userid = $query->row_array()['userid'];

				/*$this->db->where('phid', $row['phid']);
				$this->db->where('levelkey <=', 3);
				$this->db->update('ph', array('status' => 2, 'userid' => $userid ,  'levelkey' => 'levelkey+1'));*/
				$phid = $row['phid'];

				$this->db->select('*');
				$this->db->where('levelkey', 1);
				$this->db->where('phid', $phid);
				$query = $this->db->get('ph');
				if ($query->num_rows() == 0) {
					$this->db->where('phid', $phid);
					$this->db->where('levelkey !=', 1);
					$this->db->where('userid !=', $userid);
					$this->db->update('ph', array('levelkey' => 1, 'status' => 2,'userid' => $userid));

					$starttime = time();
					$endtime = $starttime + $this->getTime()['JoinPH'];
					$this->db->where('phid', $row['phid']);
					$this->db->where('userid !=', $userid);
					/*$this->db->update('joinph', array('status' => 1,'verify' => 0, 'userid' => $userid, 'starttime' => $starttime, 'endtime' => $endtime));*/
					$this->db->update('joinph', array('userid' => $userid, 'starttime' => $starttime, 'endtime' => $endtime));

					$this->db->where('userid', $idsource);
					$this->db->where('active', 0);
					$this->db->update('user', array('active' => 1));
					/*$this->db->where('ghid', $row['code']);
					$this->db->update('joingh', array('status' => 1,'verify' => 0));*/
				}
				else{
					$this->db->where('userid', $idsource);
					$this->db->where('active', 0);
					$this->db->update('user', array('active' => 1));

					$this->db->select('*');
					$this->db->where('userid', $userid);
					$this->db->where('active', 1);
					$query = $this->db->get('user');
					if ($query->num_rows() != 1) {
						/*$this->db->where('ghid', $row['code']);
						$this->db->update('joingh', array('status' => 1,'verify' => 0));*/
						$this->db->select('*');
						$this->db->where('userid', $idsource);
						$this->db->where('status', 1);
						$this->db->where('verify', 0);
						$query = $this->db->get('joingh');
						if ($query->num_rows() >= 1) {
							$del_ghid = $query->row_array()['ghid'];
							$sql = "DELETE FROM `joingh` WHERE `joingh`.`ghid` = $del_ghid ;";
							$this->db->query($sql);
							$this->db->where('phid', $row['phid']);
							$this->db->update('joinph', array('status' => 1,'verify' => 0,'sent' => 0, 'code' => 0));
						}
						else{
							$sql = "UPDATE  `user` SET  `penance` = penance + 1  WHERE  `user`.`userid` = '$idsource' AND 'active' = 1;";
							$this->db->query($sql);
							$this->db->where('userid', $idsource);
							$this->db->where('active', 1);
							$this->db->update('user', array('active' => 2));
						}
					}
				}

				/*$sql = "DELETE FROM ph WHERE phid = '$phid' AND levelkey > 3;";
				if ($this->db->query($sql)) {
					$sql = "DELETE FROM joinph WHERE phid = '$phid';";
					$this->db->query($sql);
				}*/

				// $this->db->where('levelkey !=', 1);

				// 'levelkey' => 1,

				
				/*$sql = "DELETE FROM ph WHERE phid = '$phid' AND userid = '$userid' ;";
				$this->db->query($sql);*/
				/*$sql = "DELETE FROM joinph WHERE phid = '$phid' AND userid = '$userid';";
				$this->db->query($sql);*/
			}
		
		}

		/*$this->db->select('*');
		$this->db->where('penance >', 0);
		$query = $this->db->get('user');
		if ($query->num_rows() >= 1) {
			$data_penance = $query->result_array();
			foreach ($data_penance as $key => $row) {
				$this->db->select('*');
				$this->db->where('userid', $row['userid']);
				$this->db->where('status', 1);
				$this->db->where('verify', 0);
				$query = $this->db->get('joingh');
				if ($query->num_rows() >= 1) {
					$userid = $row['userid'];
					//$del_ghid = $query->row_array()['ghid'];
					//$sql = "DELETE FROM `joingh` WHERE `joingh`.`ghid` = $del_ghid ;";
					$this->db->query($sql);
					$sql = "UPDATE  `user` SET  `penance` = penance - 1  WHERE  `user`.`userid` = $userid ;";
					$this->db->query($sql);
				}
			}
		}*/
	}

	public function cronPH() {
		$time = time();
		$this->db->select('phid');
		$this->db->where('endtime <= '.$time);
		$this->db->where('status = 1');
		$query = $this->db->get('ph');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$this->db->where('phid', $row['phid']);
				$this->db->update('ph', array('status' => 2));
				$CI =& get_instance();
				$CI->load->model('Ph_model');
				$CI->Ph_model->splitPH($row['phid']);
			}
		}
	}
	
	public function cronJoinPH() {
		$this->db->select('joinphid');
		//$this->db->where('starttime', 0);
		//$this->db->where('endtime', 0);
		$this->db->where('status', 1);
		$this->db->where('verify', 1);
		$query = $this->db->get('joinph');
		if ($query->num_rows() > 0) {
			$starttime = time();
			// $endtime = $starttime + (3600*24)*$row->time;
			$endtime = $starttime + $this->getTime()['JoinPH'];
			foreach ($query->result_array() as $row) {
				$this->db->where('joinphid', $row['joinphid']);
				$this->db->update('joinph', array('status' => 2));
				$this->db->update('joinph', array('starttime' => $starttime, 'endtime' => $endtime));
			}
		}
	}
	
	public function cronVerifyGH(){
		$userid = $this->session->userdata('userid');
		$sql = "SELECT joingh.* ,COUNT(*) AS total FROM  joingh INNER JOIN joinph ON joingh.ghid = joinph.code AND joinph.verify =1 AND joinph.status =3 AND joinph.status =3 GROUP BY code";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		foreach ($result as $key => $row) {
			//SELECT * FROM `joinph`where code = 294 and sent =1 and status = 3 and verify = 1
			if ($row['total'] == 3) {
				$this->db->where('userid', $row['userid']);
				$this->db->where('ghid', $row['ghid']);
				$this->db->update('joingh', array('verify' => 1, 'status' => 2));
			}
		}
	}

	public function cronPHGH() {
		$resultA = $this->countTotal('A');
		$resultB = $this->countTotal('B');
		foreach ($resultA as $keyA => $rowA) {
			foreach ($resultB as $keyB => $rowB) {
				if ($rowA['total'] == 2 && $rowB['total'] == 2 && $rowA['userid'] == $rowB['userid']) {
					$this->db->where('phid', $rowA['phid'])->or_where('phid', $rowB['phid']);
					$this->db->update('joinph', array('status' => 2));
					$userid =$rowA['userid'];
					$phid = $rowA['phid'];

					$sql = "SELECT COUNT( * ) AS total FROM joinph, ph WHERE joinph.phid = ph.phid AND joinph.status = 3 AND ph.status = 2 AND joinph.phid = '$phid' AND joinph.verify = 1 AND ph.userid = '$userid' AND joinph.userid = '$userid' ";
					$query = $this->db->query($sql);
					$row = $query->row();
					if ($row->total == 2) {
						$this->db->where('phid', $rowA['phid'])->or_where('phid', $rowB['phid']);
						$this->db->update('ph', array('status' => 3));
					}
					/*$CI =& get_instance();
					$CI->load->model('Gh_model');
					$CI->Gh_model->activateGH($rowA['userid']);*/
					unset($resultA[$keyA]);
					unset($resultB[$keyB]);
					//break;
				}
			}
		}
	}

	public function cronssPH(){
		foreach ($this->countPH() as $key => $row) {
			if ($row['total'] == 2) {
				$this->db->where('phid', $row['phid']);
				$this->db->update('ph', array('status' => 3));
			}
		}
	}

	public function cronPHtoGH(){
		$this->cronssPH();
		$resultA = $this->countPHGH('A');
		$resultB = $this->countPHGH('B');
		foreach ($resultA as $keyA => $rowA) {
			foreach ($resultB as $keyB => $rowB) {
				if ($rowA['userid'] == $rowB['userid']) {
					$userid = $rowB['userid'];

					$GH = $this->countPH3($userid)['total']/2 - $this->countGH($userid)['total'] - 1;
					if ($GH > 0) {
						for ($i=1; $i <= $GH; $i++) { 
							$CI =& get_instance();
							$CI->load->model('Gh_model');
							$CI->Gh_model->activateGH($userid);
						}
					}
				}
				/*unset($resultA[$keyA]);
				unset($resultB[$keyB]);*/
			}
		}
	}

	public function cronJoinPHGH($room = "") {
		$sql = "SELECT * FROM joingh WHERE `joingh`.`status` = 1 AND `joingh`.`verify` = 0 ORDER BY  joingh.ghid ASC LIMIT 0,1";
		$resultGH = $this->db->query($sql);
		$numGH = $resultGH->num_rows();
		if ($numGH == 1) {
			$resultJoinGH = $resultGH->row_array();
			$userid = $resultJoinGH['userid'];
			$code = $resultJoinGH['ghid'];
			$sql = "SELECT joinph.* FROM joinph, ph  WHERE joinph.phid = ph.phid AND joinph.status = 1 AND joinph.verify = 0 AND joinph.userid != '$userid' AND joinph.code = 0 AND joinph.code != '$code' ORDER BY  `joinph`.`joinphid` ASC LIMIT 0,3";
			$resultPH = $this->db->query($sql);
			$numPH = $resultPH->num_rows();
			if ($numPH == 3) {
				$resultJoinPH = $resultPH->result_array();
				$count = 0;
				foreach ($resultJoinPH as $key => $value) {
					$this->db->where('joinphid', $value['joinphid']);
					$this->db->update('joinph', array('verify' => 1, 'code' => $resultJoinGH['ghid']));
					$count++;
					if ($count == 3) {
						$this->db->where('ghid', $resultJoinGH['ghid']);
						$this->db->update('joingh', array('status' => 2));
						unset($count);
						$this->cronJoinPHGH();
						break;
					}
					unset($resultJoinPH[$key]);
				}
			}
		}
	}
	
	public function cronGH() {
		$time = time();
		$this->db->select('ghid');
		$this->db->where('endtime <= '.$time);
		$this->db->where('status = 1');
		$query = $this->db->get('gh');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$this->db->where('ghid', $row['ghid']);
				$this->db->update('gh', array('status' => 2));
				$CI =& get_instance();
				$CI->load->model('Gh_model');
				$CI->Gh_model->splitGH($row['ghid']);
			}
		}
	}
	
	public function countTotal($room = "") {
		$time = time();
		$sql = "SELECT joinph.*, COUNT(*) AS total FROM joinph, ph WHERE joinph.phid = ph.phid AND joinph.room = '{$room}' AND joinph.status = 2 AND ph.status = 2 AND joinph.verify = 1 AND joinph.endtime <= '{$time}' GROUP BY phid";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	public function countPHGH($room = ""){
		$sql = "SELECT ph.* FROM joinph, ph WHERE ph.phid = joinph.phid AND ph.status = 3 AND joinph.status = 3 AND ph.room = '$room' AND joinph.room = '$room' GROUP BY userid";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function countGH($userid = ""){
		$sql = "SELECT COUNT(*) AS total FROM gh  WHERE userid = '$userid'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function countPH(){
		$sql = "SELECT joinph.* , COUNT(*) AS total FROM `joinph` where status = 3 AND verify = 1 AND sent = 1 group by phid";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function countPH3($userid = ""){
		$sql = "SELECT ph.*, COUNT(*) AS total FROM joinph, ph WHERE ph.phid = joinph.phid AND ph.status = 3 AND joinph.status = 3 AND ph.userid = '$userid' ";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
}
?>