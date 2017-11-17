<?php
if ($this->session->userdata('logado') == true) {
// falta o teste da sessão...
echo "<br>";
echo "<div class='container-fluid'>";
echo 	"<div class='row align-items-center justify-content-center'>";
echo 		"<div class='col-md-11'>";
echo 			"<div class='card'>";
echo 				"<div class='card-header card-title'>";
echo 					"<h6>Indicações</h6>";
echo 				"</div>";
echo 				"<div class='card-body'>";
echo 					"<div class='row'>";
foreach ($indicacoes as $indicacao) {
echo 					"<div class='col-md-3' >";
echo 					"<div class='card' style='height: 12rem; color: white;'>";
echo   						"<div class='card-body' style='background-color: #378756;'>";
echo 							"<div class='text-right'>";
echo 							"<a href='/CRUD_Indicacao/update/?id=" . $indicacao->id . "'><img src='../../images/icons/edit1.png'>";
echo 							"</img></a>";
echo 							"<a href='/CRUD_Indicacao/delete/?id=" . $indicacao->id . "'><img src='../../images/icons/delete1.png'>";
echo 							"</img></a>";
echo 							"</div>";
echo 							"<h4 class='text-center' style='padding-top: 15%;'>". $indicacao->nome ."</h4>";
echo 					"</div></div>";
echo 				"</div>";
}
echo 				"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";
}