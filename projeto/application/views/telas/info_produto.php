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
?>
				<div class='col-md-3' >
	 					<div class='card'>
	 						<?php
							echo "<img width='70%' class='card-img-top' src='../../uploads/produtos/".$produto[0]->id.".jpg'></img>";
							?>
	 					</div>
	 				</div>
	 				<div class='col-md-9' >
	 					<div class='card'>
							<div class='card-header card-title'>
	 							<h4 class='text-center'><?php echo $produto[0]->nome ?></h4>
	 						</div>
	 						<div class='card-body'>
	 							<p><b>Informações</b></p>
								<p class='spacing'><?php echo $produto[0]->descricao ?></p>
								<p><b>Indicações</b></p>
								<ul>
									<?php
										foreach ($indicacoes as $indicacao) {
											echo "<li>".$indicacao->nome."</li>";
										}
									?>
								</ul>
							</div>
	 					</div>
	 				</div>
<?php
echo 					"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";

?>