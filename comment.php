<div class="comment">
<div class="work"> 
          
          <button class="btn btn-primary" onclick="tj(<?php echo $id ?>,this)" type="button">
          <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
          推荐 <span class="badge"> <?php echo $recom ?> </span>

          <button class="btn btn-primary" type="button" onclick="show_comment()">
          <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
          评论 <span id="pl" class="badge"> 
                    <?php $result  = mysqli_query($conn, "select * from comment where passage_id = '{$id}'");
                    $all = mysqli_num_rows($result);
                    echo $all;
                    
                    ?> 
          </span>
      
          </button>
          
</div>   
<div class="mian_comment">

<div class="com_tool">
    <img class="avt" src= <?php echo $pic; ?> />
    <div id="cont_img2" contenteditable="true" class="panel-body"></div>
   
    <form action="" method="POST" id="second" class="topic_from" enctype="multipart/form-data">         
           
          <button type="submit" onclick="copy2()" class="submit_comment" >发表评论</button>
           <textarea id="comment" class="hiden" name="comment" require></textarea>

    </form>       
      
    <button onclick="emote2()" type="button" class="btn btn-default btn-lg">
    <span  class="glyphicon glyphicon-ice-lolly" aria-hidden="true"></span>表情
</button>  


<div class="emote_passage">

<div class="panel panel-success">
<div class="panel-heading">

    
<div class="btn-group" role="group" aria-label="...">
<button  onclick="choose2(0)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/bba7c12aa51fed0199c241465560dfc2714c593e.png"/></button>
<button  onclick="choose2(1)"  class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/142409b595982b8210b2958f3d340f3b47942645.png"/></button>
<button  onclick="choose2(2)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/911f987aa8bc1bee12d52aafe62bc41ef4474e6c.png"/></button>
<button  onclick="choose2(3)" class="btn btn-default"><img src="http://i0.hdslb.com/bfs/emote/5fa6082e098402d16d58c68e441ae76e40befd2c.png"/></button>
</div>

</div>
<div class="panel-body">
  
</div>
<script type="text/javascript">

var button = false;
window.onload = function(){
  
  //载入第一个表情包
  choose2(0);
  choose(0);

  //替换首页文章图片
  // $(".media-content img ").replaceWith("<img>[图片]</img>");

  //比较新颖的方法阻止了刷新提交表单

  if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


   if(<?php $method = $_GET["method"]; echo $method; ?> == 2 ){

          show_comment();

   }  


}


function show_comment(){

   var comment =  document.querySelector(".mian_comment");

   if(button){

     comment.style.display = "none";
     button = false;

   }

   else{

    comment.style.display = "block";
    button = true;
    var h=$(window).scrollTop(); //获取当前滚动条距离顶部的位置
    var add_h = $(".content").height();   
    $("html,body").animate({ scrollTop: h+ add_h }, add_h);//点击按钮向下移动800px，时间为800毫秒

   }


}



function copy2(){

var str =  document.querySelector("#cont_img2").innerHTML;
document.querySelector("#comment").innerHTML = str;


}



function choose2(x){


    $.ajax({

      url:'emote_bg.php',
      type:'POST',
      data:{num:x},

      success:function(data){


        var change1 = 0;
        var arr =eval("("+data+")");
        $(".emote_passage .panel-body img").remove();
        $(".emote_passage .panel-body br").remove();
        for(var i = 0; i<arr.length; i++){

          change1++;
          var link = arr[i]["url"]; 

           $(".emote_passage .panel-body").append("<img  style='width:30px; height:30px;  margin-top: -3px; margin-left: 6px;'/>");
           $(".emote_passage .panel-body img:last").attr("src", link);  
          
          if(change1%4==0){
            $(".emote_passage .panel-body").append("<br><br>");

          }

        }
        $(".emote_passage .panel-body img").click(function(){
          
          var get_url = $(this).attr("src");
          var img =  "<img  src=" + get_url + "; style='width:30px;  margin-top: -3px; height:30px; margin-left: 6px;'/>";

          document.execCommand("insertHTML","false",img);
        
        
        //  $ (docume.getSelection()).append("<img  style='width:30px; height:30px; margin-left: 6px;'/>");
        //  $ (window.getSelection()).attr("src", get_url); 
          
          
          });  

      },
     
      });
     
      }

      var count3 = 1;

      var jpg2 =  document.querySelector(".emote_passage");




    function emote2(){


        if((count3%2) == 0)jpg2.style.display = "none";

        else jpg2.style. display = "block";

        count3++;

}


     
</script>

</div>
</div>



</div>
