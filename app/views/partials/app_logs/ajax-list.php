<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("app_logs/add");
$can_edit = ACL::is_allowed("app_logs/edit");
$can_view = ACL::is_allowed("app_logs/view");
$can_delete = ACL::is_allowed("app_logs/delete");
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
$rec_id = (!empty($data['log_id']) ? urlencode($data['log_id']) : null);
$counter++;
?>
<tr>
    <th class="td-sno"><?php echo $counter; ?></th>
    <td class="td-log_id"><a href="<?php print_link("app_logs/view/$data[log_id]") ?>"><?php echo $data['log_id']; ?></a></td>
    <td class="td-Timestamp"> <?php echo $data['Timestamp']; ?></td>
    <td class="td-Action"> <?php echo $data['Action']; ?></td>
    <td class="td-TableName"> <?php echo $data['TableName']; ?></td>
    <td class="td-RecordID"> <?php echo $data['RecordID']; ?></td>
    <td class="td-SqlQuery"> <?php echo $data['SqlQuery']; ?></td>
    <td class="td-UserID"> <?php echo $data['UserID']; ?></td>
    <td class="td-ServerIP"> <?php echo $data['ServerIP']; ?></td>
    <td class="td-RequestUrl"> <?php echo $data['RequestUrl']; ?></td>
    <td class="td-RequestData"> <?php echo $data['RequestData']; ?></td>
    <td class="td-RequestCompleted"> <?php echo $data['RequestCompleted']; ?></td>
    <td class="td-RequestMsg"> <?php echo $data['RequestMsg']; ?></td>
    <th class="td-btn">
        <?php if($can_view){ ?>
        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("app_logs/view/$rec_id"); ?>">
            <i class="fa fa-eye"></i> View
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
