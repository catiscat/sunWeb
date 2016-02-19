<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>雇员信息列表</title>
        <script type="text/javascript">
        <!-- 
        
        function confirmDel(val){
            
            return window.confirm("是否要删除id="+val+"的用户？");
        }
        
        
        //-->
        </script>
    </head>
    
    <?php 

	require_once "EmpService.class.php";
	require_once "RollPage.class.php";

	//创建了一个EmpService的对象实例
	$empService=new EmpService();
    
	
	
	//创建一个RollPage对象实例
	$rollPage=new RollPage();
	
	//给$rollPage指定必须的数据
	$rollPage->pageNow=1;
	$rollPage->pageSize=6;
	$rollPage->gotoUrl="empList.php";
        
        //这里我们需要根据用户的点击来修改$pageNow的值。
        //这里我们需要判断 是否有$pageNow 发送，有就使用；如果没有，则默认为显示第一页
        if(!empty($_GET['pageNow'])){
            $rollPage->pageNow=$_GET['pageNow'];  
        }
        
	
        //$pageCount=0;//这个表一共有多少页，是计算出来的。
       
       
	    //调用了getRollPage($rollPage)方法，该方法可以把分页功能完成
	    $empService->getRollPage($rollPage);
	    
	    
	    //调用getPageCount方法，获取一共有多少页
	    $pageCount=$empService->getPageCount($rollPage->pageSize);        


        //调用getEmpListByPage方法，获取应当显示的雇员信息列表
        $res2=$empService->getEmpListByPage($rollPage->pageNow,$rollPage->pageSize);
        echo "<table border='1px' width='700px' bordercolor='green' cellspacing='0px'>";
        echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
        //这里我们需要循环地显示用户的信息
        //这里我们需要通过数组取 
       /* while($row=mysql_fetch_assoc($res)){
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td><a href='#'>删除用户</td><td><a href='#'>修改用户</td></tr>";
        }
        */
        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a onclick='return confirmDel({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除用户</td><td><a href='updateEmpUI.php?id={$row['id']}'>修改用户</td></tr>";
        }
        
        
        echo "<h1>雇员信息列表</h1>";
        echo "</table>";


  
        //显示上一页和下一页
        echo $rollPage->navigate;

/*        


	//指定跳转到某页	
	echo "<br/><br/>";
*/
	?>
	<form action="empList.php">
	    跳转到:<input type="text" name="pageNow" />
	    <input type="submit" value="GO" />
	</form>
	
</html>
