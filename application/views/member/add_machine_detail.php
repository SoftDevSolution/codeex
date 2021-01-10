<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add New Machine Detail</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        
        <? $this->load->view("member/navbar"); ?>
        
        <? $this->load->view("member/menusidebar"); ?>
        
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Add New Machine Detail</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Machine Detail</li>
                        </ol>
                        </div>
                        <div class="card">
                            <div
                                div class="card-body">
        <form action="<? echo base_url(); ?>member/add_new_machine_detail" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="mch_detail_ink_no">Default Ink No.</label>
                    <input type="text" class="form-control" id="mch_detail_ink_no" name="mch_detail_ink_no" placeholder="Default Ink No." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_make_up_no">Default Make Up No.</label>
                    <input type="text" class="form-control" id="mch_detail_make_up_no" name="mch_detail_make_up_no" placeholder="Default Make Up No." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_clean_no">Default Cleaning No.</label>
                    <input type="text" class="form-control" id="mch_detail_clean_no" name="mch_detail_clean_no" placeholder="Default Cleaning No." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_tube_sn">Tube S/N</label>
                    <input type="text" class="form-control" id="mch_detail_tube_sn" name="mch_detail_tube_sn" placeholder="Tube S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_nozzle_sn">Nozzle S/N</label>
                    <input type="text" class="form-control" id="mch_detail_nozzle_sn" name="mch_detail_nozzle_sn" placeholder="Nozzle S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_main_pcb_sn">Main PCB S/N</label>
                    <input type="text" class="form-control" id="mch_detail_main_pcb_sn" name="mch_detail_main_pcb_sn" placeholder="Main PCB S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_power_supply_sn">Power Supply S/N</label>
                    <input type="text" class="form-control" id="mch_detail_power_supply_sn" name="mch_detail_power_supply_sn" placeholder="Power Supply S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_display_sn">Display S/N</label>
                    <input type="text" class="form-control" id="mch_detail_display_sn" name="mch_detail_display_sn" placeholder="Display S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_ink_core_sn">Ink Core S/N</label>
                    <input type="text" class="form-control" id="mch_detail_ink_core_sn" name="mch_detail_ink_core_sn" placeholder="Ink Core S/N" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_warranty_year">Warranty from Company ( Year )</label>
                    <input type="text" class="form-control" id="mch_detail_warranty_year" name="mch_detail_warranty_year" placeholder="Year">
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_warranty_start_date">Warranty from Company ( Date Start )</label>
                    <input type="date" class="form-control" id="mch_detail_warranty_start_date" name="mch_detail_warranty_start_date" placeholder="Warranty from Company ( Date Start)">
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_warranty_stop_date">Warranty from Company ( Date Stop )</label>
                    <input type="date" class="form-control" id="mch_detail_warranty_stop_date" name="mch_detail_warranty_stop_date" placeholder="Warranty from Company ( Date Stop )">
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_pic_path">Pictures</label>
                    <input type="file" class="form-control" id="mch_detail_pic_path" name="mch_detail_pic_path" placeholder="Pictures">
                </div>
                <div class="form-group col-md-4">
                    <label for="mch_detail_warranty_sta">Warranty (Y/N)</label>
                    <select class="form-control" name="mch_detail_warranty_sta" id="mch_detail_warranty_sta">
                        <option value="">-- Select --</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="company_id">Factory ID</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option value="">-- Select --</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="mch_detail_remark">Note/Remark</label>
                    <textarea class="form-control" name="mch_detail_remark" id="mch_detail_remark" placeholder="Note/Remark"></textarea>
                </div>
            </div>

            <center>
            <hr>
            <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">Reset</button>
            </center>
        </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <? $this->load->view("member/footer"); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <? $this->load->view("member/script_js"); ?>

</body>
 
</html>