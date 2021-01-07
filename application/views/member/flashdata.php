    <? if($this->session->flashdata('msg_error')){ ?>
        <div class="alert alert-danger" align="center" role="alert"><? echo $this->session->flashdata('msg_error'); ?></div>
    <? } else if($this->session->flashdata('msg_warning')){ ?>
        <div class="alert alert-warning" align="center" role="alert"><? echo $this->session->flashdata('msg_warning'); ?></div>
    <? } else if($this->session->flashdata('msg_ok')){  ?>
        <div class="alert alert-success" align="center" role="alert"><? echo $this->session->flashdata('msg_ok'); ?></div>
    <? } else {  } ?>