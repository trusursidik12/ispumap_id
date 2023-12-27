<?php

namespace App\Controllers;

use App\Models\m_home;

class Home extends BaseController
{
	protected $home;

	public function __construct()
	{
		parent::__construct();
		$this->home =  new m_home();
	}

	public function index()
	{
		$data["_this"] = $this;
		$googlemaps = new Googlemaps();

		$googlemaps->initialize();
		if ($this->is_mobile()) {
			$googlemaps->zoom = 5;
			$googlemaps->center = "-6.215416, 106.802940";
		}
		$data["map"] = $googlemaps->create_map();

		$data['aqmprovinsi'] 					= json_decode(json_encode($this->home->get_aqmprovinsi_web()), true)['data'];

		$data['aqmranks'][0] 					= ["param" => "pm10", "label" => "PM10"];
		$data['aqmranks'][1] 					= ["param" => "pm25", "label" => "PM25"];
		$data['aqmranks'][2] 					= ["param" => "so2", "label" => "SO2"];
		$data['aqmranks'][3] 					= ["param" => "co", "label" => "CO"];
		$data['aqmranks'][4] 					= ["param" => "o3", "label" => "O3"];
		$data['aqmranks'][5] 					= ["param" => "no2", "label" => "NO2"];

		$data['aqmispuall'] 					= $this->home->get_aqmispu_group("DKI_JAKARTA");
		// echo "<pre>";
		// print_r($data['aqmprovinsi']);
		// print_r($data['aqmispuall']);
		// echo "</pre>";


		echo view('v_header', $data);
		// echo view('v_menu');
		echo view('v_home_map');
		// echo view('v_home_carousel');
		// echo view('v_home_ispu');
		// echo view('v_home_apps');
		// echo view('v_home_others');
		echo view('v_footer');
		echo view('v_ispu_js');
	}

	public function news($slug = "")
	{
		// $data["_this"] = $this;
		if ($slug != "") {
			$data['news'] = $this->home->get_aqmnews_slug($slug);
			$limit = 6;
		} else {
			$data['news'] = null;
			$limit = 30;
		}
		if (@$_GET["keyword"] == "")
			$data['aqmnewstop'] = $this->home->get_aqmnewstop($limit);
		else
			$data['aqmnewstop'] = $this->home->get_aqmnews($_GET["keyword"]);


		echo view('v_header', $data);
		echo view('v_menu');
		if ($data['news']) {
			echo view('v_news_detail');
			echo view('v_news_other');
		} else
			echo view('v_news');
		echo view('v_footer');
	}

	//--------------------------------------------------------------------

}
