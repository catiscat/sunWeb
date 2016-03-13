<?php
	date_default_timezone_set('PRC');
	require_once($_SERVER['DOCUMENT_ROOT']."load.php");
	require_once(SQL_HELPER_PATH."SqlHelper.class.php");
	require_once(CRUD_TOOL_PATH."CleanData.class.php");
	//require_once($_SERVER['DOCUMENT_ROOT']."/includes/checkSessionInfo.php");
	//checkSessionInfo();
?>


<?php 


	/**
	 *该类用于对文章的增删改查操作。同时过滤指定参数。
	 *
	 */
class PostCRUD{
	
	/**
	 *$flag 用于识别具体执行哪种类型（增，删，改）的操作。
	 */
	
	public $flag="" ;
	
	
	/**
	 *此函数是手动调用，初始化flag的值
	 *
	 *@param void
	 *
	 *@return void;
	 *
	 */
    function construct(){

        
        if(!empty($_REQUEST['flag'])){
		    //接收flag的值
		    $this->flag=$_REQUEST['flag'];
	    }else{
	        echo "flag参数错误".$_REQUEST['flag'];
	        return;
	    }
        
	}
	

    /**
	 *定义一个检测是否为空的函数，如果为空，终止运行，否则返回接收的值
	 *
	 *如果$str==0,{};
	 *如果$str不为空，用cleanDate过滤 $str
	 *否则，终止执行。
	 *
	 *@param $str: String
	 *@return $str: String
    */
	function isEmpty($link,$str){
		if($str==0){}
		else if(!empty($str)){

				$str=cleanData($link,$str);		
		}else{
			echo $str."is empty";return;
		}
		return $str;
	}

	/**
	 *该函数用于执行删除post的操作。
	 *
	 *@param $arr : Array(); #array($postId)
	 *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
	 *
	 */
 
