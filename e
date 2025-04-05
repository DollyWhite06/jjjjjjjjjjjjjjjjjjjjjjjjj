const { execSync } = require('child_process');

function medirTiempo(comando, descripcion) {
  console.log(`\n>> ${descripcion}`);
  const start = Date.now();
  execSync(comando, { stdio: 'inherit' });
  const end = Date.now();
  console.log(`==> Tiempo: ${((end - start) / 1000).toFixed(2)}s`);
}

// 1. Generar CSV de 300,000 cryptos
medirTiempo('node generador_aleatorio.js', '1. Generar 300,000 datos aleatorios');

// 2. Importar CSV a Cryptos
medirTiempo('node database_performance.js', '2. Importar CSV a tabla Cryptos');

// 3. Exportar primeros 1000 cryptos
medirTiempo('node exportarCryptos.js', '3. Exportar primeros 1000 de Cryptos');

// 4. Importar CSV a Compras
medirTiempo('node importar_compras.js', '4. Importar CSV a tabla Compras');

// 5. Dump de Compras
medirTiempo('mysqldump -u root Respaldo Compras > dump_compras.sql', '5. Generar dump de Compras');

// 6. Importar dump a base Respaldo
medirTiempo('mysql -u root Respaldo < dump_compras.sql', '6. Importar dump a base Respaldo');
