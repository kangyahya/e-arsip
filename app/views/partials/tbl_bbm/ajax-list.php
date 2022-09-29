<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_bbm/add");
$can_edit = ACL::is_allowed("tbl_bbm/edit");
$can_view = ACL::is_allowed("tbl_bbm/view");
$can_delete = ACL::is_allowed("tbl_bbm/delete");
?>
<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
$counter++;
?>
<tr>
    <?php if($can_delete){ ?>
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <?php } ?>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-tanggal">
            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['tanggal']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="tanggal" 
                data-title="Enter Tanggal" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tanggal']; ?> 
            </span>
        </td>
        <td class="td-bulan"> <?php echo $data['bulan']; ?></td>
        <td class="td-kendaraan">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kendaraan']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="kendaraan" 
                data-title="Enter Kendaraan" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['kendaraan']; ?> 
            </span>
        </td>
        <td class="td-item_biaya">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['item_biaya']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="item_biaya" 
                data-title="Enter Item Biaya" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['item_biaya']; ?> 
            </span>
        </td>
        <td class="td-harga_satuan">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['harga_satuan']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="harga_satuan" 
                data-title="Enter Harga Satuan" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['harga_satuan']; ?> 
            </span>
        </td>
        <td class="td-qty">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['qty']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="qty" 
                data-title="Enter Qty" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['qty']; ?> 
            </span>
        </td>
        <td class="td-satuan">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['satuan']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_bbm/editfield/" . urlencode($data['id'])); ?>" 
                data-name="satuan" 
                data-title="Enter Satuan" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['satuan']; ?> 
            </span>
        </td>
        <td class="td-total_biaya"> <?php echo $data['total_biaya']; ?></td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("tbl_bbm/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("tbl_bbm/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("tbl_bbm/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                <i class="fa fa-times"></i>
                Delete
            </a>
            <?php } ?>
        </th>
    </tr>
    <?php 
    }
    ?>
    <?php
    } else {
    ?>
    <td class="no-record-found col-12" colspan="100">
        <h4 class="text-muted text-center ">
            No Record Found
        </h4>
    </td>
    <?php
    }
    ?>
    