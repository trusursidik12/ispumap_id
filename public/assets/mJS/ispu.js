//Dynamic UI Updater

//Activities Updater
function up_mcard_status(){
    let a = $('#mcard-status-number').text();
    a = Number(a);
    let b, c, d, i;
    let e = ['Pakai Masker',', Usahakan Beraktivitas di dalam Ruangan', ', Pakai Ventilator'];
    switch(true){
        case (a <= 50):
            b = '#19e32d';
            c = 'Baik';
            break;
        case (a <= 100):
            b = '#193ce3';
            c = 'Sedang';
            d = 1;
            break;
        case (a <= 200):
            b = '#f56a0d';
            c = 'Tidak Sehat';
            d = 2;
            break;
        case (a <= 300):
            b = '#a60909';
            c = 'Sangat Tidak Sehat';
            d = 3;
            break;
        default:
            b = '#000000';
            c = 'Berbahaya';
            d = 3;
    };
    $('#mcard-status-flavor').text(c);
    $('#mcard-status').css('background-color',b);
    $('div[id^="rec-"]').css('display','none');
    if (d > 0){
        $('#rekomen-flavor').empty();
        for (i = 0; i < d; i++){
            $('#rec-'+(i+1)).css('display','block');
            $('#rekomen-flavor').append(e[i]);
        };
    } else {
        $('#rec-4').css('display','block');
        $('#rekomen-flavor').text('Silahkan Beraktivitas di Luar');
    };
}
//color engine
function up_aq_round(){
    let d = $('.rank-aq').length;
    let a,b,i;
    for (i = 0; i < d; i++){
        a = $('#rank-aq-'+(i+1)).text();
        a = Number(a);
        switch(true){
            case (a <= 50):
                b = '#19e32d';
                break;
            case (a <= 100):
                b = '#193ce3';
                break;
            case (a <= 200):
                b = '#f56a0d';
                break;
            case (a <= 300):
                b = '#a60909';
                break;
            default:
                b = '#000000';
        };
        $('#rank-aq-'+(i+1)).css('color',b);
    };
}

