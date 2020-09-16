<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class m_home extends Model
{
    public function get_aqmprovince($province_name)
    {
        $ch = curl_init(API_URL . "aqmprovince?trusur_api_key=" . API_KEY . "&provinsi=" . urlencode($province_name));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmdata($id_stasiun)
    {
        $ch = curl_init(API_URL . "aqmdata?trusur_api_key=" . API_KEY . "&id_stasiun=" . $id_stasiun);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmispu_all()
    {
        $ch = curl_init(API_URL . "aqmispuall?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmispu($id_stasiun)
    {
        $ch = curl_init(API_URL . "aqmispu?trusur_api_key=" . API_KEY . "&id_stasiun=" . $id_stasiun);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmstasiun()
    {
        $ch = curl_init(API_URL . "aqmstasiun?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankpm10()
    {
        $ch = curl_init(API_URL . "aqmrankpm10?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankpm25()
    {
        $ch = curl_init(API_URL . "aqmrankpm25?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankso2()
    {
        $ch = curl_init(API_URL . "aqmrankso2?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankco()
    {
        $ch = curl_init(API_URL . "aqmrankco?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmranko3()
    {
        $ch = curl_init(API_URL . "aqmranko3?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankno2()
    {
        $ch = curl_init(API_URL . "aqmrankno2?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmprovinsi_web()
    {
        $ch = curl_init(API_URL . "aqmstasiun?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankpm10_yesterday()
    {
        $ch = curl_init(API_URL . "aqmrankpm10yesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankpm25_yesterday()
    {
        $ch = curl_init(API_URL . "aqmrankpm25yesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankso2_yesterday()
    {
        $ch = curl_init(API_URL . "aqmrankso2yesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankco_yesterday()
    {
        $ch = curl_init(API_URL . "aqmrankcoyesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmranko3_yesterday()
    {
        $ch = curl_init(API_URL . "aqmranko3yesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmrankno2_yesterday()
    {
        $ch = curl_init(API_URL . "aqmrankno2yesterday?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmprovinsi_list()
    {
        $ch = curl_init(API_URL . "aqmprovincelist?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmnewstop($limit = 6)
    {
        $ch = curl_init(API_URL . "aqmnewstop?trusur_api_key=" . API_KEY . "&limit=" . $limit);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmnews($keyword = "")
    {
        $ch = curl_init(API_URL . "aqmnews?trusur_api_key=" . API_KEY . "&k=" . $keyword);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_newssearch($keyword)
    {
        $ch = curl_init(API_URL . "news/search?trusur_api_key=" . API_KEY . "&title=" . $keyword);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmnews_slug($slug)
    {
        $ch = curl_init(API_URL . "aqmnewsslug?trusur_api_key=" . API_KEY . "&slug=" . $slug);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_lat_lon($lat, $lon)
    {
        $ch = curl_init(API_URL . "aqmdetailstasiun?trusur_api_key=" . API_KEY . "&lat=" . $lat . "&lon=" . $lon);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_dampak($id_stasiun)
    {
        $ch = curl_init(API_URL . "aqmeffectbystasiun?trusur_api_key=" . API_KEY . "&id_stasiun=" . $id_stasiun);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmabout()
    {
        $ch = curl_init(API_URL . "aqmabout?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }

    public function get_aqmfaqs()
    {
        $ch = curl_init(API_URL . "aqmfaqs?trusur_api_key=" . API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        if (stripos(" " . $output, "\"status\":true") > 0)
            return json_decode("[" . $output . "]")[0];
        else return NULL;
    }
}
