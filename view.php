<?php
$conn = new mysqli("localhost", "root", "", "registration_system");
if ($conn->connect_error) die("Connection failed");

$sql = "SELECT * FROM clients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Registered Users</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form">
    <h2>Registered Users</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
      <tr>
        <th>ID</th><th>Email</th><th>Name</th><th>Gender</th><th>Country</th><th>Actions</th>
      </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
          <td><?= $row['gender'] ?></td>
          <td><?= $row['country'] ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
