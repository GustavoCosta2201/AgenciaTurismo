const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Serve arquivos estáticos
app.use(express.static(path.join(__dirname, '/public')));

// Define a rota para a página inicial
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'views', 'index.html'));
});

// Define a rota para outras páginas
app.get('/:page', (req, res) => {
  const page = req.params.page;
  res.sendFile(path.join(__dirname, 'public', 'views', `${page}.html`));
});

// Rota para lidar com a lógica de login
app.post('/php/LoginInsert.php', (req, res) => {
  // Coloque aqui a lógica de login que você deseja executar
  // Por exemplo, autenticar o usuário no banco de dados
  // e redirecionar para a página apropriada com base no resultado
});

// Inicia o servidor
app.listen(port, () => {
  console.log(`Servidor Express rodando em http://localhost:${port}`);
});
