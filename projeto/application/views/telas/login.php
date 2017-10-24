<?php
echo "<br>";
echo "<div class='container-fluid'>";
echo "<div class='row align-items-center justify-content-center'>";
echo "<div class='col-lg-3'>";
echo "<div class='card'>";
echo "<div class='card-body'>";
echo form_open('Login_Logout/login');
echo "<div class='form-group'>";
if ($this->session->flashdata('loginbad')):
        echo "<p class='alert alert-danger'>".$this->session->flashdata('loginbad').'</p>';
endif;
echo form_label('Usuário: ');
echo form_input(array('name'=>'usuario'),set_value('usuario'), array('class' => 'form-control'));
echo "<br>";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'),set_value('senha'), array('class' => 'form-control'));
echo "<br>";
echo "<div class='text-center'>";
echo form_submit(array('name'=>'login'), 'Logar', array('class' => 'btn btn-botica'));
echo "</div>";
echo "</div>";
echo form_close();
echo "</div>";
echo "</div>";
echo "</div>";