    <? if($this->session->flashdata('msg_error')){ ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '<? echo $this->session->flashdata('msg_error'); ?>',
                showConfirmButton: false,
                timer: 2000
                })
        </script>
    <? } else if($this->session->flashdata('msg_warning')){ ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: '<? echo $this->session->flashdata('msg_warning'); ?>',
                showConfirmButton: false,
                timer: 2000
                })
        </script>
    <? } else if($this->session->flashdata('msg_ok')){  ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '<? echo $this->session->flashdata('msg_ok'); ?>',
                showConfirmButton: false,
                timer: 2000
                })
        </script>
    <? } else {  } ?>