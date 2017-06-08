<?php
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'intro');
echo $form->field($model,'sort');
echo $form->field($model,'status')->radioList(\backend\models\Brand::$statusOptions);
if($model->logo){echo \yii\bootstrap\Html::img($model->logo,['width'=>'45']); };
echo $form->field($model,'imgFile')->fileInput();
echo \yii\bootstrap\Html::submitInput('提交',['class'=>'btn btn-info']);
\yii\bootstrap\ActiveForm::end();