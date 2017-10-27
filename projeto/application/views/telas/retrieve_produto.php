<?php
// falta o teste da sessão...
echo "<br>";
echo "<div class='container-fluid'>";
echo 	"<div class='row align-items-center justify-content-center'>";
echo 		"<div class='col-md-11'>";
echo 			"<div class='card'>";
echo 				"<div class='card-header card-title'>";
echo 					"<h4 class='text-center'>Produtos</h4>";
echo 				"</div>";
echo "<nav class='navbar navbar-expand-lg navbar-custom' style='background-color: #9EC4B0; color: #328450' >";
echo   "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
echo    "<ul class='navbar-nav mr-auto'>";

if ($this->session->userdata('logado') == true) {
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Florais', array('class' => 'nav-link')) . "</li>"; 
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Fitoterápicos', array('class' => 'nav-link')) . "</li>"; 
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Cosméticos', array('class' => 'nav-link')) . "</li>";
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Controlados', array('class' => 'nav-link')) . "</li>"; 
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Homeopatias', array('class' => 'nav-link')) . "</li>";
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Chás', array('class' => 'nav-link')) . "</li>";
    echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve/idCategoria','Medicamentos', array('class' => 'nav-link')) . "</li>";
}

echo "</ul></div>";
echo 	"<form class='form-inline my-2 my-lg-0'>";
echo 		"<input class='form-control mr-sm-2' type='search' placeholder='Pesquisar por indicação' aria-label='Search'>";
echo 							"<div class='text-right'>";
echo 							"<a href='link...'><img  src='../images/icons/search_gray.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 	"</form>";
echo "</nav>";
echo 				"<div class='card-body'>";
echo 					"<div class='row'>";
echo 					"<div class='col-md-4'>";
echo 					"<div class='card' style='width: 20rem;'>";
echo 						"<img class='card-img-top' src='../images/fitos.jpg' alt='Card image cap'>";
echo   						"<div class='card-body'>";
echo  		   					"<h5 class='card-title text-center'>Fitoterápicos</h5>";
echo  		   						"<p class='card-text text-justify'>Um medicamento fitoterápico é aquele alcançado de plantas medicinais, onde utiliza-se exclusivamente derivados de droga vegetal tais como: suco, cera, exsudato, óleo, extrato, tintura, entre outros. O termo confunde-se com fitoterapia ou com planta medicinal que realmente envolve o vegetal como um todo no exercício curativo e/ou profilático.</p>";
echo 							"<div class='text-right'>";
echo 							"<a href='link...'><img src='../images/icons/edit1_gray.png'>";
echo 							"</img></a>";
echo 							"<a href='link...'><img src='../images/icons/delete1_gray.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 					"</div></div>";
echo 				"</div>";
echo 					"<div class='col-md-4'>";
echo 					"<div class='card' style='width: 20rem;'>";
echo 						"<img class='card-img-top' src='../images/fitos.jpg' alt='Card image cap'>";
echo   						"<div class='card-body'>";
echo  		   					"<h5 class='card-title text-center'>Fitoterápicos</h5>";
echo  		   						"<p class='card-text text-justify'>Um medicamento fitoterápico é aquele alcançado de plantas medicinais, onde utiliza-se exclusivamente derivados de droga vegetal tais como: suco, cera, exsudato, óleo, extrato, tintura, entre outros. O termo confunde-se com fitoterapia ou com planta medicinal que realmente envolve o vegetal como um todo no exercício curativo e/ou profilático.</p>";
echo 							"<div class='text-right'>";
echo 							"<a href='link...'><img src='../images/icons/edit1_gray.png'>";
echo 							"</img></a>";
echo 							"<a href='link...'><img src='../images/icons/delete1_gray.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 					"</div></div>";
echo 				"</div>";
echo 					"<div class='col-md-4'>";
echo 					"<div class='card' style='width: 20rem;'>";
echo 						"<img class='card-img-top' src='../images/fitos.jpg' alt='Card image cap'>";
echo   						"<div class='card-body'>";
echo  		   					"<h5 class='card-title text-center'>Fitoterápicos</h5>";
echo  		   						"<p class='card-text text-justify'>Um medicamento fitoterápico é aquele alcançado de plantas medicinais, onde utiliza-se exclusivamente derivados de droga vegetal tais como: suco, cera, exsudato, óleo, extrato, tintura, entre outros. O termo confunde-se com fitoterapia ou com planta medicinal que realmente envolve o vegetal como um todo no exercício curativo e/ou profilático.</p>";
echo 							"<div class='text-right'>";
echo 							"<a href='link...'><img src='../images/icons/edit1_gray.png'>";
echo 							"</img></a>";
echo 							"<a href='link...'><img src='../images/icons/delete1_gray.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 					"</div></div>";
echo 				"</div>";

echo 				"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";

?>