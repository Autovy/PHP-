<?php   
            
            $servername = "127.0.0.1";//以下四行为数据库信息
            $user = "user";//用户名
            $password_all = "123456";//密码
            $data = "acg";//要使用的数据库名称
            $conn = mysqli_connect($servername, $user, $password_all, $data);
            mysqli_query($conn,"set names 'utf8';");

            $imgname = $_FILES["file"]["name"]; //获取上传的文件名称
            $filetype = pathinfo($imgname, PATHINFO_EXTENSION);//获取后缀
            $newname = date("Ymdhis").".".$filetype; //构建新名称
            $_FILES['file']['name'] = $newname;        

            $dir = 'img/'.iconv('UTF-8','gbk',basename($_FILES['file']['name']));  

            //头像路径存入数据库
            $id = $_COOKIE["userid"];
            $result = mysqli_query($conn, "UPDATE  users SET tx = '{$dir}' WHERE id = '{$id}'");

            move_uploaded_file($_FILES['file']['tmp_name'],$dir);        
            echo $dir;

            
          ?>