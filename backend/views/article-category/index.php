<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>分类名</th>
        <th>分类描述</th>
        <th>状态</th>
        <th>文档类型</th>
        <th>排序</th>
        <th>操作</th>
    </tr>
    <?php foreach ($categorys as $category):?>
        <tr>
            <td><?=$category->id?></td>
            <td><?=$category->name?></td>
            <td><?=$category->intro?></td>
            <td><?=\backend\models\ArticleCategory::$statusOptions[$category->status]?></td>
            <td><?=\backend\models\ArticleCategory::$helpOptions[$category->is_help]?></td>
            <td><?=$category->sort?></td>
            <td><?=yii\bootstrap\Html::a('修改',['article-category/update','id'=>$category->id],['class'=>'btn btn-warning btn-xs'])?> <?=yii\bootstrap\Html::a('删除',['article-category/delete','id'=>$category->id],['class'=>'btn btn-danger btn-xs'])?></td>
        </tr>
    <?php endforeach;?>
</table>