<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_surat_keluar/add");
$can_edit = ACL::is_allowed("tbl_surat_keluar/edit");
$can_view = ACL::is_allowed("tbl_surat_keluar/view");
$can_delete = ACL::is_allowed("tbl_surat_keluar/delete");
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
                    <h4 class="record-title">View  Tbl Surat Keluar</h4>
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
                        $rec_id = (!empty($data['no_surat']) ? urlencode($data['no_surat']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-no_surat">
                                        <th class="title"> No Surat: </th>
                                        <td class="value"> <?php echo $data['no_surat']; ?></td>
                                    </tr>
                                    <tr  class="td-tgl_surat">
                                        <th class="title"> Tgl Surat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['tgl_surat']; ?>" 
                                                data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-perihal">
                                        <th class="title"> Perihal: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-sifat">
                                        <th class="title"> Sifat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sifat']; ?>" 
                                                data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-lampiran">
                                        <th class="title"> Lampiran: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['lampiran']; ?>" 
                                                data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-kode_instansi">
                                        <th class="title"> Kode Instansi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/tbl_surat_keluar_kode_instansi_option_list'); ?>' 
                                                data-value="<?php echo $data['kode_instansi']; ?>" 
                                                data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-no_surat_masuk">
                                        <th class="title"> No Surat Masuk: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/tbl_surat_keluar_no_surat_masuk_option_list'); ?>' 
                                                data-value="<?php echo $data['no_surat_masuk']; ?>" 
                                                data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
                                                data-name="no_surat_masuk" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_surat_masuk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-file">
                                        <th class="title"> File: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['no_surat'] ?>" 
                                                data-url="<?php print_link("tbl_surat_keluar/editfield/" . urlencode($data['no_surat'])); ?>" 
                                                data-name="file" 
                                                data-title="Enter File" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['file']; ?> 
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
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("tbl_surat_keluar/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("tbl_surat_keluar/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
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
