<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.wrapper {
			width: 1000px;
			height: auto;
			margin: auto;
		}

		.header {
			height: 55px;
			margin: auto;
			border: 1px solid black;
		}

		.logo {
			float: left;
			width: 150px;
			padding: 10px
		}

		#form_search {
			margin-top: 10px;

		}

		#form_search input[type=text] {
			width: 250px;
			height: 30px
		}

		#form_search input[type=submit] {
			height: 30px
		}

		.login {
			float: right;
			right: 30px;
			height: 35px;
			line-height: 35px;
			color: gray;
			position: relative;
			display: inline;
		}

		.login a {
			text-decoration: none;

		}

		.register {
			float: right;
			margin-right: 50px;
			height: 35px;
			line-height: 35px;
			color: gray;
		}

		.register a {
			text-decoration: none;

		}

		.menu {
			width: 100% height: 30px;
			background: pink;
			border: 1px solid black
		}

		.menu ul li {
			list-style: none;
			text-align: center;
			display: inline-table;
		}

		.menu ul li a {
			text-decoration: none;
			font-size: 16px;
			margin: 30px;
			padding: 5px;
			text-transform: uppercase;
		}

		.content {
			width: 100%;
			border: 1px solid black
		}

		.left {
			width: 20%;
			background: gray;

			float: left;
		}

		.right {
			width: 80%;

			float: right;
		}

		.footer {
			width: 1000px;
			height: 100px;
			background: #f0f0f0;
			clear: both;
		}

		.left>p {
			background: white;
			color: black;
			font-size: 22px;
			font-family: arial;
			padding: 10px;
			text-align: center;
		}

		.category ul {
			width: 100%;
			height: auto;
		}

		.category ul li {
			list-style: none;

		}

		.category ul li a {
			color: white;
			padding: 8px;
			margin: 5px;
			text-align: center;
			font-size: 20px;
			text-decoration: none;
			font-family: Comic Sans Ms;
		}

		.category a:hover {
			text-decoration: underline;
		}

		.brand ul {
			width: 100%;
			height: auto;
			list-style: none;
		}

		.brand ul li {
			list-style: none;

		}

		.brand a:hover {
			text-decoration: underline;
		}

		.brand ul li a {
			color: white;
			padding: 8px;
			margin: 5px;
			text-align: center;
			font-size: 20px;
			text-decoration: none;
			font-family: Comic Sans Ms;
		}

		.products_box {
			width: 780px;
			text-align: center;
			margin-left: 30px;
			margin-bottom: 10px;
		}

		.single_product {
			float: left;
			margin-left: 30px;
			padding: 10px;
		}

		.single_product img {
			border: 2px solid black;
		}
	</style>
</head>
<body>
<div class="wrapper">
		<div class="header">
			<div class="logo">
				<img id="logo" src="Image/btec.jpg" />
			</div>
			<!--/.header_logo-->
			<div id="form_search">
				<form method="get" action="" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product" />
					<input type="submit" name="search" value="Search" />
				</form>
			</div>
		</div>
		<!-- end header -->
		<div class="menu">
			<ul>
				<li> <a href="index.html"> Trang chủ </a> </li>
				<li> <a href="Admin/view_product.html">Quản lý sản phẩm </a></li>
				<li><a href="Admin/add_product.html"> Thêm sản phẩm </a> </li>
				<li><a href="about.html"> Giới thiệu </a></li>
			</ul>
		</div>
		<div class="content">
			<div class="left">
				<p> Loại sản phẩm </p>
				<div class="category">
					<ul>
						<li> <a href="#">Fridge</a></li>
						<li> <a href="#">Laptop </a></li>
						<li> <a href="#">Camera </a></li>
						<li> <a href="#">Desktop </a></li>
					</ul>
				</div>
				<p> Thương hiệu </p>
				<div class="brand">
					<ul>
						<li> <a href="#">Samsung </a></li>
						<li> <a href="#">Dell </a></li>
						<li> <a href="#">Apple </a></li>
					</ul>
				</div>
			</div>
			<div class="right">
				<p style="text-align: center;font-size: 20px"> Tất cả sản phẩm </p>
				<div class="products_box">
					<!--Truy vấn từ cơ sở dữ liệu -->
					<button type="button" onclick="quay_lai_trang_truoc()">Quay lại trang trước</button>

  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>

					<?php
   //B1: Kết nối
			$connect = mysqli_connect('localhost', 'root', '', 'dmo');
			if (!$connect) {
				echo "Kết nối thất bại";
			}
			//B2: Viết câu truy vấn
			$sql = "select * from products";
			//B3: Thực thi truy vấn
			$result = mysqli_query($connect,$sql);
			//Đưa kết quả vào mảng liên kết
			
			while($row_product =mysqli_fetch_array($result)){
				//Hiển thị lần lượt từng sản phẩm
				$product_id = $row_product['product_id'];
				$product_name = $row_product['product_name'];
				$product_price = $row_product['product_price'];
				$product_img = $row_product['product_img'];
				echo"
				<div class='single_product'>
				<h3>$product_name</h3>
				<img src='Image/$product_img' width='180' height='180' />
				<p><b> Price:$product_price </b></p>
				<a href='detail.php?id=$product_id'>Details</a>
				<a href='index.php?add_cart=$product_id'>
				<button style='float:right'>Add to Cart</button>
				</a>          
		
				</div>       
				";

			}
   ?>
				</div>

			</div>
		</div>
	</div>
	<div class="footer">
		<p> Đây là footer </p>
	</div>
	</div>

</body>

</html>