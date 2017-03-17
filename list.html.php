<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查询列表</title>
</head>
<body>
<?php
function html($abb){
	return htmlspecialchars($abb, ENT_QUOTES,'UTF-8');
	}
function htmlout($abb){
	echo html($text);
	}
?>
<div>
	<ul>
    	<?php foreach ($result as $row):?>
        	<li><?php htmlout($row['name'])?></li>
        <?php endforeach;?>
    </ul>
    <ul>
    	<?php foreach ($result as $row):?>
        	<li><?php htmlout($row['email'])?></li>
        <?php endforeach;?>
    </ul>
    <ul>
    	<?php foreach ($result as $row):?>
        	<li><?php htmlout($row['text'])?></li>
        <?php endforeach;?>
    </ul>
</div>
<p><a href="client.html.php">返回</a></p>
</body>
</html>