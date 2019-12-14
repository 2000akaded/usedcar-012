<?php
    session_start();
    if(isset($_GET['carType'])){
        $cat=$_GET['carType'];
    }
    else{
        header("location:index.php");
    }
    include("connext.php");
    $sql ="SELECT * FROM car WHERE carType=$cat ";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error:".$conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd=NULL;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soi5 Used Cars 012</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
//<link href="css/metisMenu.min.css" rel="stylesheet">
//<link href="css/timeline.css" rel="stylesheet">
<link href="css/startmin.css" rel="stylesheet">
//<link href="css/morris.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<body>
<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Soi 5 Used Cars 012</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Top Navigation: Left Menu -->
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>
    </ul>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">
        <li>
            <a href="login.php">
                <i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ
            </a>
        </li>
        
        <?php
                    if(isset($_SESSION['id'])){
                ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> 
                    <<?php //echo $_SESSION['username'] ?> 
                <span class="caret"><b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-shopping-cart fa-fa"></i> (0)
            </a>
        </li>
<!-- *************************************** -->
        <?php
                    }
                    else{
                ?>
                
                <?php
                    }
                ?>
<!-- *************************************** -->
    </ul>

    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="text-center">
                    <a href="#s">รถยนต์ของเรา</a>
                </li>
                <li>
                    <a href="#" class="active"><i class="fa fa-car fa-fw"></i> รถทุกประเภท</a>
                </li>
                <li>
                    <a href="showproduct.php?carType=1" class="active"><i class="fa fa-car fa-fw"></i> รถเก๋ง</a>
                </li>
                <li>
                    <a href="showproduct.php?carType=2" class="active"><i class="fa fa-truck fa-fw"></i> รถกระบะ</a>
                </li>
                <li>
                    <a href="showproduct.php?carType=3" class="active"><i class="fa fa-truck fa-fw"></i> รถตู้</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ********************************************************************************************* -->
<div class="container text-center">
<div class="container">
    <div class="row">
    <?php
            $sql ="SELECT * FROM car WHERE  carType=$cat ";
            $result = $conn->query($sql);
        while($prd = $result->fetch_object()){
    ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="thumbnail">
                <a href="car.php?pid=<?php echo $prd->carType; ?>">
                    <img src="jpg/<?php echo $prd->carpic ?>" alt="">
                </a>
                <div class="caption">
                    <h4>Price : <?php echo $prd->price ?> Baht</h4>
                    <h4>Brand : <?php echo $prd->brand ?> </h4>
                    <h4>Model : <?php echo $prd->model ?> </h4>
                    <h4>Color : <?php echo $prd->color ?> </h4>
                    <h4>License : <?php echo $prd->license ?> </h4>
                    <h4>Province : <?php echo $prd->province ?> </h4>
                    <h4>ModelYear : <?php echo $prd->modelYear ?> </h4>
                    <h4>PostedBy : <?php echo $prd->postedBy ?> </h4>
                    <h4>Time : <?php echo $prd->postedDate ?> </h4>
                </div>
                    <p><a href="#" class="btn btn-success">ADD</a></p>
            </div>
        </div>
                <?php
            }
    ?>
        
    </div>
</div> 
</body>
</html>