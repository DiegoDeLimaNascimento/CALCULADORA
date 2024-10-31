<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Avançada</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #282c34;
            color: #ffffff;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
            max-width: 800px;
            margin: auto;
        }
        .calculadora {
            flex: 1;
            background: #44475a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .painel {
            flex: 1;
            background: #3b3f51;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .painel h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .painel p {
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .resultado {
            text-align: right;
            font-size: 32px;
            padding: 10px;
            background: #6272a4;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #fff;
            height: 60px;
        }
        .botoes {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        button {
            padding: 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #50fa7b;
            color: #282c34;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #3ee95b;
            transform: scale(1.05);
        }
        .historico {
            margin-top: 20px;
            background: #6272a4;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #444;
            max-height: 150px;
            overflow-y: auto;
        }
        .historico ul {
            list-style: none;
            padding: 0;
        }
        .historico li {
            padding: 5px 0;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Calculadora Avançada</h1>
    <div class="container">
        <div class="calculadora">
            <div class="resultado" id="resultadoDisplay">0</div>
            <div class="botoes">
                <button onclick="adicionarNumero('7')">7</button>
                <button onclick="adicionarNumero('8')">8</button>
                <button onclick="adicionarNumero('9')">9</button>
                <button class="operacao" onclick="adicionarNumero('/')">/</button>
                <button onclick="adicionarNumero('4')">4</button>
                <button onclick="adicionarNumero('5')">5</button>
                <button onclick="adicionarNumero('6')">6</button>
                <button class="operacao" onclick="adicionarNumero('*')">*</button>
                <button onclick="adicionarNumero('1')">1</button>
                <button onclick="adicionarNumero('2')">2</button>
                <button onclick="adicionarNumero('3')">3</button>
                <button class="operacao" onclick="adicionarNumero('-')">-</button>
                <button onclick="adicionarNumero('0')">0</button>
                <button class="operacao" onclick="calcular()">=</button>
                <button class="operacao" onclick="adicionarNumero('+')">+</button>
                <button class="limpar" onclick="limpar()">C</button>
                <button onclick="calcularRaiz()">√</button>
                <button onclick="calcularFatorial()">n!</button>
                <button onclick="calcularPorcentagem()">%</button>
                <button onclick="calcularExponenciacao()">^</button>
            </div>
            <div class="historico">
                <h3>Histórico de Resultados</h3>
                <ul id="historicoList"></ul>
                <button onclick="limparHistorico()">Limpar Histórico</button>
            </div>
        </div>

        <!-- Painel de Instruções -->
        <div class="painel">
            <h2>Como Realizar Cálculos</h2>
            <p><strong>Adição (+):</strong> Some os números normalmente. Exemplo: 7 + 3 = 10</p>
            <p><strong>Subtração (-):</strong> Subtraia o segundo número do primeiro. Exemplo: 10 - 3 = 7</p>
            <p><strong>Multiplicação (*):</strong> Multiplique os números. Exemplo: 4 * 3 = 12</p>
            <p><strong>Divisão (/):</strong> Divida o primeiro número pelo segundo. Exemplo: 10 / 2 = 5</p>
            <p><strong>Raiz Quadrada (√):</strong> Encontre o número que multiplicado por ele mesmo resulta no número original. Exemplo: √9 = 3</p>
            <p><strong>Exponenciação (^):</strong> Eleve o número à potência desejada. Exemplo: 2^3 = 8</p>
            <p><strong>Porcentagem (%):</strong> Multiplique o número por 0,01 para encontrar o valor percentual. Exemplo: 50% de 200 = 200 * 0,5 = 100</p>
            <p><strong>Fatorial (n!):</strong> Multiplique o número por todos os números inteiros menores que ele. Exemplo: 4! = 4 * 3 * 2 * 1 = 24</p>
        </div>
    </div>

    <script>
        const resultadoDisplay = document.getElementById('resultadoDisplay');
        const historicoList = document.getElementById('historicoList');

        function adicionarNumero(valor) {
            if (resultadoDisplay.innerText === '0') {
                resultadoDisplay.innerText = valor;
            } else {
                resultadoDisplay.innerText += valor;
            }
        }

        function calcular() {
            try {
                let expressao = resultadoDisplay.innerText;
                let resultado = eval(expressao);
                adicionarHistorico(`${expressao} = ${resultado}`);
                resultadoDisplay.innerText = resultado;
            } catch (e) {
                alert("Erro na expressão!");
            }
        }

        function calcularRaiz() {
            try {
                let valor = parseFloat(resultadoDisplay.innerText);
                let resultado = Math.sqrt(valor);
                adicionarHistorico(`√${valor} = ${resultado}`);
                resultadoDisplay.innerText = resultado;
            } catch (e) {
                alert("Erro ao calcular a raiz quadrada!");
            }
        }

        function calcularFatorial() {
            try {
                let valor = parseInt(resultadoDisplay.innerText);
                if (valor < 0) throw new Error("Valor não pode ser negativo!");
                let resultado = 1;
                for (let i = 1; i <= valor; i++) {
                    resultado *= i;
                }
                adicionarHistorico(`${valor}! = ${resultado}`);
                resultadoDisplay.innerText = resultado;
            } catch (e) {
                alert("Erro ao calcular o fatorial!");
            }
        }

        function calcularPorcentagem() {
            try {
                let valor = parseFloat(resultadoDisplay.innerText);
                let resultado = valor / 100;
                adicionarHistorico(`${valor}% = ${resultado}`);
                resultadoDisplay.innerText = resultado;
            } catch (e) {
                alert("Erro ao calcular a porcentagem!");
            }
        }

        function calcularExponenciacao() {
            try {
                let expressao = resultadoDisplay.innerText;
                let partes = expressao.split('^');
                if (partes.length === 2) {
                    let base = parseFloat(partes[0]);
                    let expoente = parseFloat(partes[1]);
                    let resultado = Math.pow(base, expoente);
                    adicionarHistorico(`${base}^${expoente} = ${resultado}`);
                    resultadoDisplay.innerText = resultado;
                } else {
                    alert("Por favor, insira a base e o expoente na forma 'base^expoente'.");
                }
            } catch (e) {
                alert("Erro ao calcular a exponenciação!");
            }
        }

        function limpar() {
            resultadoDisplay.innerText = '0';
        }

        function adicionarHistorico(calculo) {
            const li = document.createElement('li');
            li.innerText = calculo;
            const removeButton = document.createElement('button');
            removeButton.innerText = '✖';
            removeButton.onclick = () => {
                li.remove();
            };
            li.appendChild(removeButton);
            historicoList.insertBefore(li, historicoList.firstChild);
        }

        function limparHistorico() {
            historicoList.innerHTML = '';
        }

        // Adicionando a funcionalidade de teclado
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            if (!isNaN(key) || ['+', '-', '*', '/', '^'].includes(key)) {
                adicionarNumero(key);
            } else if (key === 'Enter') {
                calcular();
            } else if (key === 'c' || key === 'C') {
                limpar();
            } else if (key === 'Backspace') {
                // Se você quiser remover o último dígito do display
                resultadoDisplay.innerText = resultadoDisplay.innerText.slice(0, -1) || '0';
            } else if (key === 'r' || key === 'R') {
                calcularRaiz();
            } else if (key === '!') {
                calcularFatorial();
            } else if (key === '%') {
                calcularPorcentagem();
            }
        });
    </script>
</body>
</html>
