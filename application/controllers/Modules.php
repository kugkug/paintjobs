<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

	public function index()
	{
		$this->aHtml['title'] 	=	"New Paint Job";
		$this->aHtml['new'] 	=	"active";
		$this->aHtml['job'] 	=	"";
		$aViewData              =   array("module" => $this->load->view("new_paint_job", $this->aHtml, TRUE));

		$this->load->view('index', $aViewData);
	}

	public function paint_jobs()
	{
		$this->aHtml['title'] 	=	"Paint Jobs";
		$this->aHtml['new'] 	=	"";
		$this->aHtml['job'] 	=	"active";


		$this->aHtml['paintjobs'] 	=	$this->getJobs();

		$aViewData              =   array("module" => $this->load->view("paint_jobs", $this->aHtml, TRUE));

		$this->load->view('index', $aViewData);
	}

	public function save_job() {

		$vPlateNo 		=	$this->input->post('plateno');
		$vCurrColor 	=	$this->input->post('currcolor');
		$vTargetColor 	=	$this->input->post('targetcolor');

		$vQuery =	"INSERT INTO tbl_paintjobs (`plateno`, `currentcolor`, `targetcolor`, `status`, `entrydate`) VALUES ('".$vPlateNo."', '".$vCurrColor."', '".$vTargetColor."', 'pending', '".date("Y-m-d H:i:s")."')";

		$eQuery =	$this->db->query($vQuery);
		if ($eQuery == false) {
			echo "alert('Failed to save data');";
		} else {
			echo "window.location = 'paintjobs';";
		}

	}

	public function update_job() {

		$vId 		=	$this->input->post('id');
		

		$vQuery =	"UPDATE tbl_paintjobs SET `status` = 'completed' WHERE `id` ='".$vId."'";
		$eQuery =	$this->db->query($vQuery);
		if ($eQuery == false) {
			echo "alert('Failed to update data');";
		} else {
			echo "window.location = 'paintjobs';";
		}

	}

	private function getJobs() {

		$qProcess 	=	"SELECT * FROM tbl_paintjobs WHERE status ='pending' ORDER BY entrydate";
		$eProcess 	=	$this->db->query($qProcess);

		return array($eProcess->result_array());

	}

	public function get_performance() {

		$qPerformance 	=	"SELECT targetcolor, count(targetcolor) as cnt FROM tbl_paintjobs WHERE status ='completed' GROUP BY targetcolor";
		$ePerformance 	=	$this->db->query($qPerformance);

		$aResult 	=	$ePerformance->result_array();
		
		$sResult 	=	"";
		$sBreakDown =	"";
		$nTotal 	=	0;

		foreach ($aResult as $nKey => $aValue) {
			$nTotal += $aValue['cnt'];
			$sBreakDown .= "<tr><td>".ucfirst($aValue['targetcolor'])."</td><td>".$aValue['cnt']."</td></tr>";
		}

		$sResult 	.=	"<tr><td>Total Cars Painted:</td><td>".$nTotal."</td></tr><tr><td  colspan=\"2\">Breakdown:</td></tr>".$sBreakDown;

		echo "$('.tbl-body').html('".$sResult."');";
	}
}
