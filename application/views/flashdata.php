    <? if($this->session->flashdata('msg_error')){ ?>
        <div id="alertme" class="alert alert-danger" align="center" role="alert"><? echo $this->session->flashdata('msg_error'); ?></div>
    <? } else if($this->session->flashdata('msg_ok')){ ?>
        <div id="alertme" class="alert alert-success" align="center" role="alert"><? echo $this->session->flashdata('msg_ok'); ?></div>
    <? } else {  } ?>