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
 *该类用于对评论的增删改查操作。同时过滤指定参数。
 *
 */
class CommentCRUD{

    /**
     *$flag 用于识别具体执行哪种类型（增，删，改）的操作。
     */
    public $flag="";
    
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
            
            $this->flag=$_REQUEST['flag'];
        }else{
            
            echo "flag参数错误".$_REQUEST['flag'];
            return;
        }
        
    }
    
    
    /**
     *定义一个检测是否为空的函数，如果为空，终止运行，否则返回接收的值。
     *
     *如果$str==0,{};
     *如果$str不为空，用cleanDate过滤 $str;
     *否则，终止执行。
     *
     *@param $str: String
     *@return $str: String
    */
    function isEmpty($str){
        if($str==0){}
        else if(!empty($str)){

                $str=cleanData($str);        
        }else{
            echo $str."is empty";return;
        }
        return $str;
    }


    
    /**
     *该函数用于执行删除comment的操作。
     *
     *@param $arr : Array(); #array($commentId)
     *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
     *
     */
    function del($arr){
            //创建了一个$sqlHelper的对象实例
        $sqlHelper=new SqlHelper();
        $commentId= $this->isEmpty($arr[0]);
        $sql = "delete from comments where comment_id= $commentId";
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    /**
     *该函数用于执行添加 comment 的操作。
     *
     *@param $arr : Array(); #array($commentAuthor,$commentContent,$postId),$commentDate是自动生成。
     *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
     *
     */
    
    function add($arr){

        $sqlHelper=new SqlHelper();
        $commentAuthor=$this->isEmpty($arr[0]);
        $commentContent=$this->isEmpty($arr[1]);
        $postId = $this->isEmpty($arr[2]);
        $commentDate = date("Y-m-d H:i:sa");
        $sql="insert into 
        comments (comment_date,comment_author,comment_content,post_id) 
        values ('$commentDate','$commentAuthor','$commentContent','$postId')";
        
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    
    
    
    /**
     *该函数用于执行更新comment的操作。
     *
     *@param $arr : Array(); #array($commentId,$commentDate,$commentAuthor,$commentContent);
     *@return $res :Int;  #如果执行成功，返回1;否则，返回0;
     *
     */
    
    function update($arr){

        $sqlHelper=new SqlHelper();
        $commentId=$this->isEmpty($arr[0]);       
        $commentDate = $this->isEmpty($arr[1]);        
        $commentAuthor=$this->isEmpty($arr[2]);
        $commentContent=$this->isEmpty($arr[3]);    
    
        $sql="update  comments 
        set 
            comment_date ='$commentDate',            
            comment_author = '$commentAuthor',
            comment_content = '$commentContent'
        where comment_id  ='$commentId'";
        
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        //print_r($res);echo "test<----";
        return $res;
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
    
    function selectAllComments($arr){
    
       $sqlHelper=new SqlHelper();
       
        if(!(is_int($arr[1]) && is_int($arr[2]))){echo "请检查错误！以下二者存在非int,字符类型不合法-> str[1]=".$arr[1]." str[2]=".$arr[2];  return ;}
        
            $sql = "select comment_date,comment_author,comment_id,comment_content from comments limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];       
            $res=  $sqlHelper-> execute_dql($sql);
            $sqlHelper->close_connect();
            return $res;
    }
    
    /**
     *该函数用于 分页查询指定文章的所有评论的具体信息，包括 comment_date,comment_author,comment_id,comment_content。
     *
     **如果执行成功，返回$res，默认释放资源,关闭链接;
     **
     *@param $arr : Array()  #array($postId,代表评论的第几页,代表每页显示多少评论);
     *@return $res :Array(Array)  #$res 是一个结果集合，一个内层Array一条记录。
     *
     */
    function selectByPostId($arr){
        
       $sqlHelper=new SqlHelper();
    
        if(!(is_int($arr[1]) && is_int($arr[2]))){echo "请检查错误！以下二者存在非int,字符类型不合法-> str[1]=".$arr[1]." str[2]=".$arr[2];  return ;}
        $postId= $this->isEmpty($arr[0]);
        $sql = "select comment_date,comment_author,comment_id,comment_content from comments where post_id='$postId' limit ".($arr[1] -1)*$arr[2]." ,".$arr[2];       
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;
    
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
    
    function selectByCommentId($commentId){
        $sqlHelper=new SqlHelper();
        $commentId=$this->isEmpty($commentId);
        $sql = "select comment_date,comment_author,comment_id,comment_content from comments where comment_id='$commentId'";
        $res=  $sqlHelper-> execute_dql($sql);
        $sqlHelper->close_connect();
        return $res;        
    }
    
    /**
     *该函数根据flag的值，确定执行删，改。
     *
     *@param void
     *@return 删改结果。
     *
     */
    function getRes(){
           
        if($this->flag=="delComment"){
            
            return $this->del(array($_REQUEST['commentId']));
        
        }else if($this->flag=="updateComment"){
            if(empty($commentAuthor)){$commentAuthor="匿名者";}
            
            $content = array($_REQUEST['commentId'],$_REQUEST['commentDate'],$commentAuthor,$_REQUEST['commentContent']);
            
            foreach ($content as $i => $value) {if(empty($content[$i])){return 0;}}
            return $this->update($content);           
        }
    }
    
        /**
     *该函数根据flag的值，确定执行增。
     *
     *@param void
     *@return 增加结果。
     *
     */
    function getAddRes(){
           
      
            
        $commentAuthor= $_REQUEST['commentAuthor'];
        if(empty($commentAuthor)){$commentAuthor="匿名者";}
        $content = array($commentAuthor,$_REQUEST['commentContent'],intval($_REQUEST['postId']));            
        foreach ($content as $i => $value) {if(empty($content[$i])){return 0;}}
        return $this->add($content);
    
        
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
