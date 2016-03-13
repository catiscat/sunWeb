<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
    require_once(COMMRNT_CRUD_TOOL_PATH."commentFunctions.php");
    require_once(POST_CRUD_TOOL_PATH."postFunctions.php");


?>

<?php

    /**
	 *该函数只返回一篇文章的所有信息的记录。
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，post_content 包括 文章内容。和selectByProfileSingle的区别是 返回文章内容.
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId  Int  #代表文章id.
	 *@return $res  Array  #$res是一个array
	 *
	 */
    function listSinglePostAll($postId){
        $res = getPostAll($postId);
        return $res;
    }
  
    /**
     *该函数用于根据$postId返回文章标题，并且只返回一篇文章的Profile。
     *
     *@param $postId  Int
     *@return $res  Array  #$res是一个array 该array 元素有 post_title, post_date,post_type,post_author,post_id 
     */
    function listSinglePostProfile($postId){
        $res = getPostProfile($postId);
        return $res;
    }
    
    /**
     *该函数用于根据$postId返回文章内容，并且只返回一篇文章内容。
     *
     *@param $postId
     *@return $post_content #文章内容
     */
    function listPostContent($postId){
        $content = getPostContent($postId);
		return $content['post_content'];
    }

    /**
     *该函数用于返回文章除去文章内容的其他信息，并且返回 多篇文章的Profile。
     *
     *可以用于显示文章列表。需要通过迭代器取出每个数组，一条数组就是一篇完整的文章信息。
     *
	 *@param $arr  Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return $res  Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容  post_title, post_date,post_type,post_author,post_id。
     */
    function listPostProfile($arr){
        $res = getPostList($arr);
        return $res;
    }
    
    

    
    /**
     *此函数用于 根据文章类型，返回文章id的array集合。
	 *此函数用来通过传入文章类型，返回文章的标题，时间，作者，id 的信息。
	 *
	 *@param $arr  Array  # array(postType,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return  $postIdArr   Array #文章id的array集合。
	*/
    function listPostByType($arr){
        $res = getPostByType($arr);
	    return $res;
    }
    
    /**
     *该函数用于返回返回推荐文章列表。可以内置推荐算法。
     *
	 *该函数用于 分页查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。第一个留空值可以为将来选择推荐文章算法用。
	 *如果执行成功，返回$res，默认释放资源,关闭链接;
	 *
	 *@param $arr  Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章),第一个留空值可以为将来选择推荐文章算法用。
	 *@return $res  Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function listPostRecomandProfile($arr){
        $res = getPostRecomand($arr);
        return $res;
    }
    
    /**
	 *此函数用于返回所有的文章类型
	 *
	 *@param $arr  Array  # array(_,代表文章的第几页，代表文章每页多少篇文章)
	 *@return $postTypeArr   Array  这是一个post_type的array集合。
	*/
    function listPostTypeProfile($arr){
        $res = getPostType($arr);
        $postTypeArr=array();
        for($i = 0;$i<count($res);$i++){
            $postTypeArr[$i]=$res[$i]['post_type'];
        }
        return $postTypeArr;
    }
    

    
    
    
    
    /**
	 *该函数用于 分页查询指定文章的所有评论的具体信息。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 *
	 *@param $arr  Array()  #array($postId,代表评论的第几页,代表每页显示多少评论);
	 *@return $res   Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 */  
   
    function listCommentByPostId($arr){
        $res=getCommentByPostId($arr);
        return $res;
    }
    
    /**
	 *该函数用于 查询某个评论的具体信息。
	 *
	 *如果执行成功，返回$res，默认释放资源,关闭链接;
	 *
	 *@param $commentId  Int;
	 *@return $res   Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 */	
    function listCommentByCommentId($commentId){
        $res=getCommentByCommentId($commentId);
        return $res;
    }
    
    /**
	 *该函数用于 分页查询所有评论的具体信息。
	 *
	 *如果执行成功，返回$res，默认释放资源,关闭链接;
	 *
	 *@param $arr  Array()  #array(_,代表评论的第几页,代表每页显示多少评论);
	 *@return $res  Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。单条记录内容包括包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 */
    function listAllCommentsDetail($arr){
        
        $res=getAllComments($arr);
        return $res;
    }
	
	

	


	

?>