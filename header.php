<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="lab3">
    <link href="/LAB3/site.css" rel="stylesheet"/>
    <link href="/LAB3/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <title>Project training - website bán hàng</title>
</head>
<body>
    <div id="wrapper">
        <h1 class="text-center ">Website Thiết bị điện tử</h1>
        
        <div class="navbar">
            <div class="container">
                <div class="navbar-header d-flex justify-content-between align-items-center w-100">
                    <div class=" d-flex justify-content-start align-items-center">
                        <a class="navbar-brand navbar-text" href="/LAB3/list_product.php"> Danh sách sản phẩm</a>
                        <a class="navbar-brand navbar-text" href="/LAB3/add_product.php"> Thêm sản phẩm</a>
                    </div>
                    <h5>
                        <?php
                        session_start();
                        if(isset($_SESSION['user'])!=""){
                            echo "<h5>Welcome ".$_SESSION['user']."  "."<a href='/LAB3/logout.php'><button type='button' class='btn btn-danger '>LOG OUT</button></a></h5>";
                        } else{
                            echo "<h5>Sign in here <a href='/LAB3/login.php'><button type='button' class='btn btn-primary '>LOGIN</button></a> <a href='/LAB3/register.php'><button type='button' class='btn btn-warning '>REGISTER</button></a></h5>";
                        }
                        ?>
                    </h5>
                </div>
            </div>
        </div>