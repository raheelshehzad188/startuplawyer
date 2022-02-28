
<HTML>
	<head>
		<style>
			body{
				font-family:Arial, Halvetica, san-serif;
			}
			.red{
				color:red;
			}
			.w-40{
				width:40%;
				float:left;
			}
			.eq-h{
				height:250px;
				overflow:hidden;
			}
			.dummy{
				border-radius:300px;
				width:230px;
			}
			.main{
				width:1100px;
				margin:0px auto;
			}
			h3{
				font-size:26px;	
			}
			h4{
				font-size: 20px;
			}
			p{
				font-size: 15px;
			}
			.w-50{
				width:50%;
				float:left;
			}
			table{
				width:100%;
			}
			td,th{
				
				padding:10px;
			}
			
			td{
				padding:10px;
				border-bottom:1px solid #c7c1c1;
			}
			tr{

			}
			.s-1{
				margin:30px 0px;
				overflow:hidden;
			}
			.w-20{
				width:20%;
				float:left;
			}
			.w-60{
				width:60%;
				float:left;
			}
			.al-right{
				text-align:right;
			}
		</style>

	</head>
	<body>
		<div class="main">
			<div class="s-1">
				<div class="w-40">
					<div class="eq-h">	
						<h3>
							PAYMENT RECEIPT
						</h3>
					</div>
					<h4>
						Startup Lawyer Details
					</h4>
					<p>
						address
					</p>
					<p>
						<b>Vat: </b> 9866545
					</p>
					<p>
						<b>tel: </b> 9866545
					</p>
					<p>
						<b>fax: </b> 9866545
					</p>
				</div>
			
				<div class="w-40">
					<div class="eq-h">	
						
							<img src="https://www.w3schools.com/howto/img_avatar.png" class="dummy">
						
					</div>
					<h4>
						Startup Lawyer Details
					</h4>
					<p>
						address
					</p>
					<p>
						<b>Vat: </b> 9866545
					</p>
					<p>
						<b>tel: </b> 9866545
					</p>
					<p>
						<b>fax: </b> 9866545
					</p>
				</div>
			</div>
			<div class="s-1">
				<div class="w-50">
					<p>
						<b>Payment slip date: </b> 26-7-2019
					</p>
				</div>
				<div class="w-50">
					<p>
						<b>Payment slip nubber: </b> 2672019
					</p>
				</div>
			</div>
			<div class="s-1">
				<table>
					<tr>
						<th>
							Order Date
						</th>
						<th>
							Order Number
						</th>
						<th>
							Product Name
						</th>
						<th>
							Price
						</th>
						<th>
							Sku
						</th>
						<th>
							Qty.
						</th>
						<th>
							Total
						</th>
						<th>
							Amount Due
						</th>
					</tr>
					<tr>
						<td>
							26-7-2019
						</td>
						<td>
							#<?= $order_id; ?>
						</td>
						<td>
							Flower vask
						</td>
						<td>
							$10
						</td>
						<td>
							2
						</td>
						<td>
							20
						</td>
						<td>
							20
						</td>
						<td>
							20
						</td>
					</tr>
					<tr>
						<td>
							26-7-2019
						</td>
						<td>
							#8907
						</td>
						<td>
							Flower vask
						</td>
						<td>
							$10
						</td>
						<td>
							2
						</td>
						<td>
							20
						</td>
						<td>
							20
						</td>
						<td>
							20
						</td>
					</tr>
				<table>
			</div>
			<div class="s-1">
				<div class="w-60 al-right">
					<p>Order total :</p>
					<p>Discounted Price :</p>
					<p>Comission :</p>
					<p>Tax :</p>
					<p><b>TOTAL :</b></p>
				</div>
				<div class="w-20 al-right">
					<p><b>1234</b></p>
					<p><b>1234</b></p>
					<p><b>1234</b></p>
					<p><b>1234</b></p>
				</div>
				<div class="w-20 al-right">
					<p><b>1234</b></p>
					<p><b>1234</b></p>
					<p><b>1234</b></p>
					<p><b>1234</b></p>
				</div>
			</div>
		</div>
	</body>
</HTML>