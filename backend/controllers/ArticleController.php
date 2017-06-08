<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleDetail;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $articles=Article::find()->all();
        return $this->render('index',['articles'=>$articles]);
    }

    //添加
    public function actionAdd()
    {
        $model = new Article();
        $detail = new ArticleDetail();
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            $detail->load($request->post());
            if($detail->validate()) {
                $detail->save();
            }
            if($model->validate()){
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','文章添加成功');
                //跳转列表
                return $this->redirect(['article/index']);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        return $this->render('add',['model'=>$model,'detail'=>$detail]);
    }

    //修改
    public function actionUpdate($id){
        $model=Article::findOne(['id'=>$id]);
        $detail = ArticleDetail::findOne(['id'=>$id]);
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            $detail->load($request->post());
            if($detail->validate()) {
                $detail->save();
            }
            if($model->validate()){
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','文章添加成功');
                //跳转列表
                return $this->redirect(['article/index']);
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        return $this->render('add',['model'=>$model,'detail'=>$detail]);
    }

    //删除
    public function actionDelete($id){
        $model = Article::findOne(['id'=>$id]);
        $model->status=-1;
        $model->save();
        //设置提示信息
        \yii::$app->session->setFlash('success','文章删除成功');
        return $this->redirect(['article/index']);
    }
}
