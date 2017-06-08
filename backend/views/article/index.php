<?= \yii\bootstrap\Html::a('创建文章', ['article/add'], ['class' => 'btn btn-success']) ?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>文章名</th>
        <th>文章描述</th>
        <th>所属分类</th>
        <th>排序</th>
        <th>状态</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <?php foreach ($articles as $article):?>
        <tr>
            <td><?=$article->id?></td>
            <td><?=$article->name?></td>
            <td><?=$article->intro?></td>
            <td><?=$article->articlecategory->name?></td>
            <td><?=$article->sort?></td>
            <td><?=\backend\models\Article::$statusOptions[$article->status]?></td>
            <td><?=date('Y-m-d H:i:s',$article->create_time)?></td>
            <td><?=yii\bootstrap\Html::a('详情',['show/delete','id'=>$article->id],['class'=>'btn btn-info btn-xs'])?> <?=yii\bootstrap\Html::a('修改',['article/update','id'=>$article->id],['class'=>'btn btn-warning btn-xs'])?> <?=yii\bootstrap\Html::a('删除',['article/delete','id'=>$article->id],['class'=>'btn btn-danger btn-xs'])?></td>
        </tr>
    <?php endforeach;?>
</table>
