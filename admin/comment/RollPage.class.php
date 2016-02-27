<?php 

	//这是一个用于保存分页信息的类
    class RollPage{
    
        public $pageSize=10;
        public $res_array; //这是显示数据
        public $rowCount; //这是从数据库中获取
        public $pageNow; //用户指定的
        public $pageCount;//这是计算得到的
        public $navigate; //分页导航
        public $gotoUrl; //表示把分页请求提交给哪个页面
    }

?>
