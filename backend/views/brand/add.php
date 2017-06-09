<?php
use yii\web\JsExpression;
use xj\uploadify\Uploadify;
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'intro');
echo $form->field($model,'sort');
echo $form->field($model,'status')->radioList(\backend\models\Brand::$statusOptions);
echo $form->field($model,'logo')->hiddenInput();

echo \yii\bootstrap\Html::fileInput('test', NULL, ['id' => 'test']);

echo Uploadify::widget([
    'url' => yii\helpers\Url::to(['s-upload']),
    'id' => 'test',
    'csrf' => true,
    'renderTag' => false,
    'jsOptions' => [
        'width' => 120,
        'height' => 40,
        'onUploadError' => new JsExpression(<<<EOF
function(file, errorCode, errorMsg, errorString) {
    console.log('The file ' + file.name + ' could not be uploaded: ' + errorString + errorCode + errorMsg);
}
EOF
        ),
        'onUploadSuccess' => new JsExpression(<<<EOF
function(file, data, response) {
    data = JSON.parse(data);
    if (data.error) {
        console.log(data.msg);
    } else {
        console.log(data.fileUrl);
        //回显图片
        $("#img_logo").attr("src",data.fileUrl);
        //将图片地址写入logo字段
        $("#brand-logo").val(data.fileUrl);
    }
}
EOF
        ),
    ]
]);
if($model->logo){
    {echo \yii\bootstrap\Html::img($model->logo,['id'=>'img_logo']);};
}else{
    echo \yii\bootstrap\Html::img($model->morenImg,['id'=>'img_logo']);
}
echo '<br/>';echo '<br/>';
echo \yii\bootstrap\Html::submitInput('提交',['class'=>'btn btn-info']);
\yii\bootstrap\ActiveForm::end();