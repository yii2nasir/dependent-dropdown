<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\ddl\models\State;
use backend\modules\ddl\models\Country;
use backend\modules\ddl\models\City;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\ddl\models\City */
/* @var $form yii\widgets\ActiveForm */

$CountryList = ArrayHelper::map(Country::find()->all(),'id','name');
?>


<div class="city-form">

    <?php $form = ActiveForm::begin(); 
    $modelstate=new State();
    $modelcity=new City();
    ?>

   <?php echo $form->field($modelstate, 'country_id')->dropDownList($CountryList, ['id'=>'cat-id','prompt'=>'Country Name']); 
   
   echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
    'options'=>['id'=>'subcat-id'],
    'pluginOptions'=>[
        'depends'=>['cat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/ddl/city/formdata'])
    ]
]);

/*echo $form->field($model, 'name')->widget(DepDrop::classname(), [
    'options'=>['id'=>'subcat-id2'],
    'pluginOptions'=>[
        'depends'=>['subcat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/ddl/city/formdata2'])
    ]
]);*/
   
   ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
