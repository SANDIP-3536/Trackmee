<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12" style="text-align:right;">
        <div class="title-action">
            <!-- <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
            <a href="#" class="btn btn-white"><i class="fa fa-check "></i> Save </a> -->
            <a href="invoice_print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Receipt </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <?php foreach ($fee_details as $key) { ?>
                <div class="row">
                    <img src="<?=$key['school_leaving_certificate_header'] ?>" width="100%">
                    <br>
                </div>
                    <div class="row">
                        <br>
                        <div class="col-sm-6">
                            <h4>Invoice No.</h4>
                            <h4 class="text-navy">INV-000567F7-00</h4>
                        </div>

                        <div class="col-sm-6 text-right">
                            <address>
                                <strong><?=$key['student_first_name'] ?>&nbsp<?=$key['student_middle_name'] ?>&nbsp<?=$key['student_last_name'] ?></strong><br>
                                112 Street Avenu, 1080<br>
                                Miami, CT 445611<br>
                                <abbr title="Phone">P:</abbr> (120) 9000-4321
                            </address>
                            <p>
                                <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                                <span><strong>Due Date:</strong> March 24, 2014</span>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="table-responsive m-t">
                        <table class="table invoice-table">
                            <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Tax</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><div><strong>Admin Theme with psd project layouts</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                <td>1</td>
                                <td>$26.00</td>
                                <td>$5.98</td>
                                <td>$31,98</td>
                            </tr>
                            <tr>
                                <td><div><strong>Wodpress Them customization</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </small></td>
                                <td>2</td>
                                <td>$80.00</td>
                                <td>$36.80</td>
                                <td>$196.80</td>
                            </tr>
                            <tr>
                                <td><div><strong>Angular JS & Node JS Application</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                <td>3</td>
                                <td>$420.00</td>
                                <td>$193.20</td>
                                <td>$1033.20</td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>$1026.00</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>$235.98</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>$1261.98</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <!-- <button class="btn btn-primary"></button> -->
                    </div>
                    <div><br></div>
                    <div>
                        <img src="<?=$key['school_leaving_certificate_footer'] ?>" width="100%">
                    </div>
                </div>
        </div>
    </div>
</div>