<?php 
if ($this->session->userdata('logado') == true) {
echo "<br>";
echo "<div class='container-fluid'>";
echo "<div class='row align-items-center justify-content-center'>";
echo "<div class='col-lg-7'>";
echo "<div class='card'>";
echo "<div class='card-header card-title'>";
echo     "<h6>Cadastrar Produto</h6>";
echo "</div>";
echo "<div class='card-body'>";
    if (count($categorias) != 0 && count($indicacoes) != 0) {
        echo form_open_multipart('CRUD_Produto/update');
        if ($this->session->flashdata('sucesso')):
            echo "<p class='alert alert-success'>".$this->session->flashdata('sucesso').'</p>';
        endif;
        echo form_label('Nome: ');
        echo "<br>";
        echo form_input(array('name'=>'nome'),set_value('nome', $produto[0]->nome), array('class' => 'form-control'));
        echo "<br>";
        echo form_label('Descrição: ');
        echo form_textarea(array('name'=>'descricao'),set_value('descricao', $produto[0]->descricao), array('class' => 'form-control'));
        echo "<br>";
        echo "<br>";
        echo "Selecione uma imagem... ";
        echo "<input type='file' name='foto' accept='image/*'>";
        echo "<br>";
        echo "<br>";
        echo "<p>Categoria do produto</option></p>";
        echo "<select required class='custom-select' name='id_categoria'>";
        foreach ($categorias as $categoria) {
            if ($produto[0]->id_categoria == $categoria->id) {
                echo    "<option selected value='".$categoria->id."' selected>".$categoria->nome."</option>";
            } else {
                echo    "<option value='".$categoria->id."'>".$categoria->nome."</option>";
            }
        }
        echo "</select>";
        echo "<br>";
        echo "<br>";
        echo "<p>Indicações do produto (pressione Ctrl para mais de uma)</option></p>";
        echo "<select required class='custom-select' name='indicacoes[]' multiple>";
        $array = array();

        for ($i = 1; $i <= count($indicacoes); $i++) {
            $array[] = false;
        }
        foreach ($indicacoes as $indicacao) {
            foreach($arr_indicacoes as $indicacao_p) {
                if ($indicacao->id == $indicacao_p->id_indicacao) {
                    $array[$indicacao->id] = true;
                }
            }
        }
        foreach ($indicacoes as $indicacao) {
            if ($array[$indicacao->id] == true) {
                echo    "<option selected value='".$indicacao->id."'>".$indicacao->nome."</option>";
            } else {
                echo    "<option value='".$indicacao->id."'>".$indicacao->nome."</option>";
            }
        }
        echo "</select>";
        echo "<br>";
        echo "<input type='hidden' value='".$produto[0]->id."' name='id'>";
        echo "<div class='text-center'>";

        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-botica'));
        echo "</div>";
        echo "</div>";
        echo form_close();
    } else {
         echo "<p class='alert alert-info'>Você precisa cadastrar primeiro categorias e indicações.</p>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    redirect('Login_Logout/index');
}