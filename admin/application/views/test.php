<table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <th>SFID</th>
            <th>Company</th>
            <th>Product</th>
            <th>Product Line</th>
            <th>Dealer Class</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
        $query = "SELECT * FROM tblcustomer";
        $result = mysql_query($query);
        $i=1;
        while($row = mysql_fetch_assoc($result))
        {
    ?>
            <tr>
    <?php $rowID = $row['SFID']; ?>

                <td><?php echo $row['SFID']; ?></td>
                <td><?php echo $row['CompanyName']; ?></td>
                <td><?php echo $row['Product']; ?></td>
                <td><?php echo $row['ProductLine']; ?></td>
                <td><?php echo $row['DealerClass']; ?></td>
                <td><?php echo $row['RequestStatus']; ?></td>
                <td style="text-align: center">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <a class="btn btn-danger" href="#delModal"  data-toggle="modal"><i class="icon-trash icon-white"></i> Delete</a>

                            <a class="btn update" href="#editModal<?php echo$i?>" data-sfid='"<?php echo $row['SFID'];?>"' data-toggle="modal">Edit</a>
                            <!--Yor Edit Modal Goes Here-->
                            <div id="editModal<?php echo $i; ?>" class="modal hide fade in" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-header">
                                <a class="close" data-dismiss="modal">×</a>
                                <h3>Edit Customer Details</h3>
                            </div>
                             <div>
                            <form class="contact">
                               <fieldset>
                                <div class="modal-body">
                                    <?php echo $row['SFID']; ?> 
                                    <ul class="nav nav-list">
                                    <li class="nav-header">SFID</li>
                                    <li><input class="input-xlarge" type="text" name="mysfid" id="mysfid"></li>
                                    <!--<li class="nav-header">Company</li>
                                    <li><input class="input-xlarge" value=" " type="text" name="mycompany"></li>
                                    <li class="nav-header">Dealer Class</li>
                                    <li><input class="input-xlarge" value=" " type="text" name="mydealerclass"></li> -->
                                    </ul> 
                                 </div>
                                </fieldset>
                            </form>
                             </div>
                             <div class="modal-footer">
                                <button class="btn btn-success" id="submit">Approved</button>
                                  <a href="#" class="btn" data-dismiss="modal">Close</a>
                             </div>
                            </div>

                             </div>
                    </div>
                </td>
             </tr>
     <?php $i++; } ?>
 </table>