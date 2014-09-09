<style>
.blackborder{border:1px solid black;}
</style>
<h2>Register User</h2>
<?php if($errors){ ?>
<div style="background:red;color:white;">
?>=$errors?>
</div>
<? } ?>
<?php echo form_open(base_url().'users/register');?>

<p><?=form_label('Username','user_name')?>: <?php
$data_form=array(
	'id'=>'user_name',
	'name'=>'user_name',
	'size'=>50,
	'class'=>'blackborder'
	//'value'=>set_value('user_name')
);

echo form_input($data_form);
?>
</p>

<p><?=form_label('Email','email')?>: <?php
$data_form=array(
	'id'=>'email',
	'name'=>'email',
	'size'=>50,
	'class'=>'blackborder'
	//'value'=>set_value('email')
);

echo form_input($data_form);
?>
</p>

<p><?=form_label('Password','password')?>: <?php
$data_form=array(
	'id'=>'password',
	'name'=>'password',
	'size'=>50,
	'class'=>'blackborder'
);

echo form_password($data_form);
?>
</p>

<p><?=form_label('Password Confirmed','password2')?>: <?php
$data_form=array(
	'id'=>'password2',
	'name'=>'password2',
	'size'=>50,
	'class'=>'blackborder'
);

echo form_password($data_form);
?></p>

<p><?php echo form_submit('','Register'); ?></p>
<?php echo form_close(); ?>