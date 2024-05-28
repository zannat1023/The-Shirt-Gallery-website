<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], textarea, select  {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Submit Product Details</h2>
    <form action="submit_product.php" method="post"  enctype="multipart/form-data">

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" required>

        <label for="category">Category:</label>
        <select id="category" name="categoryID" required>

            <option value="">Select a category</option>
            <?php
            $username = "root";
            $password = "";
            $dbname = "s_gallery";

            // Create connection
            $conn = new mysqli("localhost", $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch categories
            $category_sql = "SELECT categoryID, categoryName FROM category";
            $category_result = $conn->query($category_sql);

            if ($category_result->num_rows > 0) {
                while ($category = $category_result->fetch_assoc()) {
                    echo "<option value='" . $category['categoryID'] . "'>" . $category['categoryName'] . "</option>";
                }
            } else {
                echo "<option value=''>No categories available</option>";
            }

            // Close connection
            $conn->close();
            ?>
        </select>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" required>


        <input type="submit" value="Submit">
    </form>
</body>
</html>
