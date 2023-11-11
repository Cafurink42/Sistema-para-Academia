<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.html">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listar.php">Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Exercicio/listar.php">Exercício</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Treino/listar.php">Treino</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Categoria_Exercicio/listar.php">Categoria Exercício</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <?php
  include '../conexao.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];


    $sql = "UPDATE cliente SET  nome='$nome', email='$email', telefone = '$telefone', cpf = '$cpf', endereco = '$endereco'  WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
      header("Location: listar.php");
    } else {
      echo "Erro ao atualizar: " . $conexao->error;
    }
  } else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, email, telefone, cpf, endereco FROM cliente WHERE id= '$id'";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
      $cliente = $result->fetch_assoc();
    } else {
      echo "Essa tarefa não existe";
      exit;
    }
  }

  $conexao->close();
  ?>

  <div class="container mt-3 pt-3">
    <form action="editar.php" method="post" class="row g-3">

      <div class="col-12">
        <div class="bg-primary opacity-75 bg-gradient p-3 text-center mb-2 text-white fw-bolder fs-3">
          Editar Cadastro
        </div>
      </div>

      <div class="col-2">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" name="id" id="id" value="<?= $cliente['id']; ?>" readonly>
      </div>

      <div class="col-6">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" value="<?= $cliente['nome']; ?>" required>
      </div>

      <div class="col-md-4">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF" value="<?= $cliente['cpf']; ?>" required maxlength="11">
      </div>

      <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Insira o e-mail" value='<?= $cliente['email'] ?>' required>
      </div>

      <div class="col-md-6">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Insira o telefone" value='<?= $cliente['telefone'] ?>' required>
      </div>

      <div class="col-12">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Insira o endereço" value='<?= $cliente['endereco'] ?>' required>
      </div>



      <button type="submit" class="btn btn-primary w-100 bg-gradient p-3 text-center mb-2 mt-5 text-white fw-bolder fs-3" id="button">Atualizar</button>



    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>