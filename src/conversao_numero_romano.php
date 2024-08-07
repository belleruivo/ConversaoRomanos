<?php 
/*
Letra I: corresponde a 1.
Letra X: corresponde a 10.
Letra L: corresponde a 50.
Letra C: corresponde a 100.
Letra D: corresponde a 500.
Letra M: corresponde a 1000.
*/
namespace App;

class ConversaoRomano 
{
    private static $numerosRomanos = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,   
    ];  

    public function paraRomano($numero)
    {
        if($numero <= 0){
            throw new \Exception('Número inválido. Informe um número inteiro positivo.');
            // é throw new trata de excecoes, em casos de erros, instancia a class de excecao e o / mostra q é global
        }

        $resultado = '';
        foreach (self::$numerosRomanos as $romano => $value){ // Itera sobre os números romanos e seus valores
            while($numero >= $value) {
                $resultado .= $romano; // Adiciona o símbolo romano ao resultado
                $numero -= $value; // Subtrai o valor do número do número original
            }
        }
        return $resultado;
    }

    public function paraDecimal($romano)
    {
        $resultado = 0;
        $i = 0;

        while($i < strlen($romano)) { // Enquanto o índice for menor que o comprimento da string romana
            $doisCaracteres = substr($romano, $i, 2); // Obtém os dois caracteres a partir da posição atual

            if (array_key_exists($doisCaracteres, self::$numerosRomanos)) { // Se os dois caracteres formarem um símbolo romano válido
                $resultado += self::$numerosRomanos[$doisCaracteres]; // Adiciona o valor correspondente ao resultado
                $i += 2; // Avança o índice em 2
            } else {
                $umCaracter = substr($romano, $i, 1);
                if (array_key_exists($umCaracter, self::$numerosRomanos)) {
                    $resultado += self::$numerosRomanos[$umCaracter]; 
                    $i++;
                } else {
                    throw new \Exception('Número romano inválido: '.$romano);
                }
            }
        }
        return $resultado;
    }

}

?>