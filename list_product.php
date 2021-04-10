<?php
require_once("entities/product.class.php");
require_once("entities/category.class.php");
require_once("./config/db.class.php");
?>
<?php
include_once("header.php");

$cates = Category::list_category();
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

// total page;
$total_page = ceil(Db::totoal_record() / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;

$result_product = Product::get_product_by_page($start, $limit);

if (!isset($_GET["cateid"])) {
    $prods = $result_product;
} else {
    $cateid = $_GET["cateid"];
    $prods = Product::list_product_by_cateid($cateid);
}
?>
<style>
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .pagination a:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .pagination a:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>
<div id="content-wrapper" class="container">
<div class="row">
    <div class="col-sm-3">
        <h3>Danh mục</h3>
        <ul class="list-group">
            <?php
                foreach($cates as $item){
                    echo "<li class='list-group-item '><a
                    href=/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
                }
            ?>
        </ul>

    </div>
    <div class="col-sm-9">
            <div class="row">
                <?php
                foreach ($prods as $item) {
                ?>
                    <div class="col-sm-4 pr-4">
                        <a href="/LAB3/product_detail.php?id= <?php echo $item["ProductID"]; ?>">
                            <img width="150" height="280" src="<?php echo "/LAB3/" . $item["Picture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
                        </a>
                        <p style="height: 50px;" class="text-danger"><?php echo $item["ProductName"]; ?></p>
                        <p class="text-info"><?php echo number_format($item["Price"], 0, '', '.'); ?> VND</p>
                        <p>

                            <button type="button" class="btn btn-primary" onclick="location.href='/LAB3/shopping_cart.php?id= <?php echo $item["ProductID"] ?>'">Mua hàng</button>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="pagination">
                <?php if($current_page >1 && $total_page >1) {?>
                    <a href="/lab3/list_product.php?page=<?php echo $current_page -1 ?>">&laquo;</a>
                    <?php }?>
                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                        <?php if ($current_page == $i) { ?>
                            <a class="active" href="#"><?php echo $i ?></a>
                        <?php } else { ?>
                            <a href="/lab3/list_product.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                        <?php } ?>
                    <?php } ?>
                    <?php if($current_page <$total_page && $total_page >1) {?>
                        <a href="/lab3/list_product.php?page=<?php echo $current_page +1 ?>">&raquo;</a>
                    <?php }?>
                   
                </div>
    
        
    </div>
        <div class="container text-center">

</div>

</div>
</div>
<?php

include_once("footer.php");
?>