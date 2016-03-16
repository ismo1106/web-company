<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="#"><i class="entypo-home"></i>Dashboard</a>
        </li>
    </ol>

    <div class="row">
        <div class="col-sm-3">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-chat"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $_getRowDailyComment;?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
                <h3>Daily Comments</h3>
                <p>Comment entered per day.</p>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $_getRowDailyVisitorFront;?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
                <h3>Daily Visitor</h3>
                <p>this is the average value. on back (<?php echo $_getRowDailyVisitorBack;?>)</p>
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-docs"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $_getRowPublishedPost;?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
                <h3>All Post in Publish</h3>
                <p>The post was published.</p>
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="tile-stats tile-brown">
                <div class="icon"><i class="entypo-chat"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $_getRowNotYetApprove;?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
                <h3>Comment Not Yet Approve</h3>
                <p><a href="<?php echo site_url('back/comment/index/NotYet');?>">Click here</a> to check comment.</p>
            </div>
        </div>
    </div>
    <br />
    
    <div class="row">
        <div class="col-sm-12">
            
        </div>
    </div>
    
</div>
