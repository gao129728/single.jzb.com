<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <script src="__JS__/jquery-1.10.1.min.js"></script>
    <script src="__JS__/layer.m.js"></script>
    <style type="text/css">
        .layui-m-layercont{ line-height: 40px !important;}
        .layui-m-layerchild{font-size:2.4rem !important;}
    </style>
</head>
<body>

    <script>layer.open({content: '<?php echo($msg);?>',time: 2 });</script>
	
    <script type="text/javascript">    
        	setTimeout(function(){
				location.href = '<?php echo($url);?>';
			},2000);
    </script>
</body>
</html>
