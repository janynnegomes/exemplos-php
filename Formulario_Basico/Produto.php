<?php class Produto {
    var $Produto;
    var $Preco;
    var $txReajuste;
    
    function aumentarPreco($txReajuste)
    {
        $this->Preco = $this->Preco+($this->Preco * $txReajuste);
        $this->txReajuste = $txReajuste;
    }
    
    function exibePorcentagem(){
        return $this->txReajuste * 100;        
    }
    
    function exibeReal($valor){
        return number_format($valor, '2',',','.');
    }
    
    function exibirMensagem($mensagem){
        echo $mensagem;
    }
    
    function exibePrecoReajustado(){
        
        $valorReal = $this->exibeReal($this->Preco);
        $percent = $this->exibePorcentagem();
        $this->exibirMensagem("O produto  $this->Produto"
                ." teve seu valor aumentado em $percent% "
                ."e custa agora R$ $valorReal");        
    }
}