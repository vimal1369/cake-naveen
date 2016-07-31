<!-- File: /app/View/Users/edit.ctp -->


<h1>Edit User</h1>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('email');
    echo $this->Form->input('message', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Update User');

?>