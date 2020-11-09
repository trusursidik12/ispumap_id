<!--Location Info & Map-->
<div class="container container-fluid maincont" style="max-width:100%; margin-top: 70px;">
    <div class="row justify-content-between drow">
        <!--
                    by default, have it populate Jakarta's Data for now;
                -->
        <div class="col-lg-4 order-12 order-lg-1 my-2" id="mcard-container">
            <div class="mcard" id="mcard">
                <b>Informasi Lokasi*</b>
                <div class="isdivider"></div>
                <div class="row">
                    <div class="col" style="line-height: 1.2;">
                        <p><b class="mcard-city" id="mcard-city" name="mcard-city">Jakarta</b></p>
                        <a class="text-muted" style="font-size: 0.8rem;" id="mcard-address">Street Address</a><br>
                        <a class="text-muted" style="font-size: 0.8rem;" id="mcard-last-update">revisi terakhir HH:MM DD:MM:YYYY</a>
                    </div>
                </div>
                <div class="row align-items-center mt-2" style="text-align: center; line-height: 1.2; margin-bottom: 10px;">
                    <div class="col">
                        <div class="mcard-status" id="mcard-status" data-toggle="collapse" href="#mcard-ispu" role="button" aria-expanded="false" aria-controls="mcard-ispu">
                            <h2 id="mcard-status-number" name="mcard-status-number">105</h2>
                            <a id="mcard-status-flavor">No Data Available</a>
                        </div>
                    </div>
                </div>
                <div class="row collapse" id="mcard-ispu">
                    <div class="col">
                        <table class="table table-borderless mcard-rank-table">
                            <thead>
                                <tr>
                                    <th scope="col">Parameter</th>
                                    <th scope="col" style="text-align: right;">ISPU</th>
                                </tr>
                            </thead>
                            <tbody id="mcard-ispu-body">
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <p class="font-weight-bold">Rekomendasi</p>
                        <div class="row align-items-center justify-content-center">
                            <div class="col" id="rec-1" style="display:none; max-width: 60px;">
                                <img src="<?= base_url(); ?>/assets/is_rec_mask.svg"><br>
                            </div>
                            <div class="col" id="rec-2" style="display:none; max-width: 60px;">
                                <img src="<?= base_url(); ?>/assets/is_rec_stay.svg">
                            </div>
                            <div class="col" id="rec-3" style="display:none; max-width: 60px;">
                                <img src="<?= base_url(); ?>/assets/is_rec_ventilator.svg">
                            </div>
                            <div class="col" id="rec-4" style="display:none; max-width: 60px;">
                                <img src="<?= base_url(); ?>/assets/is_rec_go_out.svg">
                            </div>
                            <div class="col" id="rekomen-flavor" style="font-size: 0.8rem;">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn-ispu">Pelajari Lebih Lanjut</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Map UI-->
        <div class="col-lg-8 order-1 order-lg-12 my-2">
            <div>
                <!-- <div class="scontainer">
                    <div class="srow">
                        <div class="row justify-content-between align-items-center bg-light srow-container">
                            <div class="col-5 col-md-10">
                                !--
                                            Location List; please populate using PHP
                                            Note: please populate both the label and value field because
                                            Firefox reads the labels while chromium-based browsers read
                                            the value
                                        --
                                <input list="locs" class="definput" placeholder="lokasi" />
                                <datalist id="locs" name="locs">
                                    <option label="Jakarta" value="Jakarta">
                                    <option label="Palembang" value="Palembang">
                                </datalist>
                            </div>
                            <div class="col-2 col-md-1">
                                <button type="button" class="sbutton" id="searchloc">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            <div class="col-3 col-md-1">
                                <button type="button" class="sbutton" id="myloc">
                                    <i class="fa fa-map-marker"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row srow-container gradscale">
                        </div>
                    </div>
                </div> -->
                <!-- This is where the map will go; do not delete the div 'mapcont'-->
                <div class="mapcont">
                    <!-- z-index so it will go under the search bar and stuff-->
                    <div id="mainmap" style="height:100%; z-index: 0;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>