<?php
echo $this->Form->create($easyMenusSettings, ['url'=>'']);
echo $this->Form->input('id');
echo $this->Form->input('brand_display_name',['label'=>'Brand Name']);
echo $this->Form->input('brand_display_image',['label'=>'Brand Image Url']);
echo $this->Form->input('brand_display_type',['label'=>'Brand Display Type','options'=>$settings_brand_display_types]);
echo $this->Form->input('navbar_is_fixed',['label'=>'Navbar is fixed to top','type'=>'checkbox']);
echo $this->Form->input('navbar_class',['label'=>'Navbar class']);
echo $this->Form->button(__('Submit'));
echo $this->Form->end();
?>
