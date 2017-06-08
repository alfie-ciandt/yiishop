<?php

namespace backend\controllers;

use backend\models\ArticleCategory;

class ArticleCategoryController extends \yii\web\Controller
{
    //列表
    public function actionIndex()
    {
        $categorys=ArticleCategory::find()->all();
        return $this->render('index',['categorys'=>$categorys]);
    }

    //添加
    public function actionAdd(){
        $model = new ArticleCategory();
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            if($model->validate()){
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','文章分类添加成功');
                //跳转列表
                return $this->redirect(['article-category/index']);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        return $this->render('add',['model'=>$model]);
    }

    //修改
    public function actionUpdate($id){
        $model = ArticleCategory::findOne(['id'=>$id]);
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            if($model->validate()){
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','文章分类修改成功');
                //跳转列表
                return $this->redirect(['article-category/index']);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        return $this->render('add',['model'=>$model]);
    }

    //删除
    public function actionDelete($id){
        $model = ArticleCategory::findOne(['id'=>$id]);
        $model->status=-1;
        $model->save();
        //设置提示信息
        \yii::$app->session->setFlash('success','文章分类删除成功');
        return $this->redirect(['article-category/index']);
    }
}
