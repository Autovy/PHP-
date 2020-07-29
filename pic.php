<?php   
            
          
           
            $imgname = $_FILES["file"]["name"]; //获取上传的文件名称
            $filetype = pathinfo($imgname, PATHINFO_EXTENSION);//获取后缀
            $newname = date("Ymdhis").".".$filetype; //构建新名称
            $_FILES['file']['name'] = $newname;        

            $dir = 'img/'.iconv('UTF-8','gbk',basename($_FILES['file']['name']));  
            move_uploaded_file($_FILES['file']['tmp_name'],$dir);        
            echo $dir;

          
          ?>