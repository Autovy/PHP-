<?php

include "header.php";
$user_id = $_GET["id"];

$space_result = mysqli_query( $conn,'select * from users;'); 

while($space_row = mysqli_fetch_array($space_result)){

          if($space_row["id"] == $user_id){

                    $pic =  $space_row["tx"];
                    $name = $space_row["name"];
                    $say  =  $space_row["say"];
                    break;


          }


}


?>



<div id="space">
<div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src ="<?php echo $pic; ?>">
          
          <?php 
              
              if($_COOKIE["userid"]==$user_id){
                    echo '<div id="file" style="width: 85px;margin: auto;float: none ; opacity: 0.8; position: relative;background-color: blue;top: 10px;">
                              
                              <input id="inpic" style=" width:85px;" type="file" accept="image/gif, image/jpeg, image/png" name="file"> 
                              <button style="width: 85px;" type="button" class="btn btn-default btn-lg">
                                修改头像                
                              </button>
                    </div>';
              }

          ?>   
           
           <div class="caption">
              <div class="name"><h3><?php echo $name; if($_COOKIE["userid"]==$user_id) echo '<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></div>'?></h3>
              <div class="says"><p><?php echo $says;if($_COOKIE["userid"]==$user_id) echo '<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></div>'?></p>
              </div>
            </div>
          </div>
</div>
</div>

<script>

      // 图像复制到服务器文件夹下
      $( document ).ready(function(){
          $('#inpic').change(function(){    
          
            var file_data = $('#inpic').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
          
              $.ajax({
              url:'avatar.php',
              type:'POST',
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,

      success:function(data1){

          var test = $(".thumbnail img").attr('src', data1);

      }

          });

})



      })


          
</script>