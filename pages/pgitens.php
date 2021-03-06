<div>
	<?php
    	
		require_once 'Classes/DAO/conexao.php';
		
		session_start();
		
		if(!isset($_SESSION['user_gram'])):
			header('location: login');
		endif;
		
	?>
</div>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Desafio - Gramaticando</title>
        <!--CSS Bootstrap 3.3.5 -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/itens.css" />
        <!--JS Bootstrap 3.3.5 -->
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        
        <nav id="back">
            <ul class="pager">
              <li class="previous"><a href='<?php echo RAIZ; ?>'><span aria-hidden="true">&larr;</span> Volver </a></li>
            </ul>
        </nav>
        
        <nav id="next">
            <ul class="pager">
              <li class="next"><a href='ranking'>Clasificación <span aria-hidden="true">&rarr;</span> </a></li>
            </ul>
        </nav>
        
        <section id="resultados" class="jumbotron">
            <h2>Resolución de Problemas</h2>
            <hr>
            <?php
            	
				$id      = $_SESSION['user_gram'];
				$reports = Reports::find("all", array("conditions"=>array("id_user = ?", $id)));
				
				foreach($reports as $report):
					$quest = Quests::find($report->id_quest);
					if($report->item_select == $quest->itemcorect):
						echo('
						<div class="alert alert-success">
							'.$quest->quest.'
						</div>
						');
					else:
						$iten  = Itens::find(array("conditions"=>array("id_quest = ?", $report->id_quest)));
						$erro  = 'err'.$report->item_select;
						$itemm = 'item'.$report->item_select;
						$itemc = 'item'.$quest->itemcorect;
						echo('
						<div class="alert alert-danger">
							<strong>Edición:</strong> '.$quest->quest.'<br>
							<strong>Elemento resaltado:</strong> '.$iten->$itemm.'<br>
							<strong>Error:</strong> '.$iten->$erro.'<br>
							<strong>Artículo correcto:</strong> '.$iten->$itemc.'
						</div>
						');
					endif;
				endforeach;
						
			?>
        </section>
    </body>
    
</html>
<div hidden="true">
	<?php
    	
		//unset($_SESSION['user_gram']);
		
	?>
</div>