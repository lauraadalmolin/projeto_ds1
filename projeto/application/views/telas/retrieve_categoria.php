<?php
if ($this->session->userdata('logado') == true) {
// falta o teste da sessão...
echo "<br>";
echo "<div class='container-fluid'>";
echo 	"<div class='row align-items-center justify-content-center'>";
echo 		"<div class='col-md-10'>";
echo 			"<div class='card'>";
echo 				"<div class='card-header card-title'>";
echo 					"<h6>Categorias</h6>";
echo 				"</div>";
echo 				"<div class='card-body'>";
echo 					"<div class='row'>";
foreach ($categorias as $categoria) {
echo 					"<div class='col-md-4'>";
echo 					"<div class='card'>";
echo 						"<img class='card-img-top' src='../uploads/categorias/" . $categoria->id . ".jpg' alt='Card image cap'>";
echo   						"<div class='card-body'>";
echo  		   					"<h5 class='card-title text-center'>" . $categoria->nome . "</h5>";
echo  		   						"<p class='card-text text-justify'>" . $categoria->descricao . "</p>";
echo 							"<div class='text-right'>";
echo 							"<a href='CRUD_Categoria/update/". $categoria->id ."'><img src='../images/icons/edit1_gray.png'>";
echo 							"</img></a>";
echo 							"<a href='CRUD_Categoria/delete/". $categoria->id ."'><img src='../images/icons/delete1_gray.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 					"</div></div>";
echo 				"</div>";
}
echo 				"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";
}