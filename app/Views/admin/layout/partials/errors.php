<?php if(session()->has('error')){ ?>
    <?php if (is_array(session()->error)){ ?>
        <?php foreach (session()->error as $key => $value){ ?>
            <div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?= $value; ?>
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                <?= session()->error; ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php if(session()->has('success')){ ?>
    <?php if (is_array(session()->success)){ ?>
        <?php foreach (session()->success as $key => $value){ ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?= $value; ?>
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                <?= session()->success; ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>
