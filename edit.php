<?php
$conn = new mysqli("localhost", "root", "", "registration_system");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clients WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form class="form" action="update.php" method="POST">
    <h2>Edit User</h2>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="email" name="email" value="<?= $row['email'] ?>" required>
    <input type="text" name="first_name" value="<?= $row['first_name'] ?>" required>
    <input type="text" name="last_name" value="<?= $row['last_name'] ?>" required>

    <label><input type="radio" name="gender" value="Male" <?= $row['gender']=='Male'?'checked':'' ?>> Male</label>
    <label><input type="radio" name="gender" value="Female" <?= $row['gender']=='Female'?'checked':'' ?>> Female</label>

    <select name="country" required>
      <option value="">Select a country</option>
      <option value="Ghana" <?= $row['country']=='Ghana'?'selected':'' ?>>Ghana</option>
      <option value="Nigeria" <?= $row['country']=='Nigeria'?'selected':'' ?>>Nigeria</option>
      <option value="Kenya" <?= $row['country']=='Kenya'?'selected':'' ?>>Kenya</option>
    </select>

    <button type="submit">Update</button>
  </form>
</body>
</html>
