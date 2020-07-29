<?php

include "header.php";
$topic = $_POST["topic"];
$passage = $_POST["text"];
$time   = date("Y.m.d");

if(!empty($topic)&&!empty($passage)){

$query = mysqli_query($conn,"INSERT INTO wz (sj, ht, ms, zz, pl, tj) VALUES ( '$time' ,'{$topic}','{$passage}', '{$name}', 0, 0);");
//注意字段不要撞关键词,建议拼音;
  $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  header('location: '.$url.'');


}




?>

<div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <a href="space.php?id=<? echo $id ?>">
              <img src ="<?php echo $pic; ?>">
            </a>
              <div class="caption">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $says; ?></p>
              </div>
            </div>
          </div>
        </div>

<ul class="list-group">
  <li class="list-group-item" onClick="show()";>
  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" ></span>
   <p> 发表文章</p>
  </li>

  <li class="list-group-item"  onClick="show2()">
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
  <a href="space.php?id=<? echo $id ?>"> <p>个人中心</p></a>
  </li>

  <li class="list-group-item">
  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
   <p> 参与讨论</p>
  </li>

</ul>   



<!-- 话题栏 -->

<div class="topic">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">发表文章</h3>
    <button type="button" onclick="hide()" class="btn btn-default btn-lg">
     <p>X</p>         
</button>
  </div>
  <div class="panel-body">

  <div class="input-group">
 
  <div class="ask"> 
  <img src= <?php echo $pic; ?>>        
  <textarea require name="topic" form="frist" placeholder="此处填入你的标题(●'◡'●)" ></textarea>
  </div>  

  <form action="" method="POST" id="frist" class="topic_from" enctype="multipart/form-data">         
           
           <textarea class="hiden" name="text" require></textarea>
           
           
           <!-- 工具栏 -->
           
           
           <div id="file">
           <input id="inpfile" type="file" accept="image/gif, image/jpeg, image/png" name="file"> 
           <button type="button" class="btn btn-default btn-lg">
           <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
         </button>
           </div>
           
           <div class="tool">
              
           

              <button type="button" onclick="emote()" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-ice-lolly" aria-hidden="true"></span>
              </button>

           
           
           

              <button type="button" onclick="redo()" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
              </button>

              

              <button type="button" onclick="undo()" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
              </button>

           
           </div> 
          
           <div id="sub"><button type="submit" onclick="copy()" class="btn btn-default">提交</button> </div>
         
         
  </form>


  <div class="emote_jpg">

  <div class="panel panel-success">
  <div class="panel-heading">

      
  <div class="btn-group" role="group" aria-label="...">
  <button  onclick="choose(0)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/bba7c12aa51fed0199c241465560dfc2714c593e.png"/></button>
  <button  onclick="choose(1)"  class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/142409b595982b8210b2958f3d340f3b47942645.png"/></button>
  <button  onclick="choose(2)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/911f987aa8bc1bee12d52aafe62bc41ef4474e6c.png"/></button>
  <button  onclick="choose(3)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/5fa6082e098402d16d58c68e441ae76e40befd2c.png"/></button>
</div>
  
</div>
  <div class="panel-body">
    
</div>
</div>
  </div>

  
<!-- 表情包请求 -->
<script type="text/javascript">

window.onload = function(){
  
  //载入第一个表情包
  choose(0);

  //替换首页文章图片
  // $(".media-content img ").replaceWith("<img>[图片]</img>");


}






function choose(x){
    var tes = $(".emote_jpg input").val();
    tes = x;


    $.ajax({

      url:'emote.php',
      type:'POST',
      data:{num:x},

      success:function(data){

        var change = 0;
        var arr =eval("("+data+")");
        $(".emote_jpg .panel-body img").remove();
        $(".emote_jpg .panel-body br").remove();
        for(var i = 0; i<arr.length; i++){

          change++;
          var link = arr[i]["url"]; 

           $(".emote_jpg .panel-body").append("<img  style='width:30px; height:30px;  margin-top: -3px; margin-left: 6px;'/>");
           $(".emote_jpg .panel-body img:last").attr("src", link);  
          
          if(change%4==0){
            $(".emote_jpg .panel-body").append("<br><br>");

          }

        }
        $(".emote_jpg .panel-body img").click(function(){
          
          var get_url = $(this).attr("src");
          var img =  "<img  src=" + get_url + "; style='width:30px;  margin-top: -3px; height:30px; margin-left: 6px;'/>";

          document.execCommand("insertHTML","false",img);
        
        
        //  $ (docume.getSelection()).append("<img  style='width:30px; height:30px; margin-left: 6px;'/>");
        //  $ (window.getSelection()).attr("src", get_url); 
          
          
          });  

      },
     
      });
     
      }
     
</script>





<div class="miaoshu">
<div class="input-group-btn">
</div>
<div id="cont_img" contenteditable="true" class="panel-body">
</div>
</div>
</div>
</div>
</div>
</div>

<script>
          var click = 0;
          var count = 1;
          var num = 1;
          var count2 = 1;

          var jpg =  document.querySelector(".emote_jpg");

  


         function emote(){

          
          if((count2%2) == 0)jpg.style.display = "none";

          else jpg.style. display = "block";

          count2++;

        }


        // 图像转换为二进制的形式
        
        //   $( document ).ready(function(){
        //   $('#inpfile').on('change', function(){
        //   var targetDiv=document.getElementById("cont_img");
        //   var file = $(this).prop('files')[0];
        //   var img=document.createElement("img");
        //   var reader  = new FileReader();
        //   targetDiv.append(img);
        //   reader.addEventListener("load", function () {
        //       img.src=reader.result;
        //       document.querySelector("#cont_img").innerHTML += "<br><br>";
        //   }); 
        //   if (file) reader.readAsDataURL(file); 
        //   });

        // })


          //防止表单重复提交
          // var form = document.querySelector(".topic_from");
          // function handleForm(event) { event.preventDefault(); } 
          // form.addEventListener('submit', handleForm);




      // 图像复制到服务器文件夹下
      $( document ).ready(function(){
          $('#inpfile').change(function(){    
          
            var file_data = $('#inpfile').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
          
              $.ajax({
              url:'pic.php',
              type:'POST',
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data:form_data,

      success:function(data1){

          var pic = "<br><img src ="+data1+" /><br>"

          document.execCommand("insertHTML","false",pic);

      }

          });

})
      })


        
    function copy(){

var str =  document.querySelector("#cont_img").innerHTML;
document.querySelector(".hiden").innerHTML = str;

}


function redo(){

document.execCommand("redo");
}


function undo(){

document.execCommand("undo");


}



function show(){

var topic1 =  document.querySelector('.topic').style;  

if(count%2 != 0) { 
topic1.display = "block";
}

else{ 
topic1.display = "none";
}

count++; 
}


function hide(){

var topic1 =  document.querySelector('.topic').style; 
topic1.display = "none";
jpg.style.display = "none";

}

</script>
  


