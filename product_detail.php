<?php
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
?>

<?php
include_once("header.php");
if(!isset($_GET["id"])){
    header('Location: not_found.php');
} else{
    $id = $_GET["id"];
    $prod = Product::get_product($id);
    $prods_relate = Product::list_product_relate($prod[0]["CateID"],$id);

}
$cates = Category::list_category();
?>
<div class="container text-center">
<div class="row">
    <div class="col-sm-3 panel panel-danger">
        <h3 class="panel-heading">Danh mục</h3>
        <ul class="list-group">
            <?php
                foreach($cates as $item){
                    echo "<li class='list-group-item'><a 
                    href=/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="col-sm-9 panel panel-info">
        <h3 class="panel-heading">Chi tiết sản phẩm</h3>
        <div class="row">
            <div class="col-sm-4">
                <img src="<?php echo "/LAB3/".$prod[0]["Picture"];?>" class="img-responsive" style="height: 300px; width: 300px; background-position: center; background-size: cover;" alt="Image"/>
            </div>
            <div class="col-sm-5  d-flex justify-content-start align-items-center">
                <div class="justify-item-start">
                    <h3 class="text-info">
                        <?php echo $prod[0]["ProductName"];?>
                    </h3>
                    <p>
                    Giá: <?php echo $prod[0]["Price"]?>
                    </p>
                    <p>
                    Mô tả: <?php echo $prod[0]["Description"]?>
                    </p>
                    <p>
                        <button type="button" class="btn btn-danger">Mua hàng</button>
                    </p>
                </div>
            </div>
        </div>
        <h3 class="panel-heading">Sản phẩm liên quan</h3>
        <div class="row">
            <?php
                foreach($prods_relate as $item){
                    ?>
                    <div class='col-sm-4'>
                        <a href="/LAB3/product_detail.php?id=<?php echo $item["ProductID"];?>">
                            <img src="<?php echo "/LAB3/".$item["Picture"];?>" class="img-responsive" style="height: 300px; width: 300px; background-position: center; background-size: cover;" alt="Image"/>
                        </a>
                        <p class="text-danger"><?php echo $item["ProductName"];?></p>
                        <p class="text-info"><?php echo $item["Price"];?></p>
                        <p>
                            <button type="button" class="btn btn-danger" onclick="location.href='/LAB3/shopping_cart.php?id= <?php echo $item["ProductID"] ?>'">Mua hàng</button>
                        </p>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>
</div>
<?php include_once("footer.php")?>