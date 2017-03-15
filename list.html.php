<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查询列表</title>
</head>
<body>
<div>
	<ul>
    	<?php foreach ($result as $row):?>
        	<li><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8')?></li>
        <?php endforeach;?>
    </ul>
    <ul>
    	<?php foreach ($result as $row):?>
        	<li><?php echo htmlspecialchars($row['email'],ENT_QUOTES,'UTF-8')?></li>
        <?php endforeach;?>
    </ul>
    <ul>
    	<?php foreach ($result as $row):?>
        	<li><?php echo htmlspecialchars($row['text'],ENT_QUOTES,'UTF-8')?></li>
        <?php endforeach;?>
    </ul>
</div>
<p><a href="client.html.php">返回</a></p>
</body>
</html>
