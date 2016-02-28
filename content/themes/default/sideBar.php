
<div class="div4">
    <a href="index.php"><img class="bigduck" src="images/bigDuck.png" /></a><br>
	    <a href="index.php"><h5>Duck's Site</h5></a>
	    <a href="contact.php"><h5>Duck's Email</h5></a>
	    <a href="https://github.com/catiscat"><h5>Duck's GitHub</h5></a>
	    <h3>订阅DuckBlog</h3>
	    <a href="#feed"><img class="feed" src="images/feed.ico" /></a>
</div><hr>



<div class="div5">
	    <?php 
		    require_once dirname(__FILE__)."/languages/articleList.css.php";
		
		
		    echo '<h3>'.div5().'</h3>';
	
	    ?>
	
	    <?php 
	        for($i=0;$i<count($res2);$i++){
            $row=$res2[$i];                    
            echo "<a href='readPost.php?id={$row['id']}'>{$row['post_title']}</a><br><br>";
        }
          
    ?>

</div><hr>




<div class="div6">
    <h3>分类标签</h3>
    <a href='#'>> IT</a><br><br>
    <a href='#'>> 编程</a><br><br>
    <a href='#'>> 心理学</a><br><br>
    <a href='#'>> 职场</a><br><br>
    <a href='#'>> 随感</a><br><br>
    <a href='#'>> 转载</a><br><br>
</div><br><br><br>

