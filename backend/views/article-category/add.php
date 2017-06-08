<?php
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'intro');
echo $form->field($model,'sort');
echo $form->field($model,'status')->radioList(\backend\models\ArticleCategory::$statusOptions);
echo $form->field($model,'is_help')->radioList(\backend\models\ArticleCategory::$helpOptions);
echo \yii\bootstrap\Html::submitInput('提交',['class'=>'btn btn-info']);
\yii\bootstrap\ActiveForm::end();