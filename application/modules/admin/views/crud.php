<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $header['title'];?></h5>
                <span><?= $header['description'];?></span>
            </div>
            <div class="card-block">
                <iframe src="<?= $src;?>" id="iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('iframe').on('load', function() {
        setIframeHeight(this)
    });
    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            }
        }
    }
</script> 