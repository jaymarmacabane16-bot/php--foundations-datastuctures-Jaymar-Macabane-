<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
$bookDetails = [
    "Treasure Island" => ["author" => "Robert Louis Stevenson", "year" => 1883, "genre" => "Adventure"],
    "Pride and Prejudice" => ["author" => "Jane Austen", "year" => 1813, "genre" => "Romance"],
    "The Shining" => ["author" => "Stephen King", "year" => 1977, "genre" => "Horror"],
    "Into the Wild" => ["author" => "Jon Krakauer", "year" => 1996, "genre" => "Adventure"],
    "Dracula" => ["author" => "Bram Stoker", "year" => 1897, "genre" => "Horror"]
];

function findBookInfo($title, $books) {
    if (array_key_exists($title, $books)) {
        $info = $books[$title];
        return "
            <div style='background: #f8f9fa; padding: 15px; margin: 10px 0; border: 1px solid #dee2e6; border-radius: 5px;'>
                <h4 style='margin: 0 0 10px 0; color: #495057;'>$title</h4>
                <p style='margin: 5px 0;'><strong>Author:</strong> {$info['author']}</p>
                <p style='margin: 5px 0;'><strong>Year:</strong> {$info['year']}</p>
                <p style='margin: 5px 0;'><strong>Genre:</strong> {$info['genre']}</p>
            </div>
        ";
    } else {
        return "
            <div style='background: #fff3cd; padding: 10px; margin: 10px 0; border: 1px solid #ffeaa7; border-radius: 5px;'>
                <p style='margin: 0; color: #856404;'>Book '$title' not found in collection.</p>
            </div>
        ";
    }
}

echo "<div style='font-family: Arial, sans-serif; padding: 20px; background: white; border: 1px solid #ccc; max-width: 500px;'>";
echo "<h3 style='color: #333; margin-bottom: 20px;'>Book Information Lookup</h3>";

echo findBookInfo("Treasure Island", $bookDetails);
echo findBookInfo("Pride and Prejudice", $bookDetails);
echo findBookInfo("The Great Gatsby", $bookDetails);
echo findBookInfo("Dracula", $bookDetails);

echo "</div>";
?>
</body>
</html>
