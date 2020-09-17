<script>
    function goto_area(area) {
        $(document).ready(function() {
            try {
                $(".ti-close").click();
                $('html, body').animate({
                    scrollTop: $('#' + area).offset().top
                }, 1000);
            } catch (ex) {}
        });
    }

    function getCssIspuCategory($ispu) {
        if ($ispu <= 50) return "success";
        else if ($ispu <= 100) return "primary";
        else if ($ispu <= 199) return "warning";
        else if ($ispu <= 299) return "danger";
        else return "dark";
    }
    $(document).ready(function() {
        setTimeout(function() {
            var marker_ = new Array();
            var content = new Array();
            $.get("<?= API_URL; ?>aqmstasiun?trusur_api_key=<?= API_KEY; ?>", function(aqmstasiun) {
                if (aqmstasiun.status == true) {
                    aqmstasiun.data.forEach(stasiun => {
                        if (stasiun.lat != "" && stasiun.lon != "") {
                            var id_stasiun = stasiun.id_stasiun;
                            $.get("<?= API_URL; ?>aqmispu?trusur_api_key=<?= API_KEY; ?>&id_stasiun=" + id_stasiun, function(aqmispu) {
                                if (aqmispu.data.id != "") {
                                    $.get("<?= API_URL; ?>aqmdetailstasiunbyid?trusur_api_key=<?= API_KEY; ?>&id_stasiun=" + id_stasiun, function(aqmalldata) {
                                        if (aqmalldata.province != null) {

                                            content[id_stasiun] = "<div class=\"single-hero-slide bg-img slide-background-overlay\" style=\"background-image: url(<?= base_url(); ?>/img/header/slide_" + aqmalldata.province.replace(" ", "_").replace(" ", "_").replace(" ", "_") + ".png);\">";
                                            content[id_stasiun] += " <div class=\"container h-100\" style=\"width:<?= ($_this->is_mobile()) ? "400;" : "600"; ?>px;\">";
                                            content[id_stasiun] += "    <div class=\"row h-100 align-items-end\">";
                                            content[id_stasiun] += "        <div class=\"col-12\">";
                                            content[id_stasiun] += "            <div class=\"awesome-weather-wrap awecf awe_wide temp7 awe_with_stats awe-code-802 awe-desc-scattered-clouds\" style=\"font-size:16px;font-weight:bolder;color: #ffffff; \">";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-5\">NAMA STASIUN</div>";
                                            content[id_stasiun] += "                    <div class=\"col-7\">" + aqmalldata.stasiun_name + "</div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-5\">KOTA</div>";
                                            content[id_stasiun] += "                    <div class=\"col-7\">" + aqmalldata.city + "</div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-5\">PROPINSI</div>";
                                            content[id_stasiun] += "                    <div class=\"col-7\">" + aqmalldata.province + "</div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "            </div>";
                                            content[id_stasiun] += "            <div class=\"awesome-weather-wrap awecf awe_wide temp7 awe_with_stats awe-code-802 awe-desc-scattered-clouds\" style=\" color: #ffffff; \">";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-12\" style=\"font-size:16px;font-weight:bolder;display: flex;\">";
                                            content[id_stasiun] += "                        <img style=\"height:30px;width:30px;\" src=\"<?= base_url(); ?>/img/ic_emote_" + aqmalldata.category.toLowerCase().replace(" ", "_").replace(" ", "_").replace(" ", "_") + ".png\">&nbsp;&nbsp;";
                                            content[id_stasiun] += "                        KATEGORI : " + aqmalldata.category;
                                            content[id_stasiun] += "                    </div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <br>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">PM 10</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.pm10) + "\">" + aqmalldata.pm10 + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">PM 25</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.pm25) + "\">" + aqmalldata.pm25 + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">O3</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.o3) + "\">" + aqmalldata.o3 + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">SO2</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.so2) + "\">" + aqmalldata.so2 + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">NO2</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.no2) + "\">" + aqmalldata.no2 + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">CO</div>";
                                            content[id_stasiun] += "                    <div class=\"col-2 btn btn-" + getCssIspuCategory(aqmalldata.co) + "\">" + aqmalldata.co + "</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "           </div>";
                                            content[id_stasiun] += "           <div class=\"awesome-weather-wrap awecf awe_wide temp7 awe_with_stats awe-code-802 awe-desc-scattered-clouds\" style=\"<?= ($_this->is_mobile()) ? "display:none;" : ""; ?>color: #ffffff; \">";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/pressure.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.pressure * 1) + " mBar</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/temparature.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.temperature * 1) + " &#176;C</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/wind_direction.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.wd * 1) + " &#176;</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/wind_speed.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.ws * 1) + " Km/h</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/humidity.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.humidity * 1) + " %</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/rain_rate.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.rain_intensity * 1) + " mm/jam</div>";
                                            content[id_stasiun] += "                    <div class=\"col-1\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "                <div class=\"row\">";
                                            content[id_stasiun] += "                    <div class=\"col-2\"><img style=\"height:40px;width:40px;\" src=\"<?= base_url(); ?>/img/solar_radiation.png\"></div>";
                                            content[id_stasiun] += "                    <div class=\"col-3 btn\">" + (aqmalldata.sr * 1) + " watt/m2</div>";
                                            content[id_stasiun] += "                    <div class=\"col-7\"></div>";
                                            content[id_stasiun] += "                </div>";
                                            content[id_stasiun] += "            </div>";
                                            content[id_stasiun] += "        </div>";
                                            content[id_stasiun] += "    </div>";
                                            content[id_stasiun] += "</div>";
                                            content[id_stasiun] += "</div>";



                                            if (aqmalldata.category == "BAIK") markercolor = "green";
                                            if (aqmalldata.category == "SEDANG") markercolor = "blue";
                                            if (aqmalldata.category == "TIDAK SEHAT") markercolor = "yellow";
                                            if (aqmalldata.category == "SANGAT TIDAK SEHAT") markercolor = "red";
                                            if (aqmalldata.category == "BERBAHAYA") markercolor = "purple";

                                            marker_[id_stasiun] = createMarker_map({
                                                map: map,
                                                position: new google.maps.LatLng(stasiun.lat, stasiun.lon),
                                                icon: {
                                                    url: "http://maps.google.com/mapfiles/ms/icons/" + markercolor + "-dot.png"
                                                }
                                            });
                                            $("#map_loader").hide();
                                            google.maps.event.addListener(marker_[id_stasiun], "click", function(event) {
                                                iw_map.setContent(content[id_stasiun]);
                                                iw_map.open(map, this);
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });





        }, 1000);
    });
</script>