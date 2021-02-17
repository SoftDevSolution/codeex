<?
    $datenow = date("Y-m-d");
?>

<div class="section-block" id="basicform">
    <h4 style="margin: 10px 20px;">Add New Inventory</h4>
</div>
<form action="<? echo base_url(); ?>member/machine/data_add_machine" method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="machine_type_id">Machine Type <span class="text-danger">*</span></label>
            <select class="form-control" name="machine_type_id" id="machine_type_id" required>
                <option value="">-- Select --</option>
                <? foreach ($query_machine_type as $mtype) { ?>
                <option value="<? echo $mtype->machine_type_id; ?>">
                    <? echo $mtype->machine_type_name; ?>
                </option>
                <? } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="model_id">Machine Model</label>
            <select class="form-control" name="model_id" id="model_id">
                <option value="">-- Select --</option>
                <? foreach ($query_machine_model as $machine) { ?>
                <option value="<? echo $machine->model_id; ?>">
                    <? echo $machine->model_name; ?>
                </option>
                <? } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="machine_status">Machine Status</label>
            <input type="text" class="form-control" id="machine_status" name="machine_status" placeholder="Machine Status" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="machine_serial_no">Machine S/N</label>
            <input type="text" class="form-control" id="machine_serial_no" name="machine_serial_no" placeholder="Machine S/N" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="brand_id">Brand</label>
            <select class="form-control" name="brand_id" id="brand_id">
                <option value="">-- Select --</option>
                <? foreach ($query_machine_brand as $brand) { ?>
                <option value="<? echo $brand->brand_id; ?>">
                    <? echo $brand->brand_name; ?>
                </option>
                <? } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="machine_price">Price</label>
            <input type="number" class="form-control" id="machine_price" name="machine_price" placeholder="Price" value="0" onkeypress="return IsNumeric(event,'price');">
            <span id="price" style="color: Red; display: none">* Please enter number (0 - 9)</span>
        </div>
        <div class="form-group col-md-6">
            <label for="machine_stock">Quantity</label>
            <input type="number" class="form-control" id="machine_stock" name="machine_stock" placeholder="Quantity" value="0" onkeypress="return IsNumeric(event,'stock');">
            <span id="stock" style="color: Red; display: none">* Please enter number (0 - 9)</span>
        </div>
        <div class="form-group col-md-6">
            <label for="machine_sup_inv_no">Supplier Inv. No.</label>
            <input type="text" class="form-control" id="machine_sup_inv_no" name="machine_sup_inv_no" placeholder="Supplier Inv. No." autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="machine_sup_inv_date">Supplier Inv. Date</label>
            <input type="date" class="form-control" id="machine_sup_inv_date" name="machine_sup_inv_date" placeholder="Date" value="<? echo date("Y-m-d"); ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_start_date">Warranty from Supplier ( Date Start)</label>
            <input type="date" class="form-control" id="machine_warranty_start_date" name="machine_warranty_start_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Supplier ( Date
            Start)" onchange="cal_warranty();">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_stop_date">Warranty from Supplier ( Date Stop)</label>
            <input type="date" class="form-control" id="machine_warranty_stop_date" name="machine_warranty_stop_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Supplier ( Date
            Stop)" onchange="cal_warranty();">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_year">Warranty from Supplier ( Days )</label>
            <input type="number" max="4" class="form-control" id="machine_warranty_year" name="machine_warranty_year" placeholder="Days" autocomplete="off" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="machine_company_inv_no">Factory Inv No.</label>
            <input type="text" class="form-control" id="machine_company_inv_no" name="machine_company_inv_no" placeholder="Supplier Inv. No." autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="machine_company_inv_date">Factory Inv Date</label>
            <input type="date" class="form-control" id="machine_company_inv_date" name="machine_company_inv_date" value="<? echo date("Y-m-d"); ?>" placeholder="Date">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_comp_start_date">Warranty from Factory ( Date Start )</label>
            <input type="date" class="form-control" id="machine_warranty_comp_start_date" name="machine_warranty_comp_start_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Company
            ( Date Start)" onchange="cal_warranty_company();">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_comp_stop_date">Warranty from Factory ( Date Stop )</label>
            <input type="date" class="form-control" id="machine_warranty_comp_stop_date" name="machine_warranty_comp_stop_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Company (
            Date Stop )" onchange="cal_warranty_company();">
        </div>
        <div class="form-group col-md-4">
            <label for="machine_warranty_comp_year">Warranty from Factory ( Days )</label>
            <input type="text" class="form-control" id="machine_warranty_comp_year" name="machine_warranty_comp_year" placeholder="Days" readonly>
        </div>
    </div>

    <center>
        <hr>
        <input type="hidden" name="invoice_id" value="<? $id_invoice = $this->uri->segment(4);  if(empty($id_invoice) or $id_invoice==""){ echo " 0"; } else { echo $id_invoice; }?>">
        <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-warning">Reset</button>
    </center>
</form>

<script>
function cal_warranty() {
    if ($('#machine_warranty_start_date').val() != "" && $('#machine_warranty_stop_date').val() != "") {
        var dateStart = new Date($("#machine_warranty_start_date").val());
        var dateEnd = new Date($("#machine_warranty_stop_date").val())
        var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());

        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        $("#machine_warranty_year").val(diffDays);
    }
}

function cal_warranty_company() {
    if ($('#machine_warranty_comp_start_date').val() != "" && $('#machine_warranty_comp_stop_date').val() != "") {
        var dateStart = new Date($("#machine_warranty_comp_start_date").val());
        var dateEnd = new Date($("#machine_warranty_comp_stop_date").val())
        var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());

        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        $("#machine_warranty_comp_year").val(diffDays);
    }
}
</script>