    function del($arr){
        	//创建了一个$sqlHelper的对象实例
	    $sqlHelper=new SqlHelper();
        $postId= $this->isEmpty($sqlHelper->conn,$arr[0]);
        $sql = "delete from posts where post_id= $postId";
		$res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
	
	/**
	 *该函数用于执行添加post的操作。
	 *
	 *@param $arr : Array(); #array($postTitle,$postDate,$postType,$postAuthor,$postContent)
	 *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
	 *
	 */
	
    function add($arr){
		
	    $sqlHelper=new SqlHelper();
        $postTitle=$this->isEmpty($sqlHelper->conn,$arr[0]);
	    $postAuthor=$this->isEmpty($sqlHelper->conn,$arr[1]);
	    $postType = $this->isEmpty($sqlHelper->conn,$arr[2]);
	    $postContent=$this->isEmpty($sqlHelper->conn,$arr[3]);
	    
	    $postDate = date("Y-m-d H:i:sa");
		$sql="insert into 
		posts (post_title,post_date,post_type,post_author,post_content) 
		values ('$postTitle','$postDate','$postType','$postAuthor','$postContent')";
		$res=$sqlHelper->execute_dml($sql);
		$sqlHelper->close_connect();
		return $res;
    }
    
    /**
	 *该函数用于执行更新post的操作。
	 *
	 *@param $arr : Array(); #array($postId，$postTitle,$postDate,$postType,$postAuthor,$postContent)
	 *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
	 *
	 */
    function update($arr){
		
	    $sqlHelper=new SqlHelper();
        $postId=$this->isEmpty($sqlHelper->conn,$arr[0]);
	    $postTitle=$this->isEmpty($sqlHelper->conn,$arr[1]);
	    $postDate = $this->isEmpty($sqlHelper->conn,$arr[2]);
	    $postType = $this->isEmpty($sqlHelper->conn,$arr[3]);
	    $postAuthor=$this->isEmpty($sqlHelper->conn,$arr[4]);
	    $postContent=$this->isEmpty($sqlHelper->conn,$arr[5]);    
	
		$sql="update  posts 
		set post_title ='$postTitle',
		    post_date ='$postDate',
		    post_type = '$postType',
		    post_author = '$postAuthor',
		    post_content = '$postContent'
		where post_id  = $postId";
		$res=$sqlHelper->execute_dml($sql);
		$sqlHelper->close_connect();
		return $res;
    }



	/**
	 *该函数用于 分页查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function selectByProfile($arr){
		
        $sqlHelper=new SqlHelper();
        if(!(is_int($arr[1]) && is_int($arr[2]))){echo "请检查错误！以下二者存在非int,字符类型不合法-> str[1]=".$arr[1]." str[2]=".$arr[2];  return ;}
                
        $sql = "select post_title, post_date,post_type,post_author,post_id from posts limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];
     
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;
    }
	
	/**
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。和selectByProfile的区别是传入值只有$postId.
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId : Int  #代表文章id.
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录 并且仅仅 一条 记录。
	 *
	 */
    function selectByProfileInputPostIdOnly($postId){
        $sqlHelper=new SqlHelper();
        if(!(is_int($postId))){echo "请检查错误！以下二者存在非int,字符类型不合法-> postId->".$postId; return ;}
                
        $sql = "select post_title, post_date,post_type,post_author,post_id from posts where post_id=".$postId;
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;
    }
	/**
	 *该函数用于 查询 post_title, post_date,post_type,post_author,post_id，包括 文章内容。和selectByProfileSingle的区别是 返回文章内容.
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $postId : Int  #代表文章id.
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function selectByContent($postId){
        $sqlHelper=new SqlHelper();
        $postId= $this->isEmpty($sqlHelper->conn,$postId);
        
        $sql = "select post_title, post_date,post_type,post_author,post_id,post_content from posts where post_id='$postId' ";
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;
    
    }
    
	/**
	 *该函数用于 分页查询 post_title, post_date,post_type,post_author,post_id，不包括文章内容。第一个留空值可以为将来选择推荐文章算法用。
	 *
	 **如果执行成功，返回$res，默认释放资源,关闭链接;
	 **
	 *@param $arr : Array()  #array(___,代表文章的第几页 ,代表文章每页多少篇文章),第一个留空值可以为将来选择推荐文章算法用。
	 *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
	 *
	 */
    function selectByRecomand($arr){
    
        $sqlHelper=new SqlHelper();
        if(!(is_int($arr[1]) && is_int($arr[2]))){echo "请检查错误！以下二者存在非int,字符类型不合法-> str[1]=".$arr[1]." str[2]=".$arr[2];  return ;}
        
        
        $sql = "select post_title, post_date,post_type,post_id from posts  limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;
    
    }
    
	/**
	 *此函数用来通过传入文章类型，返回文章的标题，时间，作者，id 的信息。
	 *
	 *传入的参数有三个，如下
	 *
	 *@param $arr : Array  # array(postType,代表文章的第几页 ,代表文章每页多少篇文章)
	 *@return  array(array(post_title, post_date,post_type,post_author,post_id)) : Array(Array)
	*/
    function selectByType($arr){
	    $sqlHelper=new SqlHelper();
		$sql = "select post_title, post_date,post_type,post_author,post_id from posts where post_type='$arr[0]' limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];
		$res=  $sqlHelper-> execute_dql($sql);
		$sqlHelper->close_connect();
		return $res;
    }
	
	/**
	 *此函数用于查询所有的文章类型
	 *
	 *传入的参数有三个，如下
	 *
	 *@param $arr : Array  # array(_,代表文章的第几页，代表文章每页多少篇文章)
	 *@return array(array(post_type)) :Array(Array)
	*/
	function selectType($arr){
		$sqlHelper=new SqlHelper();
		
		if(!(is_int($arr[1]) && is_int($arr[2]))){echo "请检查错误！以下二者存在非int,字符类型不合法-> str[1]=".$arr[1]." str[2]=".$arr[2];  return ;}
		
		$sql = "select distinct  post_type  from posts   limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];
		$res=  $sqlHelper-> execute_dql($sql);
		$sqlHelper->close_connect();
		return $res;
	}

	/**
	 *该函数根据flag的值，确定执行增，删，改。
	 *
	 *@param void
	 *@return 增删改结果。
	 *
	 */
    function getRes(){
	    //如果$flag=="del"，说明用户要执行删除博文的请求
           
	    if($this->flag=="delPost"){
	        
	        return $this->del(array($_REQUEST['postId']));
		
	    }else if($this->flag=="addPost"){
	
	        return $this->add(array($_REQUEST['postTitle'],$_REQUEST['postAuthor'],$_REQUEST['postType'],$_REQUEST['postContent']));
		
	    }else if($this->flag=="updatePost"){
	
                return $this->update(array(intval($_REQUEST['postId']),$_REQUEST['postTitle'],$_REQUEST['postDate'],$_REQUEST['postType'],$_REQUEST['postAuthor'],$_REQUEST['postContent']));
            
	    }
    }
    
	/**
	 *返回上一页，当给该函数请求时返回。
	 *
	 */
    function goBack(){
         header("Location:".$_SERVER['HTTP_REFERER']);
    }
}
?>
