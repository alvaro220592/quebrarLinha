<?php

function quebraLinhas($texto, $limite) {
    $palavras = explode(' ', $texto);
    $linhas = [];
    $linhaAtual = '';

    foreach ($palavras as $palavra) {
        if (strlen($linhaAtual . ' ' . $palavra) <= $limite) {
            $linhaAtual .= ' ' . $palavra;
        } else {
            $linhas[] = $linhaAtual;
            $linhaAtual = $palavra;
        }

        // Caso a primeira string da linha não tenha espaço e tenha mais caracteres que o limite
        if (strlen($linhaAtual) > $limite && strpos($linhaAtual, ' ') === false) {
            while (strlen($linhaAtual) > $limite) {
                $linhas[] = substr($linhaAtual, 0, $limite) . '-';
                $linhaAtual = substr($linhaAtual, $limite);
            }
        }
    }

    $linhas[] = $linhaAtual;
    return implode("\n", $linhas);
}

$texto = "Inconstitucionalissimamente, o avião utiliza a força de empuxo em conjunto com o perfil aerodinâmico das asas que fazem que o céu pareça azul devido à frequência de cada cor da luz solar";
$limite = 10;

echo quebraLinhas($texto, $limite);

