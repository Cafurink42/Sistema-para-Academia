<!doctype html>
<html lang="en">
  <?php 
   include_once ('../conexao.php');  
  ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Criar Exercício</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
  $(function() {
    $("#header").load("../header.html");
    $("#footer").load("../footer.html");
  });
</script>

<body>

  <div id="header"></div>

  <br>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../index.html">Início</a></li>
      <li class="breadcrumb-item"><a href="listar.php">Exercício</a></li>
      <li class="breadcrumb-item active" aria-current="page">Criar Exercício</li>
    </ol>
  </nav>


  <div class="container mt-3 pt-3">

    <div class="row">
      <div class="col-12">
        <div class="bg-primary opacity-75 p-3 text-center mb-2 text-white fw-bolder fs-3">
          Cadastrar Novo Exercício
        </div>
      </div>
    </div>

    <form action="criar.php" method="post">

      <div class="row">
        <div class="col-md-8">
          <label for="Nome" class="form-label">Nome:</label>
          <input type="text" name="nome" id="nome" class="form-control" placeholder="Insira o nome do exercício" required>
        </div>

        <div class="col-md-4">
          <label for="duracao" class="form-label">Duração:</label>
          <input type="number" name="duracao" id="duracao" class="form-control" placeholder="Insira a duração (min)" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <label for="categoria_id" class="form-label">Categoria:</label>
          <select class="form-select" name = "categoria_id">
            <option selected>Selecione uma categoria</option>
            <?php 
             
            $sql_categoria = "SELECT
              id, nome 
              FROM Categoria_exercicio";
            
            $result_categoria = $conexao->query($sql_categoria);
            
            while($row = $result_categoria->fetch_assoc()) {
              $categoria_id = $row['id'];
              $categoria_nome = $row['nome'];

              echo "<option value='$categoria_id'>$categoria_id - $categoria_nome </option>";
                       
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <input type="submit" value="Salvar" class="btn btn-primary w-100 bg-gradient p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button"></input>
        </div>

        <div class="col-md-4">
          <a type="button" href="listar.php" class="btn btn-danger w-100 p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button">Cancelar</a>
        </div>
      </div>
    </form>
  </div>

  <?php


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao'];
    $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id']:null;

    $sql_exercicio =
      "INSERT INTO Exercicio 
          (nome, duracao, categoria_id)
        VALUES
          ('$nome', '$duracao', '$categoria_id')";

    if ($conexao ->query($sql_exercicio) ===TRUE) {
      header("Location: listar.php");
    } 
    else {
      echo "Erro: " . $conexao->error;
      echo "$sql_exercicio";
      
    }


  }


$conexao->close();
?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>



</html>