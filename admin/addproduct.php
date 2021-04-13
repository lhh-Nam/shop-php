<?php require_once 'header.php' ?>
<?php require_once 'leftSidebar.php' ?>
<?php include './entities/product.class.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$item_name = $_POST["item_name"];
	$item_brand = $_POST["item_brand"];
	$item_price = $_POST["item_price"];
	$image = $_FILES["item_image"];
	$dateNow = date('Y-m-d H:i:s');

	$file_temp = $image['tmp_name'];
	$file_path = "../assets/products/" . $image["name"];
	$imageName = $image["name"];
	move_uploaded_file($file_temp, $file_path);

	$product = new Product($item_name, $item_brand, $item_price, "./assets/products/$imageName", $dateNow);

	$add = $product->addProduct();
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Danh sách sản phẩm</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<button type='button' class='btn btn-success btn-lg'>
							Thêm sản phẩm
						</button>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<form class="m-5" method="post" enctype="multipart/form-data">
					<div class="row g-3">
						<div class="mb-3 col">
							<label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
							<input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="item_name">
						</div>
						<div class="mb-3 col">
							<label for="exampleInputPassword1" class="form-label">Thương hiệu</label>
							<input class="form-control" id="exampleInputPassword1" name="item_brand">
						</div>
					</div>

					<div class="row g-3">
						<div class="mb-3 col">
							<label for="exampleInputEmail1" class="form-label">Giá</label>
							<input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="item_price">
						</div>
						<div class="mb-3 col">
							<label for="exampleInputPassword1" class="form-label">Ảnh</label>
							<input name="item_image" type="file" class="form-control" id="exampleInputPassword1" />
						</div>
					</div>

					<button type="submit" class="btn btn-primary" name="submit">Lưu</button>
				</form>
			</div>

		</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.control-sidebar -->
<?php require_once 'footer.php' ?>