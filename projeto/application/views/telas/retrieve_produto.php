<?php
echo "<br>";
echo "<div class='container-fluid'>";
echo 	"<div class='row align-items-center justify-content-center'>";
echo 		"<div class='col-md-10'>";
echo 			"<div class='card'>";
echo 				"<div class='card-header card-title'>";
echo 					"<h4 class='text-center'>Produtos</h4>";
echo 				"</div>";
echo "<nav class='navbar navbar-expand-lg navbar-custom' style='background-color: #9EC4B0; color: #328450' >";
echo   "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
echo    "<ul class='navbar-nav mr-auto'>";
echo "<li class='nav-item'>" . anchor('/CRUD_Produto/retrieve', 'Todos', array('class' => 'nav-link')) . "</li>"; 

foreach ($categorias as $categoria) {
echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve_categoria/?id='.$categoria->id, $categoria->nome, array('class' => 'nav-link')) . "</li>"; 
}

echo "</ul></div>";
echo 	"<form  action='/CRUD_Produto/search' method='post' id='form1' class='form-inline my-2 my-lg-0'>";
echo 		"<input class='form-control mr-sm-2' name='busca' placeholder='Pesquisar por indicação'>";
echo 							"<div class='text-right'>";
echo 							"<button class='btn btn-botica' type='submit'>Enviar</button>";
echo 							"</div>";
echo 	"</form>";
echo "</nav>";
echo 				"<div class='card-body'>";
echo 					"<div class='row'>";
if (count($produtos) == 0) {
echo 					"<div class='col-md-12'>";
echo "<p class='alert alert-info text-center'>Não foi encontrado nenhum produto para a seguinte indicação ou categoria. Se você estiver pesquisando, experimente utilizar acentos e 'ç'.</p>";
echo "</div>";
} else {
foreach ($produtos as $produto) {
echo 					"<div class='col-md-2'>";
echo 					"<a class='link-produtos' href='/CRUD_Produto/info/?id=".$produto->id."'><div class='card'>";
echo 						"<img width='100%' class='card-img-top' src='../../uploads/produtos/".$produto->id.".jpg' alt='Card image cap'>";
echo   						"<div class='card-body-produtos'>";
if ($this->session->userdata('logado') == true) {
echo  		   					"<h5 class='card-title text-center'>".$produto->nome."</h5>";
echo 							"<div class='text-center'>";
echo 							"<a href='/CRUD_Produto/update/?id=".$produto->id."'><img src='../../images/icons/edit1_green.png'>";
echo 							"</img></a>";
echo 							"<a href='/CRUD_Produto/delete/?id=".$produto->id."'><img src='../../images/icons/delete1_green.png'>";
echo 							"</img></a>";
echo 							"</div>";
} else {
echo  		   					"<h5 class='text-center link-produtos'>".$produto->nome."</h5>";
}
echo 							"</div>";
echo 					"</div></div>";
}
}
echo 				"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";

?>