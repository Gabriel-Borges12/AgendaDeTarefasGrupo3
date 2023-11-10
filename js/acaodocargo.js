var cargo = "<?php echo $_SESSION['funcionario_cargo']; ?>"; // certifique-se de que a sessão esteja iniciada

if (cargo === 'administrativo') {
    document.getElementById('botaoF').disabled = true; // desabilita o botão do funcionário para administrativos
} else {
    document.getElementById('botaoA').disabled = true; // desabilita o botão administrativo para funcionários
}

function executarAcaoAdministrativa() {
    if (cargo === 'administrativo') {
        // Ação que apenas administradores podem realizar
        alert('Ação administrativa executada.');
    } else {
        alert('Você não tem permissão para executar esta ação.');
    }
}

function executarAcaoFuncionario() {
    if (cargo !== 'administrativo') {
        // Ação que apenas funcionários podem realizar
        alert('Ação do funcionário executada.');
    } else {
        alert('Você não tem permissão para executar esta ação.');
    }
}
