<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>服务器信息</title>
  </head>
  <body>
    <table>
      <tr><th colspan="2">服务器信息展示</th></tr>
	  <tr>
		  <td>当前PHP版本号：</td><td><?php echo PHP_VERSION; ?></td>
	  </tr>
	  <tr>
	    <td>操作系统的类型:</td><td><?php echo PHP_OS; ?></td>
	  </tr>
    </table>
  </body>
</html>