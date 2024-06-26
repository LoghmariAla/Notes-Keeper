<!-- 
 __  ___ __  _ _  ___ _  _  _  ___  ___ __      ___  ___  _  _    _ _  ___ 
/ _|| __/ _|| | || o \ || \| || __||_ _/ _|    |_ _|| __|| |//   | | || o \
\_ \| _( (_ | U ||   / || \\ || _|  | |\_ \     | | | _| |  ( __ | U ||  _/
|__/|___\__||___||_|\\_||_|\_||___| |_||__/     |_| |___||_|\\__||___||_|  

                            - AUTHOR : ALA LOGHMARI
 -->

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}

require_once 'db_connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid Note ID");
}

$id = (int) $_GET['id'];
$user_id = $_SESSION['user_id'];

$req = $pdo->prepare("SELECT * FROM messages WHERE id = ? AND (user_id = ? OR user_id = 1)");
$req->execute([$id, $user_id]);
$message = $req->fetch();

if ($message) {
  echo "<div class='message-container'>";
  echo "<h2>Note Details</h2>";
  echo "<div class='message-content'>
          <p class='lead'>Content:</p>
          <p>" . htmlspecialchars($message['content']) . "</p>
        </div>";
  echo "</div>";
} else {
  echo "<div class='alert alert-danger' role='alert'>Note ID not found!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes Keeper - View Note</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .message-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 5px;
      background-color: #f5f5f5;
    }
    .message-content {
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
</body>
</html>
