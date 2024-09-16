<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style_register.css">

    <style>
        .container {
    text-align: center;
}

.form-container {
    border: 1px solid #ccc;
    color: white;
    padding: 20px;
    width: 300px; /* Adjust the width as needed */
    margin: 0 auto; /* Center horizontally */
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

button {
    display: block;
    margin: 10px auto;
    padding: 10px 20px;
    background-color: #4CAF50; /* Green */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="register_src.php" method="post">
                <h2>Registrar</h2>
                <label for="usuario">Username:</label>
                <input type="text" name="usuario" id="usuario" required>
                <br>
                <label for="senha">Password:</label>
                <input type="password" name="senha" id="senha" required>
                <br>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>