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
            
        require_once "commen.php";
        checkUserValidate();
        getLastTime();
    
    ?>
    <h1>添加博文</h1>
    <?php require_once (dirname(__FILE__)."/../content/themes/default/addContentTable.php");
	    addContent("添加博文");
    ?>
</html>


