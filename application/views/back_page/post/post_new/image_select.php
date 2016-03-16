<div class="row">
    <div class="col-sm-12">
        <?php 
        $fi = 0;
        $fb = 0;
        $ji = 0;
        $jb = 0;?>
        <?php foreach ($_selectMedia as $row) { ?>
            <div class="col-sm-3 text-center" data-tag="1d">
                <div class="form-group">
                    <img src="<?php echo '/SambuPage/' . $row->link_media; ?>" class="img-rounded" style="max-width : 200px; max-height: 100px;"/>
                </div>
                <div class="input-group">
                    <input class="form-control js-copyinput<?php echo $fi++; ?>" name="" value="<?php echo '/SambuPage/' . substr($row->link_media, 2); ?>"/>
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-primary js-textareacopybtn<?php echo $fb++; ?>" onclick="salintulisan()">Copy</button>
                    </span>                    
                </div>
            </div>
            <script>
                var copyTextareaBtn = document.querySelector('.js-textareacopybtn<?php echo $jb++;?>');

                copyTextareaBtn.addEventListener('click', function(event) {
                    var copyTextarea = document.querySelector('.js-copyinput<?php echo $ji++;?>');
                    copyTextarea.select();

                    try {
                        var successful = document.execCommand('copy');
                        var msg = successful ? 'successful' : 'unsuccessful';
                        console.log('Copying text command was ' + msg);
                    } catch (err) {
                        console.log('Oops, unable to copy');
                    }
                });
            </script>
        <?php } ?>
    </div>
</div>

