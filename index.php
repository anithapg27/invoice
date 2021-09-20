<?php 
include("header.php");
include("config.php");
$sql="SELECT * FROM `orders` order by idOrder desc ";
$result = mysqli_query($db, $sql);	
//$row = mysqli_fetch_array($result);
?>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>List</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="addinvoice.php" class="btn btn-primary"><span>Create Invoice</span></a>
                    </div>
                </div>
            </div>
          
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Order Date</th>						
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                    <?php $cnt=0;
	while ($row = mysqli_fetch_assoc($result)){$cnt++; ?>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $row['customerName'];?></td>
                        <td><?php echo $row['ordeDate'];?></td>                        
                        <td>$<?php echo $row['totalAmount'];?></td>
                        <td><a href="viewinvoice.php?inv=<?php echo $row['idOrder'];?>" target="_blank" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                        <?php }?>
                    </tr>
                    
                </tbody>
            </table>
            <!--<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>-->
        </div>
    </div>        
</div>     
<?php include('footer.php');?>