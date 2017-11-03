<h2><?= $this->Html->link('Logout',['controller' => 'Users','action' => 'login']) ?></h2>
<h1>User Profile</h1>
<table>
    <tr>
        <th>Id</th>
        <th>email</th>
        <th>password</th>
        <th></th>
        <th></th>
    </tr>
    <?php  ?>
    
    
</table>
<?= $this->Form->create('upload_image', ['url' => [ 'controller' => 'Users', 'action' => 'upload']]); ?>
<?= $this->Form->button('upload_image'); ?>
<?= $this->Form->end(); ?></br>
<?= $this->Form->create('download', ['url' => [ 'controller' => 'Users', 'action' => 'download']]); ?>
<?= $this->Form->button('download', ['type' => 'file']); ?>
<?= $this->Form->end(); ?>

