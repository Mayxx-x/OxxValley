<!DOCTYPE html>
<html>
	<head>
		<style>
			.container {
				width: 40%;
				margin: auto;
				box-shadow: 0 0 10px #000;
				padding: 2% 10%;
			}
			.res {

			}
		</style>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">

		<div class="assets d-flex">
			<h1 class="justify-center"> Consultar CEP: </h1>
			<input type="text" class="cep mx-4">
			
			<button class="send">Pesquisar Cep</button>
		</div>

			<!-- Resultado da Requisição -->
			<div class="end_res"></div>
			<br/>
			<div class="ngh_res"></div>
		</div>
		
		<script type="text/javascript">
			
			document.querySelector(".send").addEventListener("click", function() {
				let cep = document.querySelector(".cep").value;
				let url = 'http://viacep.com.br/ws/' + cep + '/json';

				console.log(url);
				fetch(url, {
					method: 'get'
				})
				.then(function(response) {
					response.json().then(function(data) {
						let adress = document.querySelector('.end_res');
						let ngh = document.querySelector('.ngh_res');

						adress.innerHTML = "Endereço: " + data.logradouro;
						ngh.innerHTML = "Bairro: " + data.bairro;
					});
				})
				.catch(function(err) {
					console.error("Erro: " + err);
				});
			});
		</script>
	</body>
</html>
