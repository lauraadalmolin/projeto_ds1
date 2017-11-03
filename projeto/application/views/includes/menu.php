<nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #9EC4B0; color: #328450" >
<!--- style="background-color: #deefe5; !-->
  <a class="navbar-brand" href="#"><img src='../images/logo2.png' width="100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" >
        <?php 
		if ($this->session->userdata('logado') == true) {
      echo "<li class='nav-item'>" . anchor('CRUD_Informacoes/retrieve','Home', array('class' => 'nav-link')) . "</li>"; 
      echo "<li class='nav-item'>" . anchor('CRUD_Produto/create','Criar Produto', array('class' => 'nav-link')) . "</li>"; 
      echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve','Listar Produtos', array('class' => 'nav-link')) . "</li>";
      echo "<li class='nav-item'>" . anchor('CRUD_Indicacao/create','Criar Indicação', array('class' => 'nav-link')) . "</li>"; 
      echo "<li class='nav-item'>" . anchor('CRUD_Indicacao/retrieve','Listar Indicações', array('class' => 'nav-link')) . "</li>";
			echo "<li class='nav-item'>" . anchor('CRUD_Categoria/create','Criar Categoria', array('class' => 'nav-link')) . "</li>"; 
			echo "<li class='nav-item'>" . anchor('CRUD_Categoria/retrieve','Listar Categorias', array('class' => 'nav-link')) . "</li>";
			echo "<li class='nav-item'>" . anchor('Login_Logout/logout','Sair', array('class' => 'nav-link')) . "</li>";  	
		} else {
      echo "<li class='nav-item'>" . anchor('CRUD_Informacoes/retrieve','Home', array('class' => 'nav-link')) . "</li>"; 
      echo "<li class='nav-item'>" . anchor('CRUD_Produto/retrieve','Produtos', array('class' => 'nav-link')) . "</li>";
			echo "<li class='nav-item'>" . anchor('Login_Logout/tela_login','Login', array('class' => 'nav-link')) . "</li>"; 
		}
    	?>
    </ul>
   
  </div>
</nav>