//Initial function to place all relevant information on page and map
function up_map_mark(a){
    let b = a.length;
    let e = []; //for heatmap test, e is an array of f
    let f = {}; //for heatmap test
    let l_markers = L.markerClusterGroup({
        iconCreateFunction: function(l_marker_groups){
            let l_m_g_a = l_marker_groups.getAllChildMarkers();
            let l_m_g_aa = l_m_g_a.map(aaa => aaa.options.circle_aq);
            let l_m_g_m = Math.max(...l_m_g_aa);
            let l_m_g_c;
            switch(true){
                case (l_m_g_m <= 50):
                    //l_m_g_c = '#19e32d';
                    l_m_g_c = '01';
                    break;
                case (l_m_g_m <= 100):
                    //l_m_g_c = '#193ce3';
                    l_m_g_c = '02';
                    break;
                case (l_m_g_m <= 200):
                    //l_m_g_c = '#f56a0d';
                    l_m_g_c = '03';
                    break;
                case (l_m_g_m <= 300):
                    //l_m_g_c = '#a60909';
                    l_m_g_c = '04';
                    break;
                default:
                    //l_m_g_c = '#000000';
                    l_m_g_c = '05';
            };
            return new L.divIcon({
                html: '<div><span>'+l_m_g_m+'</span></div>',
                className: 'mclus-'+l_m_g_c+' mclus',
                iconSize: new L.Point(40,40)
            });
        }
    });
    for (let c = 0; c < b; c++){
        let d = a[c];
        let dd = L.circleMarker([d.loc_lat,d.loc_lng], {
            color:          'white',
            fillColor:      d.loc_col,
            fillOpacity:    0.8,
            radius:         10,
            weight:         1,
            circle_id:      d.st_id,
            circle_city:    d.loc_kabkot,
            circle_add:     d.loc_name,
            circle_aq:      d.loc_aq,
            circle_pm25:    d.loc_pm25,
            circle_pm10:    d.loc_pm10,
            circle_so2:     d.loc_so2,
            circle_no2:     d.loc_no2,
            circle_co:      d.loc_co,
            circle_up:      d.loc_up
        });
        //for default value
        if (d.st_id == 'JAKARTA'){
            $('#mcard-city').text(d.loc_kabkot);
            $('#mcard-address').text(d.loc_name);
            $('#mcard-status-number').text(d.loc_aq);
            $('#mcard-last-update').text('Revisi terakhir '+d.loc_up);
            let a_a = ['PM 2.5', 'PM 10', 'SO2', 'NO2', 'CO'];
            let a_a_a = [d.loc_pm25, d.loc_pm10, d.loc_so2, d.loc_no2, d.loc_co];
            let a_a_a_a = ['pm25', 'pm10', 'so2', 'no2', 'co'];
            for (let a_b = 0; a_b < 5; a_b++){
                let a_c = 
                            '<tr>'+
                                '<td>'+a_a[a_b]+'</td>'+
                                '<td id="mcard-ispu-row-'+a_a_a_a[a_b]+'">'+a_a_a[a_b]+'</td>'+
                            '</tr>';
                        $('#mcard-ispu-body').append(a_c);
            };
            up_mcard_status();
        };
        dd.on('click',u_loc);
        f = {
            lat:            d.loc_lat,
            lng:            d.loc_lng,
            value:          d.loc_aq //for now
        };
        l_markers.addLayer(dd);
        //push values into array of objects for heatmap
        e.push(f);
    };
    mymap.addLayer(l_markers);

    //Heatmap using leaflet-heatmap
    /*
    let g = {
        max: 300,
        data: e
    };
    let cfg = {
        "radius": 20,
        "maxOpacity": 0.8,
        "minOpacity": 0.25,
        "scaleRadius": false,
        "useLocalExtrema": false,
        latField: 'lat',
        lngField: 'lng',
        valueField: 'value',
        blur: 1,
        gradient: {
            
            '0': '#19e32d',
            '0.17': '#193ce3',
            '0.34': '#f56a0d',
            '0.67': '#a60909',
            '1': '#000000'
            
        }
    };
    //creates new heatmap overlay
    let h = new HeatmapOverlay(cfg);
    h.setData(g);
    mymap.addLayer(h);
    */

    //creates overlay for city and provices based on geoJSON data
    //function to get the color
    function p_g_col(a4){
        switch(true){
                case (a4 <= 50):
                    return '#19e32d';
                    break;
                case (a4 <= 100):
                    return '#193ce3';
                    break;
                case (a4 <= 200):
                    return '#f56a0d';
                    break;
                case (a4 <= 300):
                    return '#a60909';
                    break;
                default:
                    return '#000000';
            };
    };
    function p_g_aq(a5){
        let a6 = a.filter(function(a7){
            return a7.loc_lng >= a5[0] &&
                a7.loc_lng < a5[1] &&
                a7.loc_lat < a5[2] &&
                a7.loc_lat >= a5[3] &&
                a7.loc_aq >= 0
        });
        let a8 = 0;
        if (a6.length < 1){
            a8 = 0;
        } else {
            a8 = Math.max(...a6.map(a9 => a9.loc_aq));
        }
        return a8;
    };
    let inkabbo = L.geoJSON(indokab, {
        style: function(feature){
            //For Tile Testing
            //console.log(feature.geometry.coordinates[0][0][1]);
            let a11 = [
                feature.geometry.coordinates[0][0][0],
                feature.geometry.coordinates[0][2][0],
                feature.geometry.coordinates[0][0][1],
                feature.geometry.coordinates[0][2][1]
            ];
            let a12 = p_g_aq(a11);
            let a13 = 0.15;
            if (a12 == 0){
                a13 = 0;
            }
            //end of Tile Color Testing
            return {
                /*
                fillColor: p_g_col(feature.properties.aq_sq),
                fillOpacity: (feature.properties.aq_sq)+0.1
                */
                fillColor: p_g_col(a12),
                fillOpacity: a13
            };
        },
        weight: 0,
        //fillColor: '#19e32d', //will use property in JSON data called 'loc_aq'; have yet to be implemented
    }).addTo(mymap);
    
    //wind layer beta; currently this is just an image placeholder
    //before real wind particle dispersion could be implemented
    let windmap = L.OWM.wind({
        showLegend: false,
        maxZoom: 11,
        opacity: 0.25,
        appId:'dd5b6174b2e83925a5f3781eb42bb1db'
    });
    
    //creates layer selection controls
    var baseMaps = {
        "Primary Map" : l_back
    }
    var overlayMaps = {
        "Interpolated Data" : inkabbo,
        "Station Data" : l_markers,
        "Wind" : windmap
    }
    L.control.layers(baseMaps, overlayMaps, {position: 'bottomleft'}).addTo(mymap);   
}

