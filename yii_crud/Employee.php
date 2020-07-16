<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
//use common\models\User;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Employee extends ActiveRecord{
    
    public static function tableName()
    {
        return 'employee';
    }
    public function rules()
    {
        return [
            ['name', 'required'],
            ['email', 'required'],
            ['salary','required'],
            ['date','required'],
            ['p_number','number', 'message'=> 'mobile number is must number formate!'],
            ['p_number','string', 'min' => 10, 'max' => 10],
            ['Gender','safe'],
            ['Hobby','safe'],
            ['City','safe'],
            [['file'], 'file'],
        ];
    }
    
    public function attributes() {
        return[
            'id',
            'name',
            'email',
            'salary',
            'date',
            'p_number',
            'Gender',
            'male',
            'female',
            'Hobby',
            'City',
            'file'
            ];
    }
    public function ToString($model) {
        
        if (is_array($model->Hobby)) {
            $model->Hobby = implode(',', $model->Hobby);
            return $model;
        }
}
     public function getempId($id)
    {
        // echo "1";exit;
       return static::findOne(['id'=>$id]);
    }
//    public function getImageUrl()
// {
//    return Url::to('/frontend/web/uploads/' . $model->file, true);
// }
    
    
    
    
    
    
}
?>