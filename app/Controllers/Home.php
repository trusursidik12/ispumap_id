<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//$data["_this"] = $this;
		//$googlemaps = new Googlemaps();
		// $header_provinces[0]["name"] = "DKI Jakarta";
		// $header_provinces[0]["id_stasiun"] = "JAKARTA";
		// $header_provinces[1]["name"] = "Banten";
		// $header_provinces[1]["id_stasiun"] = "CILEGON_PCI";
		// $header_provinces[2]["name"] = "Lampung";
		// $header_provinces[2]["id_stasiun"] = "LAMPUNG";
		// $header_provinces[3]["name"] = "Sumatera Selatan";
		// $header_provinces[3]["id_stasiun"] = "PALEMBANG";
		// $header_provinces[4]["name"] = "Riau";
		// $header_provinces[4]["id_stasiun"] = "PEKANBARU";
		// $header_provinces[5]["name"] = "Jambi";
		// $header_provinces[5]["id_stasiun"] = "JAMBI";
		// $header_provinces[6]["name"] = "Kalimantan Selatan";
		// $header_provinces[6]["id_stasiun"] = "BANJARMASIN";
		// $header_provinces[7]["name"] = "Kalimantan Tengah";
		// $header_provinces[7]["id_stasiun"] = "KOTAWARINGIN_BARAT";
		// $header_provinces[8]["name"] = "Kalimantan Timur";
		// $header_provinces[8]["id_stasiun"] = "BALIKPAPAN_BB";
		// foreach ($header_provinces as $key => $province) {
		// 	$ch = curl_init(API_URL . "aqmprovince?trusur_api_key=" . API_KEY . "&provinsi=" . urlencode($province["name"]));
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 	$output = curl_exec($ch);
		// 	curl_close($ch);
		// 	if (stripos(" " . $output, "\"status\":true") > 0) {
		// 		$aqmprovince = json_decode("[" . $output . "]")[0];
		// 		if ($aqmprovince->resumes->worst_stasiun_id != "")
		// 			$stasiun_id = str_replace("KLHK-", "", $aqmprovince->resumes->worst_stasiun_id);
		// 		else
		// 			$stasiun_id = $province["id_stasiun"];

		// 		$header_provinces[$key]["category"] = $aqmprovince->resumes->category;
		// 		foreach ($aqmprovince->resumes->ispu as $ispu_s) {
		// 			if ($ispu_s->id_stasiun == $stasiun_id || $ispu_s->id_stasiun == "KLHK-" . $stasiun_id) {
		// 				$ispu_s->btn_class_pm10 = $this->getCssIspuCategory($ispu_s->pm10);
		// 				$ispu_s->btn_class_pm25 = $this->getCssIspuCategory($ispu_s->pm25);
		// 				$ispu_s->btn_class_o3 = $this->getCssIspuCategory($ispu_s->o3);
		// 				$ispu_s->btn_class_so2 = $this->getCssIspuCategory($ispu_s->so2);
		// 				$ispu_s->btn_class_no2 = $this->getCssIspuCategory($ispu_s->no2);
		// 				$ispu_s->btn_class_co = $this->getCssIspuCategory($ispu_s->co);
		// 				$header_provinces[$key]["ispu"] = $ispu_s;
		// 				break;
		// 			}
		// 		}

		// 		$ch = curl_init(API_URL . "aqmdata?trusur_api_key=" . API_KEY . "&id_stasiun=" . $stasiun_id);
		// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 		$output = curl_exec($ch);
		// 		curl_close($ch);
		// 		if (stripos(" " . $output, "\"status\":true") > 0) {
		// 			$aqmdata = json_decode("[" . $output . "]")[0];
		// 			$header_provinces[$key]["data"] = $aqmdata->data;
		// 		} else {
		// 			$header_provinces[$key]["data"] = NULL;
		// 		}
		// 	}
		// }

		// $data["header_provinces"] = $header_provinces;
		// $googlemaps->initialize();
		// if ($this->is_mobile()) {
		// 	$googlemaps->zoom = 5;
		// 	$googlemaps->center = "-6.215416, 106.802940";
		// }
		// $data["map"] = $googlemaps->create_map();
		echo view('v_header');
		// echo view('v_menu');
		// echo view('v_home');
		// echo view('v_footer');
		// echo view('v_home_js');
	}

	//--------------------------------------------------------------------

}
