<?php
    
    echo $this->Form->create($user);
?>
<fieldset>
    <legend><?php echo __('Edit Profile'); ?></legend>
    <?php
      echo $this->Form->input('email', [
        'label' => __('Email'),
            'placeholder' => __('Email'),
            'autofocus'
        ]);
       
        echo $this->Form->input('password', array(
          'label' => __('Password'),
          'value' => ''
        ));
       
    ?>
</fieldset>
<?php
    echo $this->Form->submit(__('Save'));
    echo $this->Form->end();
?>
