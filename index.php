<!-- Autor: Thiago de Moura Machado -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
        $pdo = require_once './pdo/connection.php';

        // $sql = 'insert into pessoa (nome,cpf) values (?,?)';
        // $statement = $pdo->prepare($sql);
        // $statement->execute(['Jack','123456']);

        foreach ($pdo->query('select * from pessoa') as $row){
            print $row['nome'] . "\t";
            print $row['telefone'] . "\t";
            print $row['email'] . "\t";
            print $row['endereco'] . "\t";
            print $row['cpf'] . "\t";
            print $row['sexo'] . "\t";
            print $row['cnpj'] . "\t";
            print $row['nomeFantasia'] . "\t";
            echo "<br>";

        }
    ?>

</body>
</html>