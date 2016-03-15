<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(UTILS_PATH."/functions.php");

?>

<?php


    /**
     *该函数用于添加文章界面，会发给postCrud.php一个post请求。flag中标识addPost，将要执行addPost操作。
     *
     *@param  void;
     *@return  void;
     */
    function addPost(){
       
        echo "
        <form action=".POST_CRUD_TOOL_PATH_SELF."postCrud.php method='post'>
            
            <h3 class='title_font' >Add Post</h3>
            <table>
                <tr><td class='sidebar_font' >Title</td><td><input class='form_settings_input' type='text'  name='postTitle' /></td></tr>
                <tr><td class='sidebar_font' >Author</td><td><input type='text' class='form_settings_input' name='postAuthor' /></td></tr>
                <tr><td class='sidebar_font' >Type</td><td><input type='text' class='form_settings_input' name='postType' /></td></tr>
                <tr><td class='sidebar_font' >Content</td><td><textarea class='form_settings_textarea'  wrap='physical' rows='10' cols='60' type='text' name='postContent' ></textarea></td></tr>
                <input type='hidden' name='flag' value='addPost' />
                <tr><td></td><td><input type='submit' value='Add' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
            </table><br><br>
        </form>
        ";
   }
   
   
   
    

    /**
     *该函数用于删除文章操作，会发给postCrud.php一个post请求。flag中标识delPost，将要执行delPost操作。
     *
     *@param $postId;
     *@return  void;
     */
   
    function deletePost($postId){
  
        //首先获取文章全部信息
        $res = listSinglePostAll($postId);
        
        $postTitle=$res['post_title'];
        $postAuthor=$res['post_author'];
        $postType=$res['post_type'];
        $postContent=$res['post_content'];
        $postDate = $res['post_date'];
        
        echo "
            <form action=".POST_CRUD_TOOL_PATH_SELF."postCrud.php method='post'>
            
                <h3 class='title_font' >delete Post</h3>
                <table>
                    <tr><td class='sidebar_font' >Title</td><td><input class='form_settings_input' type='text'  name='postTitle' value=$postTitle /></td></tr>                
                    <tr><td class='sidebar_font' >Author</td><td><input  class='form_settings_input' type='text'  name='postAuthor' value=$postAuthor /></td></tr>
                    <tr><td class='sidebar_font' >Type</td><td><input class='form_settings_input' type='text'  name='postType' value=$postType /></td></tr>
                    <tr><td class='sidebar_font' >Content</td><td><textarea class='form_settings_textarea' rows='4' cols='50' type='text'  name='postContent' >$postContent</textarea></td></tr>
                    <tr><td class='sidebar_font' >Date</td><td><input type='text' class='form_settings_input'  name='postDate' value=$postDate  /></td></tr>
                    <input type='hidden' name='flag' value='delPost' />
                    <input type='hidden' name='postId' value=$postId />
                    <tr><td></td><td><input type='submit' value='Delete' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
                </table><br><br>
            </form>
        ";
    }
         

    
    
    
    /**
     *该函数用于列出推荐post的列表
     *建议接受listPostRecomandProfile返回的结果。
     *
     *@param $arr   Array   #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
     *                          #每条记录的内容为   post_title, post_date,post_type,post_author,post_id。
     *@return  void;
     */
    function showPostByRecomand($arr){
        $res=listPostRecomandProfile($arr);
        echo "<ul>";
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            echo "<li><a  href='postReader.php?postId={$row['post_id']}' target=_blank>{$row['post_title']}</a></li><br>";         
        }
        echo "</ul>";
    }
    
    

    /**
     *该函数用于列出所有的文章类型。
     *
     *建议接受listPostTypeProfile返回的结果。
     *
     *@param $arr   Array   #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
     *@return void
     */
    function showPostType($arr){
        $res=listPostTypeProfile($arr);
        echo "<ul>";
        for($i=0;$i<count($res);$i++){
            $postType=$res[$i];
            echo "<li><a href='postListByType.php?postType=$postType' target=_blank >".$postType."</a></li><br>";
        }
        echo "</ul>";
    }
   
     /**
      *该函数用于根据一篇文章Id列出该文章的profile。 不包括文章内容。
      *建议接受 listSinglePostProfile 返回的结果。
      *
      *@param $postId  Int
      *@return  void;
      */
   
    function showSinglePostProfile($postId){
        
        $res=listSinglePostProfile($postId);
        $postTitle=$res['post_title'];
        $postAuthor=$res['post_author'];
        $postDate=$res['post_date'];
        $postType = $res['post_type'];
        echo  "<span class='title_font'>".$postTitle."</span>&nbsp;&nbsp;&nbsp;<span class='sidebar_font'>".$postAuthor."&nbsp;&nbsp;&nbsp;".$postType."&nbsp;&nbsp;&nbsp;&nbsp;".$postDate."</span>";

    }
   
    /**
     *该函数用于根据$postId更新某篇文章
     *@param $postId  Int
     *@return  void
     */
    function updatePost($postId){
  
        //首先获取文章全部信息
        $res = listSinglePostAll($postId);
        
        $postTitle=$res['post_title'];
        $postAuthor=$res['post_author'];
        $postType=$res['post_type'];
        $postContent=$res['post_content'];
        $postDate = $res['post_date'];
        echo $postContent;
            echo "
                    
                <form action=".POST_CRUD_TOOL_PATH_SELF."postCrud.php method='post'>
                
                    <h3 class='title_font' >Update Post</h3>
                    <table>
                        <tr><td class='sidebar_font' >Title</td><td><input type='text' class='form_settings_input' name='postTitle' value=$postTitle /></td></tr>                
                        <tr><td class='sidebar_font' >Author</td><td><input type='text' class='form_settings_input'  name='postAuthor' value=$postAuthor /></td></tr>
                        <tr><td class='sidebar_font' >Type</td><td><input type='text' class='form_settings_input' name='postType' value=$postType /></td></tr>
                        <tr><td class='sidebar_font' >Content</td><td><textarea class='form_settings_textarea' rows='10' cols='50' type='text'  name='postContent' >$postContent</textarea></td></tr>
                        <tr><td class='sidebar_font' >Date</td><td><input type='text' class='form_settings_input'  name='postDate' value=$postDate /></td></tr>
                        <input type='hidden' name='flag' value='updatePost' />
                        <input type='hidden' name='postId' value=$postId />
                        <tr><td></td><td><input type='submit' value='Update' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
                    </table><br><br>
                </form>
            ";
    }








   /**
    *该函数用于接收删除评论的数据，会发给commentCrud.php一个post请求。flag中标识delComment，将要执行delComment操作。
    *
    *@param $commentId  Int;
    *@return  void
    */

    function deleteComment($commentId){
    
        $res = listCommentByCommentId($commentId);
    
        $commentAuthor=$res['comment_author'];
        $commentContent=$res['comment_content'];
        $commentDate = $res['comment_date'];
        echo "
        <form action=".COMMRNT_CRUD_TOOL_PATH_SELF."commentCrud.php method='post'>    
            <h3 class='title_font' >Delete Comment</h3>
            <table>        
                <tr><td class='sidebar_font' >Author</td><td><input type='text' class='form_settings_input' name='commentAuthor' value='$commentAuthor'  /></td></tr>
                <tr><td class='sidebar_font' >Content</td><td><textarea class='form_settings_textarea' rows='10' cols='60' type='text' name='commentContent'  >$commentContent</textarea></td></tr>
                <tr><td class='sidebar_font' >Date</td><td><input type='text' class='form_settings_input' name='commentDate' value='$commentDate'  /></td></tr>
                <input type='hidden' name='flag' value='delComment' />
                <input type='hidden' name='commentId' value=$commentId />
                <tr><td></td><td><input type='submit' value='Delete' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
            </table><br><br>
        </form>
        ";
    }
   
   
   
   
   
     /**
      *该函数用于接收更新评论的数据。会发给commentCrud.php一个post请求。flag中标识 updateComment，将要执行updateComment操作。
      *
      *@param  $commentId  Int;
      *@return  void;
      *
      */

   function updateComment($commentId){
    
        $res = listCommentByCommentId($commentId);
    
        $commentAuthor=$res['comment_author'];
        $commentContent=$res['comment_content'];
        $commentDate = $res['comment_date'];
        echo "
            <form action=".COMMRNT_CRUD_TOOL_PATH_SELF."commentCrud.php method='post'>    
                <h3 class='title_font' >Update Comment</h3>
                <table>        
                    <tr><td class='sidebar_font' >Author</td><td><input class='form_settings_input' type='text'  name='commentAuthor' value='$commentAuthor'  /></td></tr>
                    <tr><td class='sidebar_font' >Content</td><td><textarea class='form_settings_textarea' rows='10' cols='60' type='text' name='commentContent'  >$commentContent</textarea></td></tr>
                    <tr><td class='sidebar_font' >Date</td><td><input type='text' class='form_settings_input' name='commentDate' value='$commentDate'  /></td></tr>
                    <input type='hidden' name='flag' value='updateComment' />
                    <input type='hidden' name='commentId' value=$commentId />
                    <tr><td></td><td><input type='submit' value='Update' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
                </table><br><br>
            </form>
        ";
   }
   
   
     /**
      *该函数用于接收添加评论的数据。会发给commentCrud.php一个post请求。flag中标识 addComment，将要执行 addComment操作。
      *
      *@param  $postId Int;
      *@return  void;
      */

    function addComment($postId){
       
        echo "
            <form action=".COMMRNT_CRUD_TOOL_PATH_SELF."commentCrud.php method='post'>
                
                <h2 class='title_font' >Comment</h2>
                <table>       
                    <tr><td><h2>Author</h2></td><td><input class='form_settings_input' type='text'  name='commentAuthor' /></td></tr>
                    <tr><td><h2>Content</h2></td><td><textarea class='form_settings_textarea' rows='10' cols='60' type='text' name='commentContent' ></textarea></td></tr>
                    <input type='hidden' name='flag' value='addComment' />
                    <input type='hidden' name='postId' value=$postId />
                    <tr><td></td><td><img src='".ROOT_URL."includes/checkCode.php' onclick=this.src='".ROOT_URL."includes/checkCode.php?num='+Math.random() value='换一张' /></td></tr>
                    <tr><td class='sidebar_font'><h2>Checkcode</h2></td><td><input  class='form_settings_input' type='text' name='myCheckCode'></td></tr>
                    <tr><td></td><td><input type='submit' value='Add' class='button_small_add'/>&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' class='button_small_add' /></td></tr>
                </table><br><br>
            </form>
        ";
   }
   

    /**
    *该函数用于列出指定文章的所有评论的详细信息。
    *
    *建议接收listCommentByPostId()函数返回的结果
    *
    *@param $res  Array  #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
    *                            #每条记录的内容为 comment_date,comment_author,comment_id,comment_content。
    *@return  void
    */
    function showCommentByPost($arr){
        $res= listCommentByPostId($arr);
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            $floor=$i+1;
            echo "<hr>";
            echo "<table width='90%' ><br>";
            echo "<tr><b>第".$floor."楼</b></tr><br>";
            echo "<tr><td width='10%'><b>{$row['comment_author']}</b></td><td width=*>{$row['comment_date']}</td></tr>";
            echo "<tr><td colspan='2'>{$row['comment_content']} </tr>";
            echo "</table><br><br>   <hr>" ;  
          }      
    }


    /**
     *该函数用于分页查询所有评论的具体信息。
     *
     *如果执行成功，返回$res，默认释放资源,关闭链接;
     *
     *@param $arr  Array()  #array(_,代表评论的第几页,代表每页显示多少评论);
     *@return $res  Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容包括包括 comment_date,comment_author,comment_id,comment_content。
     *
     */    
    function manageAllComments($arr){
        
        $res= listAllCommentsDetail($arr);
        
        echo "<table align='center' class='sidebar_font' >"; 
        echo "<tr><td width=5% >Id</td><td width=15% >Author</td><td width=30% >Date</td><td width=30% >Content</td><td width=10%>Update</td><td width=10%>Delete</td></tr>";
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            $commentId=$row['comment_id'];
            $comment_content=substr($row['comment_content'],0,20);
            echo "<tr>
                     <td>$commentId</td>
                     <td>{$row['comment_author']}</td>
                     <td>{$row['comment_date']}</td>
                     <td>{$comment_content}</td>
                     <td>
                      <a href='updateCommentEditor.php?commentId=$commentId' class='button_small_yellow'>Update</a>
                     </td>
                     <td>
                        <a href='deleteCommentEditor.php?commentId=$commentId' class='button_small_yellow'>Delete</a>         
                     </td>
                </tr>";          
        }
        echo "</table>";  
    }
    
    
    /**
     *该函数用于返回文章除去文章内容的其他信息，并且返回 多篇文章的Profile。
     *
     *可以用于显示文章列表。需要通过迭代器取出每个数组，一条数组就是一篇完整的文章信息。
     *
     *@param $arr  Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
     *@return $res  Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容  post_title, post_date,post_type,post_author,post_id。
     */
    function manageAllPosts($arr){
        
        $res=listPostProfile($arr);
        
        echo "<table align='center' class='sidebar_font' >"; 
        echo "<tr><td width=5%>Id</td><td width=15% >Title</td><td width=10% >Type</td><td width=10% >Author</td><td width=25% >Date</td><td width=10% >Update</td><td width=10% >Delete</td></tr>";
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            $post_title=substr($row['post_title'],0,15);
            $postId=$row['post_id'];
            echo "<tr>
                    <td>$postId</td>
                    <td>$post_title</td>
                    <td>{$row['post_type']}</td>
                    <td>{$row['post_author']}</td>
                    <td>{$row['post_date']}</td>
                    <td><a href='updatePostEditor.php?postId=$postId' class='button_small_add'>Update</a></td>
                    <td>
                        <a href='deletePostEditor.php?postId=$postId' class='button_small_yellow'>Delete</a>
                    </td>
                </tr>";
          
        }
        echo "</table>";        
    }
    
    /**
     *该函数用于echo出html文档<head></head>部分的具体内容
     *
     *@param  void;
     *@return  void;
     */
    function showHead(){
        echo "
        <title>Duckblog</title>
        
        
        
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <link rel='shortcut icon' href=".THEMES_URL."images/duck.ico />
        <link href=".THEMES_URL."css/styles.css rel='stylesheet' type='text/css' media='screen' />
        <link rel='stylesheet' href=".THEMES_URL."css/nivo-slider.css type='text/css' media='screen' />
        <script type='text/javascript' src=".THEMES_URL."js/cufon-yui.js ></script>
        <script type='text/javascript' src=".THEMES_URL."js/English_italic_500.font.js ></script>
        <script type='text/javascript'>
            Cufon.replace ('h1')('h2')('h3')('#menu a', {hover: true});
        </script>
        <script type='text/javascript' src=".THEMES_URL."js/jquery-1.4.3.min.js ></script>
        <script type='text/javascript' src=".THEMES_URL."js/jquery.nivo.slider.pack.js ></script>
        <script type='text/javascript'>
            $(window).load(function() {
                $('#slider').nivoSlider();
             });
        </script>        
        
        ";
    }
    
    /**
     *该函数用于一键切换主题。将themeName以post方式发送给themesSwither.php处理。
     *
     *@param  void;
     *@return  void;
     */
    function switchTheme(){
        echo "

        <form action='".ROOT_URL."themesSwither.php' method='post'>
            <input type='hidden' name='themeName' value ='default/' />
           <input  type='submit' value='Style'  class='button_small_add' />
        </form>

        ";
    }

    /**
     *该函数用于echo出<header></header>部分的具体内容
     *
     *@param void
     *@return void
     *
     */
    
    function showHeader(){
        echo "
            <ul>
                <li class='current'><a href='index.php'>Home</a></li>
                <li><a href='index.php'>Blog</a></li>
                <li><a href='contact.php'>Contact</a></li>
                <li><a href='about.php'>About</a></li>

            </ul>
            
        ";        
    }
    
    
    /**
     *该函数用于echo出sidebar部分的具体内容.
     *
     *@param void
     *@return void
     *
     */
    function showSidebar(){
        echo "
        
            <div class='sidebar'>
                <div class='sidebar_item'>
                  <h1>Recommend</h1>
                    ".
                      showPostRecomand(listPostRecomandProfile(array('',1,10)))
                    ."
                </div><!--close sidebar_item--> 
            </div><!--close sidebar-->
    
            <div class='sidebar'>
                <div class='sidebar_item'>
                  <h1>Label</h1>
                     ".
                      showPostType(listPostTypeProfile(array('',1,30)))
                    ."
                </div><!--close sidebar_item--> 
            </div><!--close sidebar-->
    
            <div class='sidebar'>
                <div class='sidebar_item'>
                  <h3>November 2012</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim.</p>         
                </div><!--close sidebar_item--> 
            </div><!--close sidebar-->
    
            <div class='sidebar'>
                <div class='sidebar_item'>
                  <h2>Contact</h2>
                  <p>Phone: +44 (0)1234 567891</p>
                  <p>Email: <a href='mailto:info@youremail.co.uk'>info@youremail.co.uk</a></p>
                </div><!--close sidebar_item--> 
            </div><!--close sidebar-->    
        ";        
    }
    
    /**
     *该函数用于 echo 出 <div class='slideshow'></div> 中的具体内容
     *
     *@param  void
     *@return  void
     */
    function showSlideshow(){
        
        echo "

            <div id='slider' class='nivoSlider'>
                <img src=".THEMES_URL."images/header.jpg alt='Welcome to DuckBlog!' />
                <img src=".THEMES_URL."images/header2.jpg alt='Thinking and sharing here'/>
                <img src=".THEMES_URL."images/header3.jpg alt='Enjoy your trip here :>' />
            </div>  
        ";
        
    }
    
    /**
     *该函数用于 echo 出footer部分的具体内容
     *
     *@param  void
     *@return  void
     *
     */
    function showFooter(){
        echo "
<div class='footer_bg'>    
        <div class='main'>
                        <div class='container_24'>
                            <div class='container-2'>
                                <div class='wrapper'>
                                    <div class='grid_6 suffix_1'>
                                        <h3 class='color-3 indent-bot4'>DuckBlog</h3>
                                        <h4 class='block mb6'></h4>
                                        <a href='index.php'  class='link-2'>DuckBlog is a free blogSystem for you and you can share your thoughts with others here.</a>
                                      <p class='img-indent-bot'>You can contact duck if you have any idea to share with duck.</p>
                                        <a href='mailto:duckHere@tutamail.com' class='button-1'>Contact Duck</a> 
                                    </div>
                                    <div class='grid_6 suffix_1'>
                                        <h3 class='color-3 indent-bot4'>Duck's Github</h3>
                                        <p class='it text-1 mb6'>&quot; If you like DuckBlog system,you can fork it on Github, and duck is also open for your advice.&quot;</p>                                      
                                        <a href='https://github.com/catiscat' class='button-1'>follow Duck on Github</a>
                                    </div>
                                    <div class='grid_10'>
                                        <h3 class='color-3 indent-bot4'>Recent Photos</h3>
                                        <div class='wrapper p1'>
                                            <div class='grid_2 alpha'>
                                                <a class='lightbox-image' href='index.php'><img src=".THEMES_URL."images/pic1.jpg alt='' />
                                                <span class='masked'></span></a>                                          </div>
                                            <div class='grid_2'>
                                                <div class='img-container-1'>
                                                    <a class='lightbox-image' href='contact.php'><img src=".THEMES_URL."images/pic2.jpg alt='' />
                                                    <span class='masked'></span></a>                                                </div>
                                          </div>
                                            <div class='grid_2'>
                                                    <a class='lightbox-image' href='about.php'><img src=".THEMES_URL."images/pic3.jpg alt='' />
                                                    <span class='masked'></span></a>                                          </div>
                                            <div class='grid_2'>
                                                <a class='lightbox-image' href='https://github.com/catiscat'><img src=".THEMES_URL."images/pic4.jpg alt='' />
                                                <span class='masked'></span></a>                                          </div>
                                            
                                        </div>
                                        <div class='wrapper'>
                                            <div class='grid_2 alpha'>
                                                <a class='lightbox-image' href='mailto:duckHere@tutamail.com'><img src=".THEMES_URL."images/pic5.jpg alt='' />
                                                <span class='masked'></span></a>                                          </div>
                                            <div class='grid_2'>
                                                <a class='lightbox-image' href='https://duckdog.lol.com'><img src=".THEMES_URL."images/pic6.jpg alt='' />
                                                <span class='masked'></span></a>                                          </div>
                                            <div class='grid_2'>
                                                <a class='lightbox-image' href='https://github.com/catiscat'><img src=".THEMES_URL."images/pic7.jpg alt='' />
                                                <span class='masked'></span></a>                                          </div>
                                            <div class='grid_2'>
                                                <a class='lightbox-image' href='about.php'><img src=".THEMES_URL."images/pic8.jpg alt='' />
                                                   <span class='masked'></span></a>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div id='footer_bot'>
                   <div class='main'><div class='footer_left'>Copyright 2016 DuckBlog. </div><div class='footer_right'>Website Design by <a href='http://www.libdesigner.com' title='Website Design Blog'>Website Design Blog</a></div></div>
            </div>
          </div>
        ";        
        
    }
    
    /**
     *该函数用于 echo 出 login 的表单，并将登陆信息发送给adminCrud.php处理。
     *
     *登陆信息包括adminId、adminPassword、myCheckCode，发送方式是post请求。
     *
     *@param  void;
     *@return  void。
     */
    
    function showLoginInfo(){
    
        echo  "
            <form action=".ADMIN_CRUD_TOOL_PATH_SELF."adminCrud.php method='post'>
                <table>
                    <tr><td class='sidebar_font' >ID</td><td><input class='form_settings_input' type='text' name='adminId'></td></tr>
                    <tr><td class='sidebar_font' >Password</td><td><input class='form_settings_input' type='password' name='adminPassword'></td></tr>
                    <tr><td class='sidebar_font'>Checkcode</td><td><input class='form_settings_input' type='text' name='myCheckCode'></td><td><img src='".ROOT_URL."includes/checkCode.php' onclick=this.src='".ROOT_URL."includes/checkCode.php?num='+Math.random() /></td></tr>
                    <tr><td><input class='button_small_add' type='submit' value='Login'/></td><td><input class='button_small_add' type='reset' value='Reset' /></td></tr>
                </table>
            </form>
            ";
    }
    
    /**
     *该函数用于 echo 出分页显示、跳转至某页的表单。
     *
     *建议分页显示默认调用该函数。
     *
     *@param  $pageNow,$gotoUrl  # $pageNow Int,$gotoUrl String ;
     *@return  void;
     */
    function rollPage($pageNow,$gotoUrl){
        if($pageNow==1){
            $pageLast=1;
        }else{
        $pageLast=$pageNow-1;
        }
        $pageNext=$pageNow+1;
        
        echo "
        
        <form action='$gotoUrl'>
              跳转到：<input class='form_settings_input' type='text' name='pageNow'  />
                
              <input class='button_small_add' type='submit' value='GO' />
              <a class='button_small_yellow' href='$gotoUrl?pageNow=$pageLast'>Last Page</a>
              <a class='button_small_yellow' href='$gotoUrl?pageNow=$pageNext'>Next Page</a>
        </form>
          ";
    }
    /**
     *该函数用于echo 出分页显示、跳转至某页 的表单;
     *
     *建议在postListByType.php 页面调用;
     *
     *@param  $pageNow,$postType  #Int $pageNow, String $postType;
     *@return  void。
     *
     */
    function rollPageByPostType($pageNow,$postType){
        if($pageNow==1){
            $pageLast=1;
        }else{
        $pageLast=$pageNow-1;
        }
        $pageNext=$pageNow+1;

        echo "
        
        <form action='postListByType.php' >
                    <input type='hidden' name='postType' value=$postType />
              跳转到：<input type='text' name='pageNow'  />
                
              <input class='button_small_add' type='submit' value='GO' />
              <a class='button_small_yellow' href='postListByType.php?postType=$postType&&pageNow=$pageLast'>Last Page</a>
              <a class='button_small_yellow' href='postListByType.php?postType=$postType&&pageNow=$pageNext'>Next Page</a>
        </form>
          ";
    }
    
    /**
     *该函数用于 echo 出大标题。
     */
    function showBigTitle(){
        
        echo "
            <br><h3 class='big_title_font'>Duck Blog</h3><br><hr><br><br>
        ";
    }
    
    
    
    /**
     *该函数用于根据$postId返回文章内容，并且只返回一篇文章内容。
     *
     *@param $postId
     *@return void #文章内容
     */
   
    function showPostContent($postId){
        $content=listPostContent($postId);
        echo $content;        
    }
    
    
    
    
        /**
     *该函数用于列出所有的文章列表。
     *
     *建议接收listPostProfile返回的结果。
     *
     *@param $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。因此必须通过迭代器打出。
     *                          #每条记录的内容为  post_title, post_date,post_type,post_author,post_id。
     *@return  void
     */
    function showPostByType($arr){
        $res=listPostByType($arr);
        echo "<ul >";    
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            echo "<table width='60%'>";
            echo "<tr><td colspan='2'><h3 class='title_font'><li><a  href=postReader.php?postId={$row['post_id']} target=_blank> {$row['post_title']}</a></li></h3></tr>";
            echo "<tr><td width='50%'><span class='small_font'>{$row['post_date']}</span></td><td width='*'><span class='small_font'>标签：{$row['post_type']}</span></td></tr>";
        }    
      
        echo "</table><br><br>";
        echo "</ul>";
    }
    
    
    /**
     *该函数用于列出post的列表
     *
     *@param $arr  Array   #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
     *                          #每条记录的内容为   post_title, post_date,post_type,post_author,post_id。
     *@return  void
     */
    function showPostList($arr){
        $res=listPostProfile($arr);
        echo "<ul >";    
        for($i=0;$i<count($res);$i++){
            $row=$res[$i];
            echo "<table width='60%'>";
            echo "<tr><td colspan='2'><li><a  href=postReader.php?postId={$row['post_id']} target=_blank><span class='title_font'> {$row['post_title']}</span></a></li></tr><br>";
            echo "<tr><td width='50%'><span class='small_font'>{$row['post_date']}</span></td><td width='*'><span class='small_font'>标签：{$row['post_type']}</span></td></tr><br><br>";
        }    
      
        echo "</table><br><br>";
        echo "</ul>";
    }

    
?>