//update location when circles are clicked
function u_loc(e){
    $('#mcard-city').text(e.target.options.circle_city);
    $('#mcard-address').text(e.target.options.circle_add);
    $('#mcard-status-number').text(e.target.options.circle_aq);
    $('#mcard-last-update').text('Revisi terakhir '+e.target.options.circle_up);
    $('#mcard-ispu-row-pm25').text(e.target.options.circle_pm25);
    $('#mcard-ispu-row-pm10').text(e.target.options.circle_pm10);
    $('#mcard-ispu-row-so2').text(e.target.options.circle_so2);
    $('#mcard-ispu-row-no2').text(e.target.options.circle_no2);
    $('#mcard-ispu-row-co').text(e.target.options.circle_co);
    up_mcard_status();
    //scrolly scroll to the thingy
    $('html, body').animate(
        {
        scrollTop: $('#mcard').offset().top - 100,
        },
        250,
        'linear'
    )
}       
     
//go to current location
$('#myloc').click(function() {
    let options = {
        enablehighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };
    function success(pos) {
        let crds = pos.coords;
        mymap.setView([crds.latitude,crds.longitude], 10);
    }
    function error(err) {
        alert('Location not granted');
    }
    navigator.geolocation.getCurrentPosition(success,error,options);
});

//todo add timeout
//Initial function to fetch data from API server
function ispu_start(){
    let a, b, hh;
    let c = {};
    let d = []; //d is array of objects (b)
    let e = []; //e is array of objects (c)
    let f = []; //f is filtered d
    let g = []; //g is general purpose placeholder array
    //note to self: hide api key in env
    $.getJSON("https://ispumaps.id/ispumapapi/api/aqmstasiun?trusur_api_key=VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA==")
        .done(function(aa){
            a = aa.data;
            $.getJSON("https://ispumaps.id/ispumapapi/api/aqmispu?trusur_api_key=VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA==")
                .done(function(ab){
                    b = ab.data;
                    $.each(b,function(i,value){
                        d.push(value);
                    });
                    $.each(a,function(i,value){
                        //in case if somehow there is a shared id
                        f = d.filter(function(e){
                                    return e.id_stasiun == value.id_stasiun;
                                });
                        f = f[0]; //pick the first result by default
                        //color engine and ISPU finder
                        g = [];
                        g.push(Number(f.pm25), Number(f.pm10), Number(f.co), Number(f.so2), Number(f.no2));
                        let gg = Math.max(...g);
                        switch(true){
                            case (gg <= 50):
                                hh = '#19e32d';
                                break;
                            case (gg <= 100):
                                hh = '#193ce3';
                                break;
                            case (gg <= 200):
                                hh = '#f56a0d';
                                break;
                            case (gg <= 300):
                                hh = '#a60909';
                                break;
                            default:
                                hh = '#000000';
                        };
                        //c creator
                        if (value.lat != null && value.lon != null){
                            c = {
                                st_id:      value.id_stasiun,
                                loc_name:   value.nama,
                                loc_lat:    Number(value.lat),
                                loc_lng:    Number(value.lon),
                                loc_up:     f.xtimetimes,
                                loc_aq:     gg,
                                loc_pm25:   Number(f.pm25),
                                loc_pm10:   Number(f.pm10),
                                loc_co:     Number(f.co),
                                loc_so2:    Number(f.so2),
                                loc_no2:    Number(f.no2),
                                loc_col:    hh,
                                loc_kabkot: value.kota
                                //add weather information here --> need api
                                //for future vector tile grouping
                                //loc_vtile: value.id_v_tile
                            };
                            e.push(c);
                        };
                    });
                    //top 5 best cities // note to self, make this a separate async function
                    //city grouping first --> this uses ES6 --> note to self, find all instances that use ES6
                    let e2 = [... new Set(e.map(e3 => e3.loc_kabkot))];
                    let e4 = [];
                    for (let i4 = 0; i4 < e2.length; i4++){
                        let e5 = e.filter(function(e6){
                            return e6.loc_kabkot == e2[i4];
                        }); 
                        let e7 = {
                            kabkot: e2[i4],
                            aq:     Math.max(...e5.map(e8 => e8.loc_aq))
                        };
                        e4.push(e7);
                    };
                    //Populate RankList by City
                    let e9 = e4.sort(function (e10, e11){
                        return e11.aq - e10.aq
                    });
                    let e12 = e9.slice(0,5);
                    $.each(e12,function(i,value){
                        let e13 = 
                            '<tr>'+
                                '<th scope="row">'+(i+1)+'</th>'+
                                '<td id="rank-loc-'+(i+1)+'" name="rank-loc-'+(i+1)+'">'+value.kabkot+'</td>'+
                                '<td>'+
                                    '<div class="rank-aq" id="rank-aq-'+(i+1)+'">'+value.aq+'</div>'+
                                '</td>'+
                            '</tr>';
                        $('#mcard-rank-body').append(e13);
                    });
                    up_aq_round();
                    //Call drawing functions
                    up_map_mark(e);
                });
        });
}