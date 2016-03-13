<?php
		require_once($_SERVER['DOCUMENT_ROOT']."load.php");
		require_once(CRUD_TOOL_PATH."CommentCRUD.class.php");
		//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
		//checkSessionInfo();
?>

<?php

    /**
	 *该函数用于 分页查询指定文章的所有评论的具体信息，包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array($postId,代表评论的第几页,代表每页显示多少评论);
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */    
    function getCommentByPostId($arr){
        $commentCRUD= new CommentCRUD();
        return $commentCRUD->selectByPostId($arr);
    }

	/**
	 *该函数用于 查询某个评论的具体信息，包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $commentId : Int;
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */	
    function getCommentByCommentId($commentId){
        $commentCRUD= new CommentCRUD();
        $res = $commentCRUD->selectByCommentId($commentId);
        return $res[0];
    }

    /**
	 *该函数用于 分页查询所有评论的具体信息，包括 comment_date,comment_author,comment_id,comment_content。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array(_,代表评论的第几页,代表每页显示多少评论);
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function getAllComments($arr){
        $commentCRUD= new CommentCRUD();
        return $commentCRUD->selectAllComments($arr);
    }
    
    
?>