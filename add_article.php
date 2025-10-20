<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $img = $_POST['image'];
    $content = $_POST['content'];
    $id = strtolower(str_replace(' ', '-', $title)).'-'.time();

    $newArticle = [
        'id' => $id,
        'title' => $title,
        'description' => $desc,
        'image' => $img,
        'content' => $content
    ];

    $articles = [];
    if(file_exists('articles.json')){
        $articles = json_decode(file_get_contents('articles.json'), true);
    }
    $articles[] = $newArticle;
    file_put_contents('articles.json', json_encode($articles, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Article - CNN Clone</title>
<style>
body{font-family:'Segoe UI',sans-serif;background:#f4f4f4;margin:0;}
header{background:#c00;color:#fff;text-align:center;padding:15px;font-size:1.8rem;}
.container{max-width:600px;margin:30px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.1);}
input,textarea{width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;font-size:1rem;}
button{background:#c00;color:#fff;border:none;padding:10px 15px;border-radius:5px;cursor:pointer;font-weight:600;}
button:hover{background:#a00;}
</style>
</head>
<body>
<header>Add New Article</header>

<div class="container">
<form method="POST">
<label>Title:</label>
<input type="text" name="title" required>

<label>Short Description:</label>
<input type="text" name="description" required>

<label>Image URL:</label>
<input type="text" name="image" placeholder="https://source.unsplash.com/..." required>

<label>Full Content:</label>
<textarea name="content" rows="6" required></textarea>

<button type="submit">Post Article</button>
</form>
<br>
<button onclick="goHome()">Back to Home</button>
</div>

<script>
function goHome(){window.location.href='index.php';}
</script>

</body>
</html>
