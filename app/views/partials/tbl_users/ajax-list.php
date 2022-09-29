<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_users/add");
$can_edit = ACL::is_allowed("tbl_users/edit");
$can_view = ACL::is_allowed("tbl_users/view");
$can_delete = ACL::is_allowed("tbl_users/delete");
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
$rec_id = (!empty($data['id_pengguna']) ? urlencode($data['id_pengguna']) : null);
$counter++;
?>
<tr>
    <?php if($can_delete){ ?>
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_pengguna'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <?php } ?>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-username">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['username']; ?>" 
                data-pk="<?php echo $data['id_pengguna'] ?>" 
                data-url="<?php print_link("tbl_users/editfield/" . urlencode($data['id_pengguna'])); ?>" 
                data-name="username" 
                data-title="Enter Username" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['username']; ?> 
            </span>
        </td>
        <td class="td-nama_lengkap">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_lengkap']; ?>" 
                data-pk="<?php echo $data['id_pengguna'] ?>" 
                data-url="<?php print_link("tbl_users/editfield/" . urlencode($data['id_pengguna'])); ?>" 
                data-name="nama_lengkap" 
                data-title="Enter Nama Lengkap" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['nama_lengkap']; ?> 
            </span>
        </td>
        <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
        <td class="td-photo"><?php Html :: page_img($data['photo'],50,50,1); ?></td>
        <td class="td-last_login">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['last_login']; ?>" 
                data-pk="<?php echo $data['id_pengguna'] ?>" 
                data-url="<?php print_link("tbl_users/editfield/" . urlencode($data['id_pengguna'])); ?>" 
                data-name="last_login" 
                data-title="Enter Last Login" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['last_login']; ?> 
            </span>
        </td>
        <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
        <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("tbl_users/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("tbl_users/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("tbl_users/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    