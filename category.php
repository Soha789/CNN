<?php
$cat = isset($_GET['cat']) ? ucfirst($_GET['cat']) : 'General';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $cat; ?> News - CNN Clone</title>
<style>
body{font-family:'Segoe UI',sans-serif;background:#f4f4f4;margin:0;}
header{background:#c00;color:#fff;text-align:center;padding:15px;font-size:1.8rem;}
nav{display:flex;justify-content:center;gap:25px;background:#222;padding:10px 0;}
nav a{color:#fff;text-decoration:none;}
.container{max-width:1000px;margin:30px auto;padding:0 15px;}
.article-card{background:#fff;border-radius:8px;margin-bottom:20px;padding:15px;display:flex;gap:20px;align-items:center;box-shadow:0 2px 6px rgba(0,0,0,0.1);cursor:pointer;transition:0.3s;}
.article-card:hover{transform:translateY(-5px);}
.article-card img{width:180px;height:120px;border-radius:8px;object-fit:cover;}
footer{text-align:center;background:#222;color:#fff;padding:15px;margin-top:40px;}
</style>
</head>
<body>

<header><?php echo $cat; ?> News</header>

<nav>
<a href="#" onclick="goHome()">Home</a>
<a href="#" onclick="goCategory('world')">World</a>
<a href="#" onclick="goCategory('sports')">Sports</a>
<a href="#" onclick="goCategory('tech')">Technology</a>
<a href="#" onclick="goCategory('entertainment')">Entertainment</a>
</nav>

<div class="container">
<div class="article-card" onclick="goArticle('a1')">
  <img src="https://source.unsplash.com/400x300/?<?php echo strtolower($cat); ?>" alt="">
  <div>
    <h2><?php echo $cat; ?> Headline 1</h2>
    <p>Short intro text about this <?php echo strtolower($cat); ?> article...</p>
  </div>
</div>

<div class="article-card" onclick="goArticle('a2')">
  <img src="https://source.unsplash.com/400x300/?<?php echo strtolower($cat); ?>,2" alt="">
  <div>
    <h2><?php echo $cat; ?> Headline 2</h2>
    <p>Another engaging piece of news from the <?php echo strtolower($cat); ?> category.</p>
  </div>
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
