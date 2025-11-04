<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
class BookNode {
    public $title;
    public $left;
    public $right;
    public function __construct($title) {
        $this->title = $title;
        $this->left = null;
        $this->right = null;
    }
}

class BookBST {
    public $root;
    
    public function __construct() {
        $this->root = null;
    }
    
    public function addBook($title) {
        $newNode = new BookNode($title);
        
        if ($this->root === null) {
            $this->root = $newNode;
            return;
        }
        
        $current = $this->root;
        while (true) {
            if (strcasecmp($title, $current->title) < 0) {
                if ($current->left === null) {
                    $current->left = $newNode;
                    return;
                }
                $current = $current->left;
            } else {
                if ($current->right === null) {
                    $current->right = $newNode;
                    return;
                }
                $current = $current->right;
            }
        }
    }
    
    public function findBook($title) {
        $current = $this->root;
        
        while ($current !== null) {
            $compare = strcasecmp($title, $current->title);
            
            if ($compare === 0) {
                return true;
            } elseif ($compare < 0) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }
        
        return false;
    }
    
    public function showAlphabetical($node) {
        if ($node !== null) {
            $this->showAlphabetical($node->left);
            echo "<div style='padding: 5px 0;'>" . $node->title . "</div>";
            $this->showAlphabetical($node->right);
        }
    }
}

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

$bookDetails = [
    "Treasure Island" => ["author" => "Robert Louis Stevenson", "year" => 1883, "genre" => "Adventure"],
    "Pride and Prejudice" => ["author" => "Jane Austen", "year" => 1813, "genre" => "Romance"],
    "The Shining" => ["author" => "Stephen King", "year" => 1977, "genre" => "Horror"],
    "Into the Wild" => ["author" => "Jon Krakauer", "year" => 1996, "genre" => "Adventure"],
    "Dracula" => ["author" => "Bram Stoker", "year" => 1897, "genre" => "Horror"]
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

$bookTree = new BookBST();
foreach ($bookDetails as $title => $info) {
    $bookTree->addBook($title);
}

echo "<div style='font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: 0 auto;'>";
echo "<h2 style='color: #333; text-align: center; margin-bottom: 30px;'>Complete Library Management System</h2>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 20px;'>";

echo "<div style='background: #F5F5DC; padding: 20px; border: 2px solid #8B4513;'>";
echo "<h3 style='color: #8B4513;'>Library Categories</h3>";
showBookShelves($bookCollection);
echo "</div>";

echo "<div style='background: #f8f9fa; padding: 20px; border: 1px solid #dee2e6;'>";
echo "<h3 style='color: #495057;'>Book Details</h3>";
echo findBookInfo("Treasure Island", $bookDetails);
echo findBookInfo("Pride and Prejudice", $bookDetails);
echo findBookInfo("The Shining", $bookDetails);
echo "</div>";

echo "<div style='background: #f8f9fa; padding: 20px; border: 1px solid #dee2e6; grid-column: span 2;'>";
echo "<h3 style='color: #495057;'>Alphabetical Book List</h3>";
echo "<div style='background: white; padding: 15px; border-radius: 5px;'>";
$bookTree->showAlphabetical($bookTree->root);
echo "</div>";

echo "<h4 style='color: #495057; margin-top: 20px;'>Book Search</h4>";
echo "<div style='background: white; padding: 15px; border-radius: 5px;'>";
echo "Search for 'Dracula': " . ($bookTree->findBook("Dracula") ? "Found" : "Not Found") . "<br>";
echo "Search for 'The Shining': " . ($bookTree->findBook("The Shining") ? "Found" : "Not Found") . "<br>";
echo "Search for 'Moby Dick': " . ($bookTree->findBook("Moby Dick") ? "Found" : "Not Found");
echo "</div>";
echo "</div>";

echo "</div>";
echo "</div>";
?>
</body>
</html>
