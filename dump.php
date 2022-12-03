<?php

/**
 * reescrita da função var_dump, tem o mesmo funcionamento, porém mantém
 * os dados fixos na tela e podem ser fechados com um clique.
 * 
 * @param type $var
 */
function dump(...$var) {
    
    // esse loop percorre todas as variáveis recebidas e exibe uma em cada
    // iteração com o var_dump
    foreach ($var as $key => $value) {

        // gera um id para a div que será mostrada com o conteúdo do var_dump
        $a = uniqid();
        $name = "vardump_{$a}";

        // inicia a captura das saídas de tela para dentro de uma variável
        ob_start();
        var_dump($value);
        $content = ob_get_contents();
        ob_end_clean();

        // cria um padrão de cores para ser utilizado
        $red = "#5C0606";
        $green = "#0D6F03";
        $blue = "#020858";
        $black = "#222223";
        $border_color = "#6495ed";
        $background_color = "#D8D6D1";
        $font_family = "courier new, Ubuntu";

        // array com trocas necessárias para dar um certo efeito na mostra
        // dos dados, algo simples
        $arrChange["=>" . PHP_EOL] = " => ";
        $arrChange["=>     "] = " => ";
        $arrChange["=>    "] = " => ";
        $arrChange["=>   "] = " => ";
        $arrChange["=>  "] = " => ";
        $arrChange["]     =>"] = "] =>";
        $arrChange["]    =>"] = "] =>";
        $arrChange["]   =>"] = "] =>";
        $arrChange["]  =>"] = "] =>";
        $arrChange["=>"] = "<font style='color: {$red};'>=></font>";
        $arrChange["["] = "</font>[";
        $arrChange["}"] = "</font>}";
        $arrChange["{"] = "</font>{";
        $arrChange["string("] = "<font style='color: {$green}'>string</font>(";
        $arrChange["int("] = "<font style='color: {$green}'>int</font>(";
        $arrChange["float("] = "<font style='color: {$green}'>float</font>(";
        $arrChange["object("] = "object(<font style='color: {$red}'>";
        $arrChange[")#"] = "</font>)#";
        $arrChange["object("] = "<font style='color: {$green}'>object</font>(";
        $arrChange["bool("] = "<font style='color: {$green}'>bool</font>(";
        $arrChange["array("] = "<font style='color: {$green}'>array</font>(";
        $arrChange[") \""] = ") <font style='color: {$black}'>\"";

        // loop para executar as trocas
        foreach ($arrChange as $keyChange => $valueChange) {

            $content = str_replace($keyChange, $valueChange, $content);
            
        }

        // tela que será mostrada com o resultado do var_dump para cada variável.
        echo "<div id='{$name}' style='position: relative; z-index: 99999; opacity: 0.9; border-left: 6px solid {$border_color}; padding: 5px; background-color: {$background_color}; margin: 10px 35px 5px 70px; border-radius: 0 15px 15px 0;'>";
        echo "<label_r style='float:right;'><a onclick=\"document.getElementById('{$name}').style.display='none';\">X</a></label_r>";
        echo "<pre style='pre-warp; font-family: {$font_family}; color: {$blue}; overflow: auto;'>";
        echo $content;
        echo "</pre>";
        echo "</div>";
        
    }
}
