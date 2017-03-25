<?php 

	namespace melhoridade\app\Dados;

	/*
	*  @author: Matheus Catossi <matheuscatossi@gmail.com>
	*/

	interface Dados 
	{
		public function buscarTodosDados();
		public function buscarDados($id);
		public function inserirDados();
		public function alterarDados($id, $campo, $valor);
		public function suspenderDados();
	}
?>