<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- 加载图片关键的一句 -->
    <meta name="referrer" content="no-referrer" />
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title></title>
 
    <!-- 第一步：加载Bootstrap的层级样式表 -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head> 

<div class="head">

<div class="page">    
<ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="index.php">首页</a></li>
          <li role="presentation"><a href="space.php?id=<?php echo $_COOKIE["userid"] ?>">个人主页</a></li>
</ul>

</div>

<div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->


<div class="mess">        
<ul class="nav nav-pills" role="tablist">

          <li role="presentation"><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span class="badge">3</span></a></li>
          <li role="presentation"><a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><span class="badge">3</span></span></a></li>
</ul>
</div>        

</div>


<?php
  
  $id = $_COOKIE["userid"];
  $servername = "127.0.0.1";//以下四行为数据库信息
  $user = "user";//用户名
  $password_all = "123456";//密码
  $data = "acg";//要使用的数据库名称


  $conn = mysqli_connect($servername, $user, $password_all, $data);
  mysqli_query($conn,"set names 'utf8';");


  $result = mysqli_query($conn, 'select * from users;');
  while($row = mysqli_fetch_assoc($result)){
        if($row["id"] == $id){
            $name = $row["name"];
            $pic = $row["tx"];
              $says = $row["says"];


            }

        }


?>