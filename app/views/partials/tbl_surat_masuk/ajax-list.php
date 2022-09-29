<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_surat_masuk/add");
$can_edit = ACL::is_allowed("tbl_surat_masuk/edit");
$can_view = ACL::is_allowed("tbl_surat_masuk/view");
$can_delete = ACL::is_allowed("tbl_surat_masuk/delete");
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
$rec_id = (!empty($data['no_surat']) ? urlencode($data['no_surat']) : null);
$counter++;
?>
<tr>
    <?php if($can_delete){ ?>
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['no_surat'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <?php } ?>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-id">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['id']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="id" 
                data-title="Enter Id" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['id']; ?> 
            </span>
        </td>
        <td class="td-no_surat"><a href="<?php print_link("tbl_surat_masuk/view/$data[no_surat]") ?>"><?php echo $data['no_surat']; ?></a></td>
        <td class="td-tgl_surat">
            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['tgl_surat']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="tgl_surat" 
                data-title="Enter Tgl Surat" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tgl_surat']; ?> 
            </span>
        </td>
        <td class="td-tgl_diterima">
            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['tgl_diterima']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="tgl_diterima" 
                data-title="Enter Tgl Diterima" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tgl_diterima']; ?> 
            </span>
        </td>
        <td class="td-perihal">
            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="perihal" 
                data-title="Enter Perihal" 
                data-placement="left" 
                data-toggle="click" 
                data-type="textarea" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['perihal']; ?> 
            </span>
        </td>
        <td class="td-sifat">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sifat']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="sifat" 
                data-title="Enter Sifat" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['sifat']; ?> 
            </span>
        </td>
        <td class="td-lampiran">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['lampiran']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="lampiran" 
                data-title="Enter Lampiran" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['lampiran']; ?> 
            </span>
        </td>
        <td class="td-file">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['file']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="file" 
                data-title="Browse..." 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['file']; ?> 
            </span>
        </td>
        <td class="td-kode_instansi">
            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/tbl_surat_masuk_kode_instansi_option_list'); ?>' 
                data-value="<?php echo $data['kode_instansi']; ?>" 
                data-pk="<?php echo $data['no_surat'] ?>" 
                data-url="<?php print_link("tbl_surat_masuk/editfield/" . urlencode($data['no_surat'])); ?>" 
                data-name="kode_instansi" 
                data-title="Select a value ..." 
                data-placement="left" 
                data-toggle="click" 
                data-type="select" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['kode_instansi']; ?> 
            </span>
        </td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("tbl_surat_masuk/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("tbl_surat_masuk/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("tbl_surat_masuk/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    