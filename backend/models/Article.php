<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $name
 * @property string $intro
 * @property string $article_category_id
 * @property integer $sort
 * @property integer $status
 * @property integer $create_time
 */
class Article extends \yii\db\ActiveRecord
{
    static public $statusOptions=[-1=>'删除',0=>'隐藏',1=>'正常'];
    //创建与文章分类表一对一的关系
    public function getarticlecategory()
    {
        //hasOne的第二个参数【k=>v】 k代表分类的主键（id） v代表商品分类在当前对象的关联id
        return $this->hasOne(ArticleCategory::className(),['id'=>'article_category_id']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'intro', 'article_category_id', 'sort', 'status'], 'required'],
            [['intro', 'article_category_id'], 'string'],
            [['sort', 'status', 'create_time'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'intro' => '简介',
            'article_category_id' => '文章分类',
            'sort' => '排序',
            'status' => '状态',
            'create_time' => '创建时间',
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->create_time=time();

        }
        return parent::beforeSave($insert);
    }
}
