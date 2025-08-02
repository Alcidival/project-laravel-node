import express from 'express';
import cors from 'cors';
const app = express();

app.use(cors());

app.get('/', (req, res) => {
  res.send('Hello from Node.js service!');
});

app.listen(3000, () => {
  console.log('Node.js service is running on port 3000');
});
