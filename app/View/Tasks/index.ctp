<h2>未完了タスク一覧</h2>

<?php echo $this->Html->link('新規タスク登録','/Tasks/create');?>


<h3><?php count($tasks) ;?>件のタスクが未完了です</h3>

<table>
<tr>
<th>ID</th>
<th>タスク名</th>
<th>期限</th>
<th>作成日</th>
<th>操作</th>

</tr>


<?php foreach ($tasks as $task): ?>
<tr>
    <td><?= $this->Html->link($task['Task']['id'],'Task/view'.$task['Task']['id']); ?></td>

    <td><?= h($task['Task']['name']) ?></td>
    <td><?= h($task['Task']['due_date']) ?></td>
    <td><?= h($task['Task']['created']) ?></td>
    <td><?= $this->Html->link('タスクを完了する','Task/done'); ?><td>
</tr>
<?php endforeach;?>
</table>



