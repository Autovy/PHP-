<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>注册</title>
 
    <!-- 第一步：加载Bootstrap的层级样式表 -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

</head> 
<body>
<div class="bg2">          
<div class="continer">
<div class="panel panel-success">
          <div class="panel-heading">用户注册</div>
          <div class="panel-body">
                    <form action="" method="POST">
                    <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">昵&nbsp;称</span>
                              <input type="text" class="form-control" placeholder="君の名は？" aria-describedby="basic-addon1" name="name" >
                            </div>
             
                    <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">密&nbsp;码</span>
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password">        
                    </div> 
                    
                    
                    <div class="btn-group" role="egroup" aria-label="...">
                              <button type="submit" class="btn btn-default">注册</button>
                    </div>

                    </form>

                    
                    <!-- Single button -->
                    <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              页面切换 <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                              <li><a href="login.php">登录</a></li>
                              <li><a href="regit.php">注册</a></li>
                              </ul>
                    </div>
                    
          </div>
        </div>


        
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>

<?php
$name = $_POST["name"];
$password = $_POST["password"];
if(!empty($name))setcookie('name', $name);


$servername = "127.0.0.1";//以下四行为数据库信息
$user = "user";//用户名
$password_all = "123456";//密码
$data = "acg";//要使用的数据库名称

$conn = mysqli_connect($servername, $user, $password_all, $data);
mysqli_query($conn,"set names 'utf8';");



if(!(is_null($name) && is_null($password))){
      
      if(empty($name)){
        echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>请填写昵称</div>';
      }
     
      elseif(empty($password)){
        echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>请填写密码</div>';
      }
      
      else{
            $result = mysqli_query($conn, 'select name from users');
            $switch = 0;
            while($row = mysqli_fetch_assoc($result)){

                    if($row["name"] == $name){
                                        
                    echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>该昵称已被占用</div>';
                                  
                    $switch = 1;
                    break;

                    }


            }
                                        
            if($switch == 0){  
                    $pic = "https://api.adorable.io/avatars/186/".$name.".png";
                    $query = mysqli_query($conn,"INSERT INTO users (name, password, tx, says) VALUES ('{$name}','{$password}', '{$pic}', '这个人很懒，他什么也没有写' );");  
                    echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>注册成功</div>';
                    header("refresh:1; url=login.php"); 

                    }

            }
}



$conn->close();

?>

</body>     

</html>

