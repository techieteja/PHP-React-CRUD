<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React, PHP - CRUD</title>
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <script crossorigin src='https://unpkg.com/react-router-dom@5.0.0/umd/react-router-dom.min.js'></script>
    <script crossorigin src="https://unpkg.com/@babel/standalone@7.16.12/babel.min.js"></script>
</head>
<body>
    
<?php
$conn = new mysqli("localhost", "root", "", "denocrud");

// Create Record
$name = $_POST['name'];
$sql = "INSERT INTO users(name) VALUES('$name')";
$conn->query($sql);

// Update Record
$name = $_POST['name'];
$sql = "UPDATE users SET name='$name' WHERE id=2";
$conn->query($sql);

// Delete Records
$sql = "DELETE FROM users WHERE id=3";
$conn->query($sql);

// View Records
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["name"] . "<br>";
}
?>

<script type="text/babel">
const App = () => {
    return (
        <div className="createForm">
            <form method="post" action="">
                <input type="text" name="name" placeholder="Enter your name..." />
                <button type="sybmit">Save</button>
            </form>
        </div>
    );
}

ReactDOM.render(<App />, document.querySelector("body"));
</script>
</body>
</html>