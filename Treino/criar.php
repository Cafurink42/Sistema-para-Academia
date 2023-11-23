<!doctype html>
<html lang="en">
<?php
include_once('../conexao.php');
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Criar Exercício</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

  <?php
  include('../header.html');
  ?>

  <br>

  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb ms-3">
      <li class="breadcrumb-item"><a href="../index.html">Início</a></li>
      <li class="breadcrumb-item"><a href="listar.php">Treino</a></li>
      <li class="breadcrumb-item active" aria-current="page">Criar Treino</li>
    </ol>
  </nav>


  <div class="container mt-3 pt-3">

    <div class="row">
      <div class="col-12">
        <div class="bg-primary opacity-75 p-3 text-center mb-2 text-white fw-bolder fs-3">
          Cadastrar Novo Treino
        </div>
      </div>
    </div>

    <form action="criar.php" method="post">

      <div class="row">
        <div class="col-md-6">
          <label for="cliente_id" class="form-label">Cliente:</label>
          <select class="form-select" name="cliente_id">
            <option selected>Selecione um cliente</option>
            <?php
            error_reporting(E_WARNING);
            $sql_categoria = "SELECT
              id, nome 
              FROM Cliente";

            $result_categoria = $conexao->query($sql_categoria);

            while ($row = $result_categoria->fetch_assoc()) {
              $cliente_id = $row['id'];
              $cliente_nome = $row['nome'];

              echo "<option value='$cliente_id'>$cliente_id - $cliente_nome </option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-6">
          <label for="exercicio_id" class="form-label">Exercício:</label>
          <select class="form-select" name="exercicio_id">
            <option selected>Selecione um exercício</option>
            <?php

            $sql_categoria = "SELECT
              id, nome 
              FROM Exercicio";

            $result_categoria = $conexao->query($sql_categoria);

            while ($row = $result_categoria->fetch_assoc()) {
              $exercicio_id = $row['id'];
              $exercicio_nome = $row['nome'];

              echo "<option value='$exercicio_id'>$exercicio_id - $exercicio_nome </option>";
            }
            ?>
          </select>
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-4">
          <label for="data_treino" class="form-label">Data do Treino:</label>
          <input type="date" name="data_treino" id="data_treino" class="form-control" required>
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
  
  error_reporting(0);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $exercicio_id = $_POST['exercicio_id'];
    $data_treino = $_POST['data_treino'];

    $sql_exercicio =
      "INSERT INTO Treino 
          (data_treino, cliente_id, exercicio_id)
        VALUES
          ('$data_treino', '$cliente_id', '$exercicio_id')";

    if ($conexao->query($sql_exercicio) === TRUE) {
      header("Location: listar.php");
    } else {
      echo "Erro: " . $conexao->error;
      echo "$sql_exercicio";
    }
  }


  $conexao->close();
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>



</html>