<?php 
include("header.php");
include("config.php");
?>
<div class="container-xl">
<form name="invoicefrm" id="invoicefrm" method="post" action="saveinvoice.php">
<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title">Add Invoice</h2>
				</div>		    		
			</div>
            <div class="row">
            
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-danger" style="display:none;"></div>
                <h3>To,</h3>
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
                        <td>
                        <div class="form-group">
						<input type="text" class="form-control" name="customerName" id="customerName" placeholder="Customer Name" autocomplete="off" required>
					</div>
                        </td>
                        <td>
                        <div class="form-group">
						<textarea class="form-control" rows="3" name="address" id="address" placeholder="Address" required></textarea>
					</div>
                        </td>
                        </tr>
                        </table>
                        </div>
                        </div>

            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="38%">Item Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>	
                            <th width="15%">Tax(%)</th>
                            <!--<th width="15%">Discount</th>-->							
							<th width="15%"></th>
						</tr>							
						<tr>
							<td><input type="text" name="itemName" id="itemName" class="form-control" autocomplete="off" ></td>			
							<td><input type="number" name="quantity" id="quantity" class="form-control" autocomplete="off" ></td>
							<td><input type="number" name="price" id="price" class="form-control" autocomplete="off" ></td>
							<td>
                             <select class="form-control" name="tax" id="tax">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>							
                            </select>
                            </td>
                           
                            <td><input type="button" value="Add" class="btn btn-success" id="btnsave"></td>
						</tr>						
					</table>
				</div>
			</div>
            
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                   
                </div>
            </div>
            
            <table class="table table-striped table-hover tbl-order">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>						
                        <th>Tax(%)</th>						
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <!-- <tr>
                        <td>1</td>
                        <td>Michael Holz</a></td>
                        <td>London</td>
                        <td>Jun 15, 2017</td>                        
                        <td>Delivered</td>
                        <td>$254</td>
                        <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>-->
                   
                </tbody>
            </table>

        </div>
    </div> 
    <div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency"></div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" readonly>
							</div>
						</div><br>
						<div class="form-group">
							<label>Total Tax: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" readonly>
							</div>
						</div><br>
						<div class="form-group">
							<label>Subtotal with Tax : &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency"></div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" readonly>
							</div>
						</div><br>
                        <div class="form-group">
							<label>Discount&nbsp;</label>
							<div class="input-group">
                            <select class="form-control" name="discount" id="discount">
                            <option value="per">%</option>
                            <option value="amount">Amount</option>
                            </select>
								<input value="" type="number" class="form-control" name="discountrate" id="discountrate" placeholder="">
							</div>
						</div>	
                        						<br>
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency"></div>
                                <input value="" type="hidden" class="form-control" name="hitotalAmount" id="hitotalAmount">
								<input value="" type="number" class="form-control" name="totalAmount" id="totalAmount" placeholder="Total" readonly>
							</div>
						</div>
						
						
                    <div class="form-group">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Generate Invoice" class="btn btn-success submit_btn invoice-save-btm">						
					</div>
				</div>
			</div>       
            </form>
</div>     
<?php include('footer.php');?>
<script type="text/javascript">
$(document).ready(function() {
	var count = 1;var invsubtotal=0;var invtotaltax=0;var invtotal=0;
	$("#discountrate,#discount").change(function(e) {
        var type=$('#discount').val();
		var rate=$('#discountrate').val();
		var nettot=$("#hitotalAmount").val();
		if(rate!="")
		{
		if(type=="per")
		{
			var perrate=nettot*(rate/100);
			var tot=parseFloat(nettot-perrate).toFixed(2);
		}
		if(type=="amount")
		{
			var tot=parseFloat(nettot-rate).toFixed(2);
		}
		$("#totalAmount").val(tot);
		}
		else
		{
			$("#totalAmount").val($("#hitotalAmount").val());
		}
		
    });
	$('#btnsave').click(function() {
        if($('#customerName').val()=="" || $('#itemName').val()=="" || $('#quantity').val()=="" ||$('#price').val()=="" )
		{
			$('.alert').show();
			$('.alert').html("Please fill in all fields");
		}
		else
		{
			$('.alert').hide();
		var price=$('#price').val();
		var qty=$('#quantity').val();
		var tax=$('#tax').val();
		var subtotal=price*qty;
		var taxrate=subtotal*(tax/100);
		var totalAmount=subtotal+taxrate;
		invsubtotal=invsubtotal+subtotal;
		invtotaltax=invtotaltax+taxrate;
		invtotal=invtotal+totalAmount;
		 $('.tbl-order').append('<tr><td>'+count+' </td><td> '+$('#itemName').val()+'<input type="hidden" name="name[]" id="name_'+count+'" value="'+$('#itemName').val()+'"> </td><td> '+$('#quantity').val()+' <input type="hidden" name="qnty[]" id="qnty'+count+'" value="'+$('#quantity').val()+'"></td><td> '+price+' <input type="hidden" name="prce[]" id="prce_'+count+'" value="'+price+'"></td><td> '+tax+' <input type="hidden" name="tx[]" id="tx_'+count+'" value="'+tax+'"></td><td>'+totalAmount+' <input type="hidden" name="totamnt[]" id="totamnt_'+count+'" value="'+totalAmount+'"></td><td> </td></tr>');
		 count++;
		 $("#subTotal").val(parseFloat(invsubtotal).toFixed(2));
		 $("#taxRate").val(parseFloat(invtotaltax).toFixed(2));
		 $("#taxAmount").val(parseFloat(invtotal).toFixed(2));
		 $("#totalAmount").val(parseFloat(invtotal).toFixed(2));
		 $("#hitotalAmount").val(invtotal);
		 $('#itemName').val("")
		 $('#price').val("")
		 $('#quantity').val("");
		  $('#tax').val("");
		}
		
		//$("#btnsave").attr("disabled", "disabled");
		//var invdata = $("#invoicefrm").serialize();alert(invdata);
		//return false;
			/*$.ajax({
				url: "saveinvoice.php",
				type: "POST",
				data: {
					name: $('#customerName').val(),
					address: $('#address').val(),
					itemname: $('#productName').val(),
					quantity: $('#quantity').val(),
					price: $('#price').val(),
					tax:$('#tax').val()			
				},
				//dataType: "json",
				cache: false,
				success : function(data) {    
  console.log("data :"+data);
},
 error: function()
 {
}
			});*/
		
});});
</script>
