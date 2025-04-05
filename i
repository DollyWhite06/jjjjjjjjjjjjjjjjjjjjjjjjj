const mysql = require('mysql2');
const path = require('path');

console.time("ImportarCompras");

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '', // Cambia si usas contraseña
  database: 'Respaldo',
  multipleStatements: true
});

const filePath = path.resolve(__dirname, 'compras.csv');
const query = `
  LOAD DATA LOCAL INFILE '${filePath.replace(/\\/g, '\\\\')}'
  INTO TABLE Compras
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\\n'
  IGNORE 1 ROWS;
`;

connection.query(query, (err) => {
  if (err) throw err;
  console.timeEnd("ImportarCompras");
  connection.end();
});
