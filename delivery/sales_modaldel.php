<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title" id="myModalLabel">NAME OF RESTAURANT</h3></center>
                <center><h3 class="modal-title" id="myModalLabel">ADDRESS</h3></center>
                <center><h3 class="modal-title" id="myModalLabel">PHONE NUMBER</h3></center>
                <br><br>
                <center><h4 class="modal-title" id="myModalLabel">Order Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        
                        $email = $row['customer'];
                        $sql1 = "SELECT * FROM usertable WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql1);
                        $row2 = mysqli_fetch_assoc($result);
                    ?>
                    <h5>Customer: <b><?php echo $row2['first_name']. " " .$row2['last_name']; ?></b>
                    <h5>Mobile Number: <b><?php echo $row2['mobile']; ?></b></h5>
                    <h5>Address: <b><?php echo $row2['address']; ?></b></h5>
                    <h5>House Number: <b><?php echo $row2['house_number']; ?></b></h5>
                        </h5><b><span class="pull-right" style="margin-top: -102px;">
                            <?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?>
                        </span></b>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['productname']; ?></td>
                                        <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td class="text-right"><?php echo $drow['quantity']; ?></td>
                                        <td class="text-right">&#8369;
                                            <?php
                                                $subt = $drow['price']*$drow['quantity'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
