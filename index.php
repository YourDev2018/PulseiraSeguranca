<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $URL_ATUAL= "$_SERVER[REQUEST_URI]";
    $url = str_replace("/","",$URL_ATUAL);
    // YourDevPulseiraSegurancaindex.php
    $url = str_replace("YourDevPulseiraSegurancaindex.php","",$url);
    $url = str_replace("%20"," ",$url);

    //echo $url;

    $nome = "";
    $idade = "";
    $responsavel = "";
    $prefixo = "";
    $telefone = "";


    $conn = new  mysqli("mysql427.umbler.com:41890","yourdev","YourDev2018","yourdev");

    if ($conn->connect_erro){
        die($conn->connect_erro);
 	    echo "Erro ao conectar";
    }  

    $result =  $conn->query("SELECT * FROM usuario WHERE nome = '$url' ") ;

    $cont = mysqli_num_rows($result);
    if ($cont <=0) {
        //echo "erro404";
        header("location:erro404.php");
        
    }else{
        if ($cont == 1) {
            while ($row=$result->fetch_assoc()) {

                 $nome = $row['nome'];
                 $idade = $row['idade'];
                 $responsavel = $row['responsavel'];
                 $prefixo= $row['prefixo'];
                 $telefone = $row['telefone'];
                
            }
        }   
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- <link rel="shortcut icon" type="image/png" href="img/logoMin.png"/> -->
    <title>PulSeg - Pulseiras de segurança</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </head>
  <style type="text/css">
    @import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";

    @media (min-width: 768px)
    {
      .titulo
      {
        font-family: 'Open Sans';
        font-weight: 500;
      }
      .nome
      {
        font-family: 'Open Sans';
        font-weight: 700;
        font-size: 30px;
      }
      .descricao
      {
        font-family: 'Open Sans';
        font-weight: 300;
        font-size: 20px;
      }
    }

    @media (max-width: 769px)
    {
      .titulo
      {
        font-family: 'Open Sans';
        font-weight: 500;
      }
    }

  </style>
  <body>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="lg-12 text-center titulo" style="border-bottom: 1.5px solid #bcbdbc;">
          <br>
          <img src="../img/logo.png" class="img-circle img-fluid" style="height: 100px">
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Pulseiras de segurança
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <br><br>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 text-center" style="background-color: #f2f3f2; border-bottom: 0.5px solid #bcbdbc;">
          <br><br><br>
          <img src="../img/perfil.png" class="img-circle img-fluid">
        </div>
        <div class="descricao col-12 text-center perfil" style="background-color: #eaebea;">
          <br><br>
          <p>
          <a id="nome" class="nome">
            Nome da pessoa
          </a>
          <br><br><br>
            Idade: <a id="idade">7</a>
            <br>
            Responsável: <a id="responsavel">Nome do parente</a>
            <br>
            Telefone: (<a id="pre-telefone">00</a>) <a id="telefone">123456789</a>
            <br><br><br>
            <br><br><br>
            Caso tenha encontrado o dependente, entre em contato com o Responsável pelo o telefone
          </p>
          <br>
        </div>
      </div>
    </div>

  </body>

  <script type="text/javascript">

    $(document).ready(function(){
      alimentarPerfil();
    });

    function alimentarPerfil()
    {
      var nome = "<?php echo $nome; ?>";
      var idade = "<?php echo $idade; ?>";
      var responsavel = "<?php echo $responsavel; ?>";
      var preTelefone = "<?php echo $prefixo; ?>";
      var telefone = "<?php echo $telefone; ?>";
      document.getElementById("nome").innerHTML = nome;
      document.getElementById("idade").innerHTML = idade;
      document.getElementById("responsavel").innerHTML = responsavel;
      document.getElementById("pre-telefone").innerHTML = preTelefone;
      document.getElementById("telefone").innerHTML = telefone;
    }
  </script>

</html>



