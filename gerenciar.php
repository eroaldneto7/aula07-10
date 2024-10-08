<head>
     <link rel="stylesheet" href="estilo.css">
</head>

<?php
   include "verificar_logado.php";
?>
<h1>
     Gerenciamento de inventarios
</h1>

<?php
     include "conexao.php";

     $sql = "SELECT * FROM tb_inventarios";

     $consultar = $pdo->prepare($sql);

     try{
          $consultar->execute();
          $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
          echo "<div id='materiais'>";
          foreach($resultados as $item){
          $codigo = $item['codigo'];
          $descricao = $item['descricao'];
          $setor = $item['setor'];
          $categoria = $item['categoria'];

          echo"
      
               <div class='cartoes'>
                    <h3>nº $codigo</h3>
                    <p>$descricao</p>
                    <p>setor: $setor</p>
                    <p>categoria:$categoria</p>
                    <button>✏ editar</button>
                    <button>🗑 deletar</button>
               </div>";

          
          }
          echo "</div>";


     }catch(PDOException $erro){
          echo "Falha ao consultar resultados!".$erro->getMessage();
     }

     
?>