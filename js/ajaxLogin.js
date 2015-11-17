// JavaScript Document

jQuery(document).ready(function(){
	$('#playGame').click(function(){
		var input = $('#Nome').serialize();
		if(input === "" || input === " "){
			alert('Preencha o campo');
		}else{
			$.ajax({
				type: "Post",
				data: input,
				url: "functions/funcInserir.php",
				beforeSend: function () {
					
				},
				success: function (data) {
					if(data == 1){
						window.location = 'questoes';
					}else if(data == 2){
						alert('Erro ao cadastrar nome');
					}else if(data == 3){
						alert('Dados não enviados');
					}else if(data == 4){
						alert('Nome já cadastrado');
					}
				}
			});
		}
		return false;
	});
});