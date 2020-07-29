
<?php


include "siderbar.php";

  // $date=date('Ymdhis');
  // $_FILES["file"]["name"] = $date.'.png';
  // $dir = 'img/'.iconv('UTF-8','gbk',basename($_FILES['file']['name']));  
  // move_uploaded_file($_FILES['file']['tmp_name'],$dir);

?>



<div class="passage">

<div class="passage_choose" >

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">推荐</a></li>
  <li role="presentation"><a href="#">最热</a></li>
  <li role="presentation"><a href="#">最新</a></li>
</ul>

</div>

<!-- php构建循环块 -->
<?php   


    $passage_result = mysqli_query($conn, 'select * from wz;');

       
    //重构substr函数

function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8').'...';
    } else {
        return $text;
    }
 
}


   if(mysqli_num_rows($passage_result) > 0){
    while( $passage_row = mysqli_fetch_assoc($passage_result)){

      //注意要将第二次的搜索放在第一个while里，否则会得到一条数据
      $result = mysqli_query($conn, 'select * from users;');
      
      while($row = mysqli_fetch_assoc($result)){
         if(strcmp($passage_row["zz"] , $row["name"]) == 0 ){

            $passage_img = $row["tx"];
            $id = $row["id"];
            break;

        }


      }
      $passage_row["ht"] = nl2br($passage_row["ht"]);
      $passage_row["ms"] = nl2br($passage_row["ms"]);

     //php正则匹配字符串img标签
      $pattern = '/(<img[^>]+>)/i';
      $replacement = '<img>&nbsp[图片]&nbsp&nbsp<img>';
      $passage_row["ms"] =  preg_replace($pattern, $replacement, $passage_row["ms"]);

      echo     
          '<div class="media">
            <div class="media-left">
              <a href="space.php?id='.$id.'">
                <img class="media-object" src='. $passage_img .'>
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="passage.php?id='.$passage_row["id"].'&method=1 ">'.$passage_row["zz"].'&nbsp:'. '&nbsp'.subtext($passage_row["ht"],20) .'</a>
              </h4> <p>'.$passage_row["sj"].'</p>
              <div class="media-content">  '.subtext(strip_tags($passage_row["ms"],"<img>" ), 150).' </div>
            </div>

          <div class="work"> 
          
          <button class="btn btn-primary" onclick="tj('. $passage_row["id"] .',this)" type="button">
          <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
          推荐 <span class="badge"> '. $passage_row["tj"] .' </span>

          <a href="passage.php?id='.$passage_row["id"].'&method=2">
          <button class="btn btn-primary" type="button">
          <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
          评论 <span class="badge"> '. $passage_row["pl"] .' </span>
          </button>
          </a>
          
          </div>    

          </div>';

     }
    }

    else{

      echo
      '<div class="media">
      <div class="media-left">
        <a href="#">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">未发布话题</h4>
      </div>
    </div>';


    }
?>
</div>

<script>

    

        

        //按钮推荐话题，onclick要传this才能判断点击对象
        function tj(id,e){

          var tj_count = 0

          if( $(e).attr("class") == 'btn btn-primary' ){

              $(e).attr("class","btn btn-change");
              tj_count = 0;

          }

          else{

             $(e).attr("class","btn btn-primary");
              tj_count = 1;

          }



          $.ajax({
              url:'love.php',
              type:'POST',
              data:{id:id, choose:tj_count},

          success:function(data2){
            //修改文本不能用直接等于
           
             $(e).find('.badge').text(data2)

      }

          });



        }

        
        
</script>
