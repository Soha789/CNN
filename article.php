<?php
$id = isset($_GET['id']) ? $_GET['id'] : 'breaking-news';
$title = "Article Title for " . ucfirst(str_replace('-', ' ', $id));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?> - CNN Clone</title>
<style>
body{font-family:'Segoe UI',sans-serif;background:#f9f9f9;margin:0;color:#333;}
header{background:#c00;color:#fff;text-align:center;padding:15px;font-size:1.8rem;}
nav{display:flex;justify-content:center;gap:25px;background:#222;padding:10px 0;}
nav a{color:#fff;text-decoration:none;}
.container{max-width:800px;margin:30px auto;padding:0 15px;}
img.article-img{width:100%;border-radius:8px;margin-bottom:15px;}
h1{color:#c00;margin-bottom:10px;}
p{line-height:1.7;margin-bottom:15px;}
.related{margin-top:40px;}
.related h3{margin-bottom:15px;}
.related a{display:block;color:#c00;text-decoration:none;margin-bottom:8px;}
footer{text-align:center;background:#222;color:#fff;padding:15px;margin-top:40px;}
</style>
</head>
<body>

<header>CNN Clone</header>

<nav>
<a href="#" onclick="goHome()">Home</a>
<a href="#" onclick="goCategory('world')">World</a>
<a href="#" onclick="goCategory('sports')">Sports</a>
<a href="#" onclick="goCategory('tech')">Technology</a>
<a href="#" onclick="goCategory('entertainment')">Entertainment</a>
</nav>

<div class="container">
<img src="https://source.unsplash.com/800x400/?news,article" class="article-img" alt="">
<h1><?php echo $title; ?></h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim, metus vitae tincidunt blandit, odio metus egestas metus, sed cursus neque mi in purus.</p>
<p>Integer euismod lorem ut tortor posuere, vitae varius sapien dictum. Duis feugiat facilisis metus in ullamcorper. Maecenas in sapien vitae lorem malesuada facilisis.</p>

<div class="related">
<h3>Related Articles</h3>
<a href="#" onclick="goArticle('related-1')">Global Leaders Meet for Emergency Summit</a>
<a href="#" onclick="goArticle('related-2')">Technology That’s Changing the Future</a>
<a href="#" onclick="goArticle('related-3')">Entertainment Industry Sees Massive Shift</a>
</div>
</div>

<footer>© 2025 CNN Clone | Designed for Learning</footer>

<script>
function goHome(){window.location.href='index.php';}
function goCategory(cat){window.location.href='category.php?cat='+cat;}
function goArticle(id){window.location.href='article.php?id='+id;}
</script>

</body>
</html>
