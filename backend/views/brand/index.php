<?= \yii\bootstrap\Html::a('创建品牌', ['brand/add'], ['class' => 'btn btn-success']) ?>
<table class="table table-bordered">
    <tr>
    <th>ID</th>
    <th>品牌名</th>
    <th>简介</th>
    <th>状态</th>
    <th>排序</th>
    <th>LOGO</th>
    <th>操作</th>
    </tr>
    <?php foreach ($brands as $brand):?>
    <tr>
        <td><?=$brand->id?></td>
        <td><?=$brand->name?></td>
        <td><?=$brand->intro?></td>
        <td><?=\backend\models\Brand::$statusOptions[$brand->status]?></td>
        <td><?=$brand->sort?></td>
        <td><?=\yii\bootstrap\Html::img($brand->logo,['width'=>'45'])?></td>
        <td><?=yii\bootstrap\Html::a('修改',['brand/update','id'=>$brand->id],['class'=>'btn btn-warning btn-xs'])?> <?=yii\bootstrap\Html::a('删除',['brand/delete','id'=>$brand->id],['class'=>'btn btn-danger btn-xs'])?></td>
    </tr>
    <?php endforeach;?>
</table>
