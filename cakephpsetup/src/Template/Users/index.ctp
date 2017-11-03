<h2><?= $this->Html->link('Logout',['controller' => 'Users','action' => 'logout']) ?></h2>
<h1>list users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>email</th>
        <th>password</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->email, ['action' => 'profile', $user->id]) ?>
        </td>
        <td>
            <?= $user->password ?>
        </td>
        <td>
        <?= $this->Html->link('Delete',['action' => 'delete',$user->id]) ?>
        </td>
         <td>
        <?= $this->Html->link('edit',['action' => 'edit',$user->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    
</table>
<?= $this->Html->link('add new user',['action' => 'add']) ?>
<div class="page-numb">
    <?= $this->Paginator->numbers(['first' => 2, 'last' => 2]); ?>
    <?= $this->Paginator->prev('« Previous') ?>
    <?= $this->Paginator->next('Next »') ?>
</div>

Page
<?= $this->Paginator->counter() ?>