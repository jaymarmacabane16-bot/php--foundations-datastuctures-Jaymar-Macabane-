<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
$bookCollection = [
    "Adventure" => [
        "Classic Adventures" => ["Treasure Island", "Journey to the Center of the Earth"],
        "Modern Adventures" => ["The Beach", "Into the Wild"]
    ],
    "Romance" => [
        "Historical Romance" => ["Pride and Prejudice", "Outlander"],
        "Contemporary Romance" => ["The Wedding Date", "The Kiss Quotient"]
    ],
    "Horror" => [
        "Supernatural" => ["The Shining", "Dracula"],
        "Psychological" => ["The Silent Patient", "Gone Girl"]
    ]
];

function showBookShelves($collection, $level = 0) {
    $padding = str_repeat("----", $level);
    
    foreach($collection as $section => $items) {
        if(is_array($items)) {
            echo "<div style='color: #8B4513; margin-left: " . ($level * 20) . "px;'>";
            echo "$section";
            echo "</div>";
            showBookShelves($items, $level + 1);
        } else {
            echo "<div style='color: #2F4F4F; margin-left: " . ($level * 20) . "px;'>";
            echo "$items";
            echo "</div>";
        }
    }
}

echo "<div style='font-family: Courier New, monospace; background: #F5F5DC; padding: 20px; border: 2px solid #8B4513;'>";
echo "<h3 style='color: #8B4513;'>Simple Library Collection</h3>";
showBookShelves($bookCollection);
echo "</div>";
?>
</body>
</html>
