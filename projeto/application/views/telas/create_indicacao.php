<?php 
if ($this->session->userdata('logado') == true) {
echo "<br>";
echo "<div class='container-fluid'>";
echo "<div class='row align-items-center justify-content-center'>";
echo "<div class='col-lg-6'>";
echo "<div class='card'>";
echo "<div class='card-header  card-title'>";
echo     "<h6>Cadastrar Indicação</h6>";
echo "</div>";
echo "<div class='card-body'>";
    echo form_open('CRUD_Indicacao/create');
    if ($this->session->flashdata('cadastro')):
        echo "<p class='alert alert-info'>".$this->session->flashdata('cadastro').'</p>';
    endif;
    echo form_label('Nome: ');
    echo "<br>";
    echo form_input(array('name'=>'nome'),set_value('titulo'), array('class' => 'form-control'));
    echo "<br>";
   
    echo "<div class='text-center'>";
    echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-botica'));
    echo "</div>";
    echo "</div>";
    echo form_close();
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    redirect('Login_Logout/index');
}