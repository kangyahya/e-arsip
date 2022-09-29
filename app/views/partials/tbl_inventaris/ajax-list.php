<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_inventaris/add");
$can_edit = ACL::is_allowed("tbl_inventaris/edit");
$can_view = ACL::is_allowed("tbl_inventaris/view");
$can_delete = ACL::is_allowed("tbl_inventaris/delete");
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
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-kode_produk">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kode_produk']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
                data-name="kode_produk" 
                data-title="Enter Kode Produk" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['kode_produk']; ?> 
            </span>
        </td>
        <td class="td-nama_produk">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_produk']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
                data-name="nama_produk" 
                data-title="Enter Nama Produk" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['nama_produk']; ?> 
            </span>
        </td>
        <td class="td-satuan">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['satuan']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-stok_awal">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['stok_awal']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
                data-name="stok_awal" 
                data-title="Enter Stok Awal" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['stok_awal']; ?> 
            </span>
        </td>
        <td class="td-stok_in">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['stok_in']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
                data-name="stok_in" 
                data-title="Enter Stok In" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['stok_in']; ?> 
            </span>
        </td>
        <td class="td-stok_out">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['stok_out']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("tbl_inventaris/editfield/" . urlencode($data['id'])); ?>" 
                data-name="stok_out" 
                data-title="Enter Stok Out" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['stok_out']; ?> 
            </span>
        </td>
        <td class="td-stok_akhir"> <?php echo $data['stok_akhir']; ?></td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("tbl_inventaris/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("tbl_inventaris/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("tbl_inventaris/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    