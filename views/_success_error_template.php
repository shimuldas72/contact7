<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>


<?php
	if($form_data->success_template != ''){
		$success_template = $form_data->success_template;
		$success_template = str_replace('{{wrapper_class}}', 'hide success_wrapper_'.$form_id, $success_template);
		echo $success_template = str_replace('{{message}}', '<span class="success_container_'.$form_id.'"></span>', $success_template);
	}else{
?>
	<div class="alert  alert-success alert-dismissable hide success_wrapper_<?= $form_id; ?>"  role="alert"  type="success">
	    <button  type="button" class="close"  aria-hidden="false">
	        <span aria-hidden="true">×</span>
	        <span class="sr-only">Close</span>
	    </button>
	    <div ><span class="success_container_<?= $form_id; ?>"></span></div>
	</div>
<?php
	}
?>

<?php
	if($form_data->error_template != ''){
		$error_template = $form_data->error_template;
		$error_template = str_replace('{{wrapper_class}}', 'hide error_wrapper_'.$form_id, $error_template);
		echo $error_template = str_replace('{{message}}', '<span class="error_container_'.$form_id.'"></span>', $error_template);
	}else{
?>
	<div class="alert  alert-danger alert-dismissable hide error_wrapper_<?= $form_id; ?>"  role="alert"  type="error">
	    <button  type="button" class="close"  aria-hidden="false">
	        <span aria-hidden="true">×</span>
	        <span class="sr-only">Close</span>
	    </button>
	    <div ><span class="error_container_<?= $form_id; ?>"></span></div>
	</div>
<?php
	}
?>