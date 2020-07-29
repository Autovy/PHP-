<?php 
             
             
                       
             //获得表情包
             

             $api = file_get_contents("http://api.bilibili.com/x/emote/user/panel/web?business=reply");
             $data =json_decode($api, true);
             $num = $_POST['num']; 
             
             if($num == 3 ){

             $yousa_api = file_get_contents("http://api.bilibili.com/x/emote/package?business=reply&ids=93");
             $yousa_data =json_decode($yousa_api, true);
             $str = $yousa_data ["data"]["packages"][0]["emote"];

             }
            else { 
              
            $str =  $data ["data"]["packages"][$num]["emote"];
          }
           echo json_encode($str);
          

              
              
 ?>