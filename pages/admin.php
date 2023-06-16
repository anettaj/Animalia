<html>
    <head>
        <title>encyclopdia</title>

    </head>
<body>
<form method="POST" action=" " enctype="multipart/form-data">
  <input type="text" name="name"><br>
  <input type="file" name="image" accept="image/*"><br>
  <textarea type="text" name="content"></textarea><br>
  <input type="submit" value="Upload">
</form>

<?php
require('../db.conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the image file is uploaded without any errors
  if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $tmpName = $_FILES["image"]["tmp_name"];
    //$imageName = $_FILES["image"]["name"];
    $imageName = $_POST['name'];
    $imageContent = $_POST["content"];

    // Open and read the image file
    $imageData = file_get_contents($tmpName);

    // Prepare and execute the SQL statement
    $stmt = $con->prepare("INSERT INTO animal (name, image, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imageName, $imageData, $imageContent);
    $stmt->execute();

    // Close the database connection
    $con->close();

    echo "Image uploaded successfully.";
  } else {
    echo "Error uploading image.";
  }
}
?>
</body>
</html>