<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>登录</title>
 
    <!-- 第一步：加载Bootstrap的层级样式表 -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">


</head> 
<body>
<div class="bg">          
<div class="continer">
<div class="panel panel-info">
          <div class="panel-heading">用户登录</div>
          <div class="panel-body">
                    <form action="login.php" method="POST">
                    <div class="input-group">
                              <span style="background-color:#d9edf7" class="input-group-addon" id="basic-addon1">昵&nbsp;称</span>
                              <input type="text" class="form-control" placeholder="君の名は？" aria-describedby="basic-addon1" name="name" >
                            </div>
             
                    <div class="input-group">
                              <span style="background-color:#d9edf7" class="input-group-addon" id="basic-addon1">密&nbsp;码</span>
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password">        
                    </div> 
                    
                    <div class="btn-group" role="group" aria-label="...">
                              <button type="submit" class="btn btn-default">登录</button>
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
<script type="text/javascript">
      
        var images = new Array();
        function preload() {
            for ( i = 0; i < preload.arguments.length; i++ ) {
                images[i] = new Image();
                images[i].src = preload.arguments[i];
            }
        }
        preload(
                
          "http://i0.hdslb.com/bfs/emote/87f46748d3f142ebc6586ff58860d0e2fc8263ba.png"

        )
        //--><!]]>
 </script>





</div>

<?php
$name = $_POST["name"];
$password = $_POST["password"];

$servername = "127.0.0.1";//以下四行为数据库信息
$user = "user";//用户名
$password_all = "123456";//密码
$data = "acg";//要使用的数据库名称
$swcith3 = 0;

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
            $result = mysqli_query($conn, 'select * from users;');
            while($row = mysqli_fetch_assoc($result)){

                    if(($row["name"] == $name))  
                    {
                      if(($row["password"] == $password)){
                        $swcith3  = 1; 
                        break;
                      }

                      else{
                        $swcith3  = 3;
                        break;
                      }

                    }
                    
                    else{

                      $swcith3  = 2;

                    }
            }

            switch($swcith3){

              case 1 : echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>登录成功</div>';setcookie("userid", $row["id"]);$swcith3 = 0; header("refresh:1; url=index.php"); break;
              case 2 :  echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>该用户不存在</div>';$swcith3 = 0;break;
              case 3 :  echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>密码错误</div>';$swcith3 = 0;break;
            
            }






            }
}

$conn->close();

?>

</body>     
</html>