<style>
.mobile_bar {
    background: #f4f4f4;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 12px;
}
</style>
<script type="text/javascript" src="http://lopezpagan.com/assets/js/detect-browser.js"></script>
<script>
    console.log(jscd.os);
    console.log(jscd.mobile);
    
    if (jscd.mobile) {
        if (jscd.os == 'Android') {
            var mobile_bar = document.getElementById('mobile_bar');
                mobile_bar.style.display = 'block';
        }
    }
</script>

<!-- mobile bar area -->
<div id="mobile_bar" class="mobile_bar" hidden>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">Descarga la aplicación móvil gratuitamente. <a href="https://play.google.com/store/apps/details?id=com.lopezpagan.website" target="_blank" class="btn  btn-xs">Oprime Aquí</a></div>
        </div>
    </div>
</div>

