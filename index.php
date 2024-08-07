<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conversão de Romanos</title>
        <link rel="stylesheet" href="./src/style.css">
    </head>
    <body>
        <header>
            <h1>Conversão de números</h1>
        </header>
        <main>
            <form method="post" action="">
                <fieldset>
                    <legend>Conversão</legend>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" required>
                    <br><br>
                    <input type="radio" id="paraRomano" name="tipoConversao" value="paraRomano" checked>
                    <label for="paraRomano">Para romano</label><br>
                    <input type="radio" id="paraDecimal" name="tipoConversao" value="paraDecimal">
                    <label for="paraDecimal">Para decimal</label><br><br>
                    <input type="submit" value="Converter">
                </fieldset>
            </form>

            <?php
            
            require './src/conversao_numero_romano.php';
            use App\ConversaoRomano;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $numero = $_POST['numero'];
                $tipoConversao = $_POST['tipoConversao'];

                try {
                    $conversor = new ConversaoRomano();
                    if ($tipoConversao === 'paraRomano') {
                        $resultado = $conversor->paraRomano((int)$numero);
                        echo "<p class='resultado'>O número $numero em romano é: $resultado</p>";
                    } else {
                        $resultado = $conversor->paraDecimal($numero);
                        echo "<p class='resultado'>O número romano $numero em decimal é: $resultado</p>";
                    }
                } catch (Exception $e) {
                    echo '<p class="erro">Erro: ' . $e->getMessage() . '</p>';
                }
            }
            ?>
        </main>
    </body>
</html>