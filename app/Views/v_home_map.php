<style>
    .map-loader {
        z-index: 9999999;
        position: absolute;
        top: 100px;
        border: 16px solid #f3f3f3;
        /* Light grey */
        border-top: 16px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="map" class="section-padding-100">
    <div class="row">
        <div class="col-12" style="text-align:center;width:100%;">
            <?= $map["js"]; ?>
            <?= $map["html"]; ?>
            <div id="map_loader" class="map-loader">Loading map, please wait ...</div>
        </div>
    </div>
</div>