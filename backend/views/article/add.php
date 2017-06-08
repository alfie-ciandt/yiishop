<?php
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'intro');
echo $form->field($model,'sort');
echo $form->field($detail,'content')->textarea();
echo $form->field($model,'status')->radioList(\backend\models\ArticleCategory::$statusOptions);
//下拉选择框
echo $form->field($model,'article_category_id')->dropDownList(\backend\models\articlecategory::find()->select(['name','id'])->indexBy('id')->column());
echo \yii\bootstrap\Html::submitInput('提交',['class'=>'btn btn-info']);
\yii\bootstrap\ActiveForm::end();