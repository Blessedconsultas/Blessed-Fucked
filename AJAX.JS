function consultarCPF() {
    const cpf = document.getElementById('cpfInput').value;
    const apiUrl = `https://worldata.online/api?token=387a4560-4566-4f75-af1b-555c177a4fa3&type=cpf3&query=${cpf}`;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", apiUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Adicione esta linha
                exibirInformacoesNoPainel(JSON.parse(xhr.responseText));
            } else {
                console.error('Erro na consulta à API:', xhr.statusText);
            }
        }
    };
    xhr.send();
}
