<?php
    $arr = [
        ['PHP开发', 'web前端进阶', 'PHP+H5全栈开发'],
        // ……（请参考本书配套源代码）
    ];
?>
<h2>PHP培训课程信息</h2>
<ul>
  <?php foreach($arr as $values): ?>
  <?php foreach($values as $k => $v): ?>
    <?php echo $k > 0 ? "<li>$v</li>" : "<p>$v</p>"; ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</ul>