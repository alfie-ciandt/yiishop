<?php

namespace backend\controllers;

use backend\models\Brand;
use yii\web\UploadedFile;


class BrandController extends \yii\web\Controller
{
    //添加品牌
    public function actionAdd()
    {
        $model = new Brand();
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            $model->imgFile=UploadedFile::getInstance($model,'imgFile');
            if($model->validate()){
                //保存图片
                $fileName = '/images/'.uniqid().'.'.$model->imgFile->extension;
                $model->imgFile->saveAs(\yii::getAlias('@webroot').$fileName,false);
                $model->logo = $fileName;
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','品牌添加成功');
                //跳转列表
                return $this->redirect(['brand/index']);
            }else{
                var_dump($model->getErrors());exit;
            }

        }
        return $this->render('add',['model'=>$model]);
    }

    //列表
    public function actionIndex()
    {
        $brands=Brand::find()->all();
        return $this->render('index',['brands'=>$brands]);
    }

    //修改
    public function actionUpdate($id){
        $model = Brand::findOne(['id'=>$id]);
        $request = \yii::$app->request;
        if($request->isPost){
            $model->load($request->post());
            $model->imgFile=UploadedFile::getInstance($model,'imgFile');
            if($model->validate()){
                //保存图片
                $fileName = '/images/'.uniqid().'.'.$model->imgFile->extension;
                $model->imgFile->saveAs(\yii::getAlias('@webroot').$fileName,false);
                $model->logo = $fileName;
                $model->save();
                //设置提示信息
                \yii::$app->session->setFlash('success','品牌修改成功');
                //跳转列表
                return $this->redirect(['brand/index']);
            }else{
                var_dump($model->getErrors());exit;
            }

        }
        return $this->render('add',['model'=>$model]);
    }

    public function actionDelete($id){
        $model = Brand::findOne(['id'=>$id]);
        $model->status=-1;
        $model->save();
        //设置提示信息
        \yii::$app->session->setFlash('success','品牌删除成功');
        return $this->redirect(['brand/index']);
    }
}
