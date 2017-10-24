<?php 
if ($this->session->userdata('logado') == true) {
echo "<br>";
echo "<div class='container-fluid'>";
echo "<div class='row align-items-center justify-content-center'>";
echo "<div class='col-lg-6'>";
echo "<div class='card'>";
echo "<div class='card-header'>";
echo     "<h5>Cadastrar Categoria</h5>";
echo "</div>";
echo "<div class='card-body'>";
    echo form_open_multipart('CRUD_Categoria/create');
    if ($this->session->flashdata('cadastrook')):
        echo "<p class='success'>".$this->session->flashdata('cadastrook').'</p>';
    endif;
    echo form_label('Nome: ');
    echo "<br>";
    echo form_input(array('name'=>'nome'),set_value('titulo'), array('class' => 'form-control'));
    echo "<br>";
    echo form_label('Descrição: ');
    echo form_textarea(array('name'=>'descricao'),set_value('texto'), array('class' => 'form-control'));
    echo "<br>";
    echo "<br>";
    echo "Selecione uma imagem... ";
    echo "<input type='file' name='foto' accept='image/*'>";
    echo "<br>";
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