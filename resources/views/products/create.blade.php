<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        /* General Styling for the Form */
        form {
            max-width: 600px;
            margin: 30px auto;
            background: #f5f8fa; /* Light blue-gray background */
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
            border: 1px solid #007BFF; /* Blue border */
        }

        /* Label Styling */
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
            font-size: 16px;
        }

        /* Input, Textarea, and File Input Styling */
        form input[type="text"],
        form input[type="number"],
        form input[type="file"],
        form textarea {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background: #fff;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.2s ease;
        }

        form textarea {
            resize: vertical; /* Allow resizing only vertically */
            min-height: 100px;
        }

        /* Focus Effect */
        form input:focus,
        form textarea:focus {
            border-color: #007BFF; /* Blue border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* File Input Styling */
        form input[type="file"] {
            padding: 5px;
            border: none;
            background: #eef3fc; /* Light blue background for file input */
            color: #333;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="file"]:hover {
            background: #dae8fd; /* Slightly darker on hover */
        }

        /* Button Styling */
        form .btn {
            display: inline-block;
            background: #007BFF; /* Blue button */
            color: #fff;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        form .btn:hover {
            background: #0056b3; /* Darker blue on hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 15px 20px;
            }

            form .btn {
                font-size: 14px;
                padding: 10px 15px;
            }
        }      
    </style>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required>

        <label for="images">Upload Images:</label>
        <input type="file" name="images[]" id="images" multiple required>

        <button type="submit" class="btn">Add Product</button>
    </form>
</body>
</html>