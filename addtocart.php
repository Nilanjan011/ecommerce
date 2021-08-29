<?php
// include('admin/connection.php');
// include('admin/function.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Big store a Ecommerce Online Shopping</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<!--- start-rate -->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate -->
<!--Include the above in your HEAD tag -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<style type="text/css">
	.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
</style>

</head>
<body>
<!-- <a href="offer.html"><img src="images/download.png" class="img-head" alt=""></a> -->
<!--header -->
<?php include 'header.php';?>

	<div class="container">
	
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th class="text-center">Subtotal</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$ip=$_SERVER['REMOTE_ADDR'];
			if (isset($_SESSION['uid'])) {
				$sql1="SELECT * FROM `tmp_cart` WHERE `cusid`='".$_SESSION['uid']."' AND `ipaddress`='$ip'";
				
			} else {
				$sql1="SELECT * FROM `tmp_cart` WHERE `cusid`='' AND`ipaddress`='$ip'";
			}
			
			$amt=0;
			$res1=mysqli_query($conn,$sql1);
			while($fetch=mysqli_fetch_array($res1)){
			?>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src='<?= "admin/". getProductIMG($conn,$fetch["productid"],"img")?>' alt="..." class="img-responsive"/></div>
						<div class="col-sm-10">
							<h4 class="nomargin"><?= getProduct($conn,$fetch['productid'],"name")?></h4>
						</div>
					</div>
				</td>
				<td data-th="Price"><?= $fetch['price']?></td>
				<form action="addCart-process.php?case=add" method="post">
				<td data-th="Quantity">
				
					<input type="number" class="form-control text-center" style="width: 25%;" name="quantity" value="<?= $fetch['quantity']?>">
					<input type="hidden" name="price" value="<?= $fetch['price']?>">
					
					<button class="btn btn-info btn-sm" name="btn" style="margin-top: 5px;" value="-1" ><i class="fa fa-minus"></i></button>
					<button class="btn btn-info btn-sm" name="btn" style="margin-top: 5px;" value="1"><i class="fa fa-plus"></i></button>
				</td>
				<td data-th="Subtotal" class="text-center"><?= sprintf("%.2f",$fetch['price']*$fetch['quantity']) ?></td>
				<?php
					$amt +=$fetch['price']*$fetch['quantity'];
				?>
				<td class="actions" data-th="">
					
				<input type="hidden" name="id" value="<?= $fetch['id']?>">
				<!-- <button class="btn btn-info btn-sm"><i class="fa fa-refesh">+</i></button> -->
				</form>
					<a href="addCart-process.php?case=delete&id=<?= $fetch['id']?>">
					<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="text-center"><strong>Total 1.99</strong></td>
			</tr>
			<tr>
				<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>Total <?= sprintf("%.2f",$amt)?></strong></td>
				<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>
</div>
<?php include 'footer.php';?>
</body>

</html>