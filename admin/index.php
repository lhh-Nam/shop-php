<?php include 'header.php' ?>
<?php require_once 'leftSidebar.php' ?>
<?php include './entities/product.class.php'; ?>
<?php
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $deleteProduct = Product::deleteProduct($id);

    if (isset($deleteProduct)) {
        header("Location: index.php");
    }
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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pdlist = Product::getProducts();
                        if ($pdlist) :
                            foreach ($pdlist as $key => $product) :
                        ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $product["item_name"] ?></td>
                                    <td><img src=".<?php echo $product['item_image'] ?>" width="70"></td>
                                    <td><?php echo $product["item_price"] ?>"</td>
                                    </td>
                                    <td>
                                        <a href="productedit.php?productid=<?php echo $product['item_id'] ?>">Edit</a> || <a href="?productid=<?php echo $product['item_id'] ?>">Delete</a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
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