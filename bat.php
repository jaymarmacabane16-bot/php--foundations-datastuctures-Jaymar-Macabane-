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

$bookTree = new BookBST();
$bookTree->addBook("Treasure Island");
$bookTree->addBook("Pride and Prejudice");
$bookTree->addBook("The Shining");
$bookTree->addBook("Dracula");
$bookTree->addBook("Into the Wild");
$bookTree->addBook("The Wedding Date");

echo "<div style='font-family: Arial, sans-serif; padding: 20px; background: #f8f9fa; border: 1px solid #dee2e6; max-width: 400px;'>";
echo "<h3 style='color: #495057; margin-bottom: 15px;'>Books in Alphabetical Order</h3>";
echo "<div style='background: white; padding: 15px; border-radius: 5px;'>";
$bookTree->showAlphabetical($bookTree->root);
echo "</div>";

echo "<h4 style='color: #495057; margin-top: 20px;'>Search Results:</h4>";
echo "<div style='background: white; padding: 15px; border-radius: 5px;'>";
echo "Search for 'Dracula': " . ($bookTree->findBook("Dracula") ? "Found" : "Not Found") . "<br>";
echo "Search for 'The Shining': " . ($bookTree->findBook("The Shining") ? "Found" : "Not Found") . "<br>";
echo "Search for 'Moby Dick': " . ($bookTree->findBook("Moby Dick") ? "Found" : "Not Found");
echo "</div>";
echo "</div>";
?>
</body>
</html>
