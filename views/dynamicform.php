<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use shimuldas72\forms\models\FormList;
$form_data = FormList::find()->where(['form_id'=>$form_id])->one();
?>


<?php
	if(!empty($form_data)){
		$fields = $form_data->fields;
		if(!empty($fields)){
?>

		<?php
			$form = ActiveForm::begin([
                                'id' => $form_id,
                                'options'=>['class'=>'dynamic_form '.$form_data->form_class],
                                'action' => ['/site/dynamic_form'],
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-sm-10\">{input}\n{error}</div>",
                                ],
                        ]); 
		?>
			<input type="hidden" id="<?= $form_id; ?>" class="form-control" name="form_id" value="<?= $form_id; ?>">

			<?php
				if($form_data->success_error_position == 'top'){
					echo $this->render('_success_error_template',['form_data'=>$form_data,'form_id'=>$form_id]);
				}
			?>

			<?php
				foreach ($fields as $key => $value) {
					if($value->field_type == 'textInput'){
			?>
						<?php
							if($value->template == ''){
						?>
							<div class="form-group">
								<label class="control-label" for="<?= $value->field_key; ?>"><?= $value->label; ?></label>
								<input type="text" id="<?= $value->field_key; ?>" class="form-control" name="Dynamicform[<?= $value->field_key; ?>]" >
								<div class="hint-block"><?= $value->hint; ?></div>
								<div class="help-block"></div>
							</div>
						<?php
							}else{
								$template = $value->template;
								$template = str_replace('{{name}}', $value->field_key, $template);
								$template = str_replace('{{label}}', $value->label, $template);
								$template = str_replace('{{hint}}', $value->hint, $template);
								$template = str_replace('{{placeholder}}', $value->placeholder, $template);
								echo $template;
							}
						?>
						
			<?php
					}elseif($value->field_type == 'textArea'){
			?>
						<?php
							if($value->template == ''){
						?>
							<div class="form-group">
								<label class="control-label" for="<?= $value->field_key; ?>"><?= $value->label; ?></label>
								<textarea id="<?= $value->field_key; ?>" class="form-control" name="Dynamicform[<?= $value->field_key; ?>]" ></textarea>
								<div class="hint-block"><?= $value->hint; ?></div>
								<div class="help-block"></div>
							</div>
						<?php
							}else{
								$template = $value->template;
								$template = str_replace('{{name}}', $value->field_key, $template);
								$template = str_replace('{{label}}', $value->label, $template);
								$template = str_replace('{{hint}}', $value->hint, $template);
								$template = str_replace('{{placeholder}}', $value->placeholder, $template);
								echo $template;
							}
						?>
						
			<?php	
					}elseif($value->field_type == 'dropDownList'){
						$values = explode(',', $value->options);
			?>

						<?php
							if($value->template == ''){
						?>
						<div class="form-group">
							<label class="control-label" for="<?= $value->field_key; ?>"><?= $value->label; ?></label>
							<select id="<?= $value->field_key; ?>" class="form-control" name="Dynamicform[<?= $value->field_key; ?>]" data-placeholder="<?= $value->placeholder; ?>">
								<?php
									if(!empty($values) && is_array($values)){
										foreach ($values as $vkey => $vvalue) {
											$v = explode(':', $vvalue);
											if(is_array($v) && count($v) == 2){
												echo '<option value="'.$v[0].'">'.$v[1].'</option>';
											}
											
										}
									}
								?>
							</select>
							<div class="hint-block"><?= $value->hint; ?></div>
							<div class="help-block"></div>
						</div>
						<?php
							}else{
								$options = '';
								if(!empty($values) && is_array($values)){
									foreach ($values as $vkey => $vvalue) {
										$v = explode(':', $vvalue);
										if(is_array($v) && count($v) == 2){
											$options .= '<option value="'.$v[0].'">'.$v[1].'</option>';
										}
										
									}
								}

								$template = $value->template;
								$template = str_replace('{{name}}', $value->field_key, $template);
								$template = str_replace('{{label}}', $value->label, $template);
								$template = str_replace('{{hint}}', $value->hint, $template);
								$template = str_replace('{{placeholder}}', $value->placeholder, $template);
								$template = str_replace('{{options}}', $options, $template);
								echo $template;
							}
						?>
			<?php
					}elseif($value->field_type == 'fileInput'){
			?>
						<?php
							if($value->template == ''){
						?>
						<div class="form-group">
							<label class="control-label" for="<?= $value->field_key; ?>"><?= $value->label; ?></label>
							<input type="hidden" name="Dynamicform[<?= $value->field_key; ?>]" class="dynamic_upload_file_input_<?= $value->field_key; ?>" >
							<input type="file" name="GlobalSettings[img]" class="dynamic_upload_file_<?= $value->field_key; ?>" data-url="<?php echo Url::toRoute(['/admin/global/settings/upload_form_image','key'=>$value->field_key]); ?>">
							<div class="hint-block"><?= $value->hint; ?></div>
							<div class="help-block"></div>
						</div>
						<?php
							}else{
								$hiddenInput = '<input type="hidden" name="Dynamicform['.$value->field_key.']" class="dynamic_upload_file_input_'.$value->field_key.'" >';
								$input = '<input type="file" name="GlobalSettings[img]" class="dynamic_upload_file_'.$value->field_key.'" data-url="'.Url::toRoute(['/admin/global/settings/upload_form_image','key'=>$value->field_key]).'">';
								$template = $value->template;
								$template = str_replace('{{name}}', $value->field_key, $template);
								$template = str_replace('{{label}}', $value->label, $template);
								$template = str_replace('{{hint}}', $value->hint, $template);
								$template = str_replace('{{filefield}}', $hiddenInput.$input, $template);
								$template = str_replace('{{uploaded_file_name}}', '<div class="uploded_file_'.$value->field_key.'"></div>', $template);
								echo $template;
							}
						?>
			<?php

					$this->registerJs("

				        $('.dynamic_upload_file_".$value->field_key."').fileupload({
			                dataType: 'json',
			                done: function (e, data) {
			                	if(data.result.result == 'success'){
			                		$('.dynamic_upload_file_input_'+data.result.field).val(data.result.msg);
			                		$('.uploded_file_'+data.result.field).html(data.result.msg);
			                	}else{
			                		alert(data.result.msg);
			                	}
			                },
			                fail: function (e, data) {
			                    $.each(data.messages, function (index, error) {
			                          console.log(error);
			                    });
			                },
			            });


				    ", yii\web\View::POS_READY, 'thumb_uploads'.$value->field_key);


					}
				}
			?>

			<?php
				if($form_data->success_error_position == 'before_submit_button'){
					echo $this->render('_success_error_template',['form_data'=>$form_data,'form_id'=>$form_id]);
				}
			?>

			<?php
				if($form_data->submit_button_template != ''){
					$button = Html::submitButton('Submit', ['class' => 'btn btn-primary']);
					echo $submit_button = str_replace('{{button}}', $button, $form_data->submit_button_template);
				}else{
			?>
				<div class="form-group ">
	                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	            </div>
			<?php
				}
			?>


			<?php
				if($form_data->success_error_position == '' || $form_data->success_error_position == 'bottom'){
					echo $this->render('_success_error_template',['form_data'=>$form_data,'form_id'=>$form_id]);
				}
			?>
			

		<?php ActiveForm::end(); ?>

<?php
		}
	}else{
		echo 'Form not found.';
	}
?>



<?php
	$this->registerJsFile(\Yii::$app->urlManagerBackEnd->baseUrl."/resources/js/jquery.ui.widget.js", ['depends' => [\yii\web\JqueryAsset::className()]]); 
    $this->registerJsFile(\Yii::$app->urlManagerBackEnd->baseUrl."/resources/js/jquery.iframe-transport.js", ['depends' => [\yii\web\JqueryAsset::className()]]); 
    $this->registerJsFile(\Yii::$app->urlManagerBackEnd->baseUrl."/resources/js/jquery.fileupload.js", ['depends' => [\yii\web\JqueryAsset::className()]]); 
    $this->registerJsFile(\Yii::$app->urlManagerBackEnd->baseUrl."/resources/js/jquery.fileupload-process.js", ['depends' => [\yii\web\JqueryAsset::className()]]); 
    $this->registerJsFile(\Yii::$app->urlManagerBackEnd->baseUrl."/resources/js/jquery.fileupload-validate.js", ['depends' => [\yii\web\JqueryAsset::className()]]); 
    
?>