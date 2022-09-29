<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_users/add");
$can_edit = ACL::is_allowed("tbl_users/edit");
$can_view = ACL::is_allowed("tbl_users/view");
$can_delete = ACL::is_allowed("tbl_users/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">My Account</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_pengguna']) ? urlencode($data['id_pengguna']) : null);
                        $counter++;
                        ?>
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar">
                                    <?php 
                                    if(!empty(USER_PHOTO)){
                                    Html::page_img(USER_PHOTO, 100, 100); 
                                    }
                                    ?>
                                </div>
                                <h1 class="title mt-4"><?php echo $data['username']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="fa fa-user"></i> Account Detail
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="fa fa-edit"></i> Edit Account
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangeEmail" class="nav-link">
                                                <i class="fa fa-envelope"></i> Change Email
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="fa fa-key"></i> Reset Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                            <table class="table table-hover table-borderless table-striped">
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <tr  class="td-id_pengguna">
                                                        <th class="title"> Id Pengguna: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['id_pengguna']; ?>" 
                                                                data-pk="<?php echo $data['id_pengguna'] ?>" 
                                                                data-url="<?php print_link("tbl_users/editfield/" . urlencode($data['id_pengguna'])); ?>" 
                                                                data-name="id_pengguna" 
                                                                data-title="Enter Id Pengguna" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="number" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['id_pengguna']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-username">
                                                        <th class="title"> Username: </th>
                                                        <td class="value">
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
                                                    </tr>
                                                    <tr  class="td-nama_lengkap">
                                                        <th class="title"> Nama Lengkap: </th>
                                                        <td class="value">
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
                                                    </tr>
                                                    <tr  class="td-email">
                                                        <th class="title"> Email: </th>
                                                        <td class="value"> <?php echo $data['email']; ?></td>
                                                    </tr>
                                                    <tr  class="td-last_login">
                                                        <th class="title"> Last Login: </th>
                                                        <td class="value">
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
                                                    </tr>
                                                    <tr  class="td-user_role_id">
                                                        <th class="title"> User Role Id: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/account_user_role_id_option_list'); ?>' 
                                                                data-value="<?php echo $data['user_role_id']; ?>" 
                                                                data-pk="<?php echo $data['id_pengguna'] ?>" 
                                                                data-url="<?php print_link("tbl_users/editfield/" . urlencode($data['id_pengguna'])); ?>" 
                                                                data-name="user_role_id" 
                                                                data-title="Select a value ..." 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="select" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['user_role_id']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-date_created">
                                                        <th class="title"> Date Created: </th>
                                                        <td class="value"> <?php echo $data['date_created']; ?></td>
                                                    </tr>
                                                    <tr  class="td-date_updated">
                                                        <th class="title"> Date Updated: </th>
                                                        <td class="value"> <?php echo $data['date_updated']; ?></td>
                                                    </tr>
                                                </tbody>    
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/edit"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="AccountPageChangeEmail" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/change_email"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("passwordmanager"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="fa fa-ban"></i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
