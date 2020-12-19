<!-- Add Product -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Product Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pname" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Category:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="category">
                                        <?php
                                            $sql="select * from category order by categoryid asc";
                                            $query=$conn->query($sql);
                                            while($row=$query->fetch_array()){
                                        ?>
                                                <option value="<?php echo $row['categoryid']; ?>"><?php echo $row['catname']; ?></option>
                                                <?php
                                            }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Price:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-12" style="margin-top:7px;">
                                    <label class="control-label">For Item Profile Give Product Attributes (Max Limit is 10):</label><br>
                                    <div class="col-md-4" style="margin-top:8px;">
                                        <label class="control-label">CHI</label><input type="text" class="form-control" name="chi" required>
                                    </div>
                                    <div class="col-md-4" style="margin-top:8px;">
                                        <label class="control-label">BUF</label><input type="text" class="form-control" name="buf" required>
                                    </div>
                                    <div class="col-md-4" style="margin-top:8px;">
                                        <label class="control-label">VEGG</label><input type="text" class="form-control" name="vegg" required>
                                    </div>
                                </div>
                            </div>  
                        </div>                 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Photo:</label>
                                </div>
                                <div class="col-md-9" style="margin-top:7px;">
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </div>
                    </div>
			     </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Category</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addcategory.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="cname" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
