<!-- 
 __  ___ __  _ _  ___ _  _  _  ___  ___ __      ___  ___  _  _    _ _  ___ 
/ _|| __/ _|| | || o \ || \| || __||_ _/ _|    |_ _|| __|| |//   | | || o \
\_ \| _( (_ | U ||   / || \\ || _|  | |\_ \     | | | _| |  ( __ | U ||  _/
|__/|___\__||___||_|\\_||_|\_||___| |_||__/     |_| |___||_|\\__||___||_|  

                            - AUTHOR : ALA LOGHMARI
 -->

<?php
$host = 'REDACTED';
$dbname = 'REDACTED';
$username = 'REDACTED';
$password = 'REDACTED';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>