<?php
	namespace shimuldas72\formwidget;
	use yii\base\Widget;
	use yii\helpers\Html;


	class Dynamicform extends Widget{
		public $id;
		public $form_id;

		public function init(){
			parent::init();
			/*if($this->directory===null) {
				$this->directory= 'Welcome Guest';
			}else{
				$this->directory= 'Welcome '.$this->message;
			}*/
		}

		public function run(){

			return $this->render('dynamicform',['id'=>$this->id,'form_id'=>$this->form_id]);
		}
	}



?>
