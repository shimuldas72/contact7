Dynamic Form for Yii 2


Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shimuldas72/yii2-contact7 "dev-master"
```

Or, you may add

```
"shimuldas72/yii2-contact7" "dev-master"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.


For using it, add below code

For admin panel:
In your app config file add

```
'modules' => [
        'contact7' => [
            'class' => 'shimuldas72\forms\Forms',
        ]
    ],
```

The link for creating forms is yoursiteurl/contact7/forms

And for displaying form in your view file add
```
<?= \shimuldas72\formwidget\Dynamicform::widget([   'id'=>'mycustomid', 
						'form_id'=> 'created form id from admin',
						'admin_module'=>'admin module name you added in config' ]); ?>
```
Example:
```
<?= \shimuldas72\formwidget\Dynamicform::widget([ 'id'=>'contact12345', 
							'form_id'=> 'contact-form',
							'admin_module'=>'contact7' ]); ?>
```

