<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\base\Model;
use yii\base\Widget;
use yii\widgets\ListView;
use yii\helpers\FileHelper;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup'], ['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'salary')->textInput(['type' => 'number']) ?>

            <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

            <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'p_number')->textInput(['type' => 'integer']) ?>

            <label>Gender</label>
            <?= $form->field($model, 'Gender')->radio(['label' => 'male', 'value' => 'male', 'checked' => 'checked']) ?>

            <?= $form->field($model, 'Gender')->radio(['label' => 'female', 'value' => 'female', 'uncheck' => null]) ?>
            
            <?=
            $form->field($model, 'Hobby')->checkboxList([
                'Singing' => 'Singing',
                'Dancing' => 'Dancing',
                'Study' => 'Study',
                'Sleeping' => 'Sleeping'])?>
            
           <?= $form->field($model, 'City')->dropdownList([
              'Ahmedabad'   => 'Ahmedabad', 
              'Gandhinagar' => 'Gandhinagar',
              'Surat' => 'Surat',
              'Baroda' => 'Baroda'],['prompt'=>'Select City'])?>

                <?= $form->field($model, 'file')->fileInput() ?>

            <div class="form-group">
<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>



            <?php ActiveForm::end(); ?>
            <?php
            echo GridView::widget([
                'dataProvider' => $datapro,
                'summary' => '',
                //'formatter' => ['class' => 'yii\i18n\Formatter'],
                'columns' => [
                    'id',
                    'name',
                    'email',
                    'salary',
                    'date',
                    'p_number',
                    'Gender',
                    'Hobby',
                    'City',
                   [

                    'attribute' => 'file',

                    'format' => 'html',

                    'label' => 'Image',

                    'value' => function($model) {
      return Html::img(\Yii::$app->request->BaseUrl.'/uploads/'.$model->file,['width'=>60,'height'=>50]);
    },

                ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width:260px;'],
                        'header' => 'Actions',
                        'template' => '{edit} {delete}',
                        'buttons' => [
                            'edit' => function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span>Edit', $url, [
                                            'title' => Yii::t('app', 'employee'),
                                            'class' => 'btn btn-primary btn-small',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span>Delete',$url, [
                                            'title' => Yii::t('app', 'delete'),
                                            'class' => 'btn btn-danger btn-small',
                                ]);
                            },
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'edit') {
                                $url = '/frontend/web/site/employee?id='. $model->id;
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url = '/frontend/web/site/employee?id=' . $model->id . '&action=delete';
                                return $url;
                            }
                        }
                    ],
                ],
            ]);
            echo ListView::widget([
                'dataProvider' => $datapro,
                'itemView' => 'item',
                'summary' => '',
            ]);
            ?>
        </div>
    </div>
</div>