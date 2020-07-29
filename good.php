<?php

$servername = "127.0.0.1";//以下四行为数据库信息
$user = "user";//用户名
$password_all = "123456";//密码
$data = "acg";//要使用的数据库名称
$conn = mysqli_connect($servername, $user, $password_all, $data);
mysqli_query($conn,"set names 'utf8';");
$passage_result = mysqli_query($conn, 'select * from comment;');
$id = $_POST["id"];
$choose = $_POST["choose"];
while( $passage_row = mysqli_fetch_assoc($passage_result)){

          if($passage_row["id"] == $id ){

          
          if($choose == 0){   
                    
                    $num =  ++$passage_row['dz'];
          
          }

          else {   
                    
                    $num =  --$passage_row['dz'];
          
          }


          mysqli_query($conn, "UPDATE comment  SET dz = $num WHERE id = $id ");
          break;         

          }




}

echo $num;

?>