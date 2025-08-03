import express from 'express';
const app = express();
const port = 3000;

app.get('/api/endpoint', (req, res) => {
  res.json({ message: 'Resposta do microserviço Node.js'});
});

app.listen(port, () => {
  console.log(`Microserviço rodando em http://localhost:${port}`);
});
