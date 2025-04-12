const mysql = require('mysql2');
const pool = mysql.createPool({
    host: 'localhost',
    user: 'root', //  tu usuario de MySQL
    password: '', //  por tu contraseña de MySQL
    database: 'crudconnode'
});
module.exports = pool.promise();
