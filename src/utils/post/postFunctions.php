<?php
		require_once($_SERVER['DOCUMENT_ROOT']."load.php");
		require_once (CRUD_TOOL_PATH."PostCRUD.class.php");

?>


<?php
    
    
    
    /**
	 *该函数只返回一篇文章的所有信息的记录。
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，post_content 包括 文章内容。和selectByProfileSingle的区别是 返回文章内容.
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId : Int  #代表文章id.
	 *@return $res[0] :Array  #$res[0]是一个array
	 *
	 */
	function getPostAll($postId){
		$postCRUD = new PostCRUD();
		$res = $postCRUD->selectByContent($postId);
		return $res[0];
	}
	
	
	/**
	 *此函数用来通过传入文章类型，返回文章的标题，时间，作者，id 的信息。
	 *
	 *传入的参数有三个，如下
	 *
	 *@param $arr : Array  # array(postType,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return  array(array(post_title, post_date,post_type,post_author,post_id)) : Array(Array)
	*/
    function getPostByType($arr){
        $postCRUD= new PostCRUD();
        return $postCRUD->selectByType($arr);
    }
    
    /**
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，包括 文章内容。和selectByProfileSingle的区别是 返回文章内容.
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId : Int  #代表文章id.
	 *@return $res :Array  #$res[0] 是一个array
	 *
	 */
    function getPostContent($postId){
		$postCRUD = new PostCRUD();
		$res = $postCRUD->selectByContent($postId);
		return $res[0];
	}
    
    /**
     *该函数可以返回文章列表。分页查询。
	 *该函数用于  post_title, post_date,post_type,post_author,post_id，不包括文章内容。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function getPostList($arr){
        $postCRUD= new PostCRUD();
        return $postCRUD->selectByProfile($arr);
    }
    

    /**
     *该函数可以返回文章单篇文章详细信息。
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。和getPostList的区别是传入值只有$postId.返回单篇文章信息。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId : Int  #代表文章id.
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录 并且仅仅 一条 记录。
	 *
	 */
    function getPostProfile($postId){
        $postCRUD= new PostCRUD();
        $res = $postCRUD->selectByProfileInputPostIdOnly($postId);
        return $res[0];
    }
    
    
	/**
     *该函数用于返回推荐文章列表。可以内置推荐算法。
     *
	 *该函数用于 分页查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。第一个留空值可以为将来选择推荐文章算法用。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章),第一个留空值可以为将来选择推荐文章算法用。
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function getPostRecomand($arr){
        $postCRUD= new PostCRUD();
        return $postCRUD->selectByRecomand($arr);
    }
    
    /**
	 *此函数用于返回所有的文章类型
	 *
	 *传入的参数有三个，如下
	 *
	 *@param $arr : Array  # array(_,代表文章的第几页，代表文章每页多少篇文章)
	 *@return array(array(post_type)) :Array(Array)
	*/
    function getPostType($arr){
        $postCRUD= new PostCRUD();
        return $postCRUD->selectType($arr);   
    }
?>