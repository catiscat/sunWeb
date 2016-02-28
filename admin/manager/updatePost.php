<html>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
            function showTime(){               
                document.getElementById("post_date").value = new Date().toLocaleString();
            }
        </script>
    </head>
    <?php 

    //该页面要显示准备修改的博文信息
     require_once(dirname(__FILE__)."/../../includes/commen.php");
   
    checkUserValidate();
    getLastTime();
    require_once dirname(__FILE__)."/../../includes/PostService.class.php";
    $sqlHelper=new SqlHelper();

    $id=mysql_real_escape_string(strip_tags($_GET['id']));
    //通过id得到该博文的其他信息
    //查询数据库，调用sqlHelper
    
    $postService=new PostService();
    $arr=$postService->getPostById($id);
    
    ?>
    
    
    <h1>修改博文</h1>
    <?php
        require_once (dirname(__FILE__)."/../content/themes/default/updatePostTable.php");

    ?>
</html>
