<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Calculadora PHP</h2>
        <form method="post">
            <div class="form-group">
                <label for="num1">Número 1:</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Número 2:</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="form-group">
                <label for="operacao">Operação:</label>
                <select class="form-control" id="operacao" name="operacao" required>
                    <option value="soma">Soma (+)</option>
                    <option value="subtracao">Subtração (-)</option>
                    <option value="multiplicacao">Multiplicação (*)</option>
                    <option value="divisao">Divisão (/)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operacao = $_POST["operacao"];

            function calcular($num1, $num2, $operacao) {
                switch ($operacao) {
                    case 'soma':
                        return $num1 + $num2;
                    case 'subtracao':
                        return $num1 - $num2;
                    case 'multiplicacao':
                        return $num1 * $num2;
                    case 'divisao':
                        if ($num2 != 0) {
                            return $num1 / $num2;
                        } else {
                            return "Erro: divisão por zero.";
                        }
                    default:
                        return "Operação inválida.";
                }
            }

            $resultado = calcular($num1, $num2, $operacao);
            echo "<h4>Resultado: $resultado</h4>";
        }
        ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
