<?php
// Load existing articles
$articles = [];
if(file_exists('articles.json')){
  $data = file_get_contents('articles.json');
  $articles = json_decode($data, true);
}

// Handle delete request
if(isset($_GET['delete'])){
  $deleteId = $_GET['delete'];
  $articles = array_filter($articles, fn($a) => $a['id'] !== $deleteId);
  file_put_contents('articles.json', json_encode(array_values($articles), JSON_PRETTY_PRINT));
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CNN Clone - Home</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f4f4f4;color:#222;}
header{background:#c00;color:#fff;padding:15px;text-align:center;font-size:1.8rem;font-weight:600;}
nav{display:flex;justify-content:center;gap:25px;background:#222;padding:10px 0;}
nav a{color:#fff;text-decoration:none;font-weight:500;transition:0.3s;}
nav a:hover{color:#f00;}
.container{max-width:1100px;margin:30px auto;padding:0 15px;}
.featured{display:flex;flex-wrap:wrap;gap:20px;}
.featured-article{flex:1 1 48%;background:#fff;border-radius:8px;overflow:hidden;cursor:pointer;box-shadow:0 2px 6px rgba(0,0,0,0.1);position:relative;}
.featured-article img{width:100%;height:220px;object-fit:cover;}
.featured-article .info{padding:15px;}
.featured-article .info h2{color:#c00;margin-bottom:10px;}
.categories{margin-top:40px;}
.category-list{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:15px;}
.category{background:#fff;padding:20px;border-radius:8px;text-align:center;cursor:pointer;transition:0.3s;box-shadow:0 2px 6px rgba(0,0,0,0.1);}
.category:hover{transform:translateY(-5px);background:#ffecec;}
footer{text-align:center;background:#222;color:#fff;padding:15px;margin-top:40px;}
button.add{background:#c00;color:#fff;border:none;padding:10px 15px;border-radius:5px;cursor:pointer;font-weight:600;margin-bottom:15px;}
button.add:hover{background:#a00;}
.delete-btn{position:absolute;top:10px;right:10px;background:#c00;color:#fff;border:none;border-radius:5px;padding:5px 8px;cursor:pointer;font-size:0.9rem;display:none;}
.featured-article:hover .delete-btn{display:block;}
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
<a href="#" onclick="goAddArticle()">+ Add Article</a>
</nav>

<div class="container">
<section class="featured">
  <div class="featured-article" onclick="goArticle('breaking-news')">
    <img src="https://source.unsplash.com/600x400/?news,world" alt="">
    <div class="info">
      <h2>Breaking News: Global Event Shocks the World</h2>
      <p>Governments worldwide respond to a sudden international crisis that’s capturing headlines everywhere...</p>
    </div>
  </div>
  <div class="featured-article" onclick="goArticle('sports-highlight')">
    <img src="https://source.unsplash.com/600x400/?sports,stadium" alt="">
    <div class="info">
      <h2>Sports Highlight: Last-Minute Goal Stuns Fans</h2>
      <p>A breathtaking finish leaves everyone speechless as underdogs claim victory in dramatic style...</p>
    </div>
  </div>
</section>

<section class="categories">
<h2 style="margin-bottom:15px;color:#c00;">Your Articles</h2>
<?php if(!empty($articles)): ?>
<div class="featured">
<?php foreach(array_reverse($articles) as $article): ?>
  <div class="featured-article">
    <button class="delete-btn" onclick="deleteArticle('<?php echo $article['id']; ?>', event)">✖</button>
    <img src="<?php echo htmlspecialchars($article['image']); ?>" onclick="goArticle('<?php echo $article['id']; ?>')" alt="">
    <div class="info" onclick="goArticle('<?php echo $article['id']; ?>')">
      <h2><?php echo htmlspecialchars($article['title']); ?></h2>
      <p><?php echo htmlspecialchars($article['description']); ?></p>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p>No articles posted yet. Click “+ Add Article” to post one.</p>
<?php endif; ?>
</section>
</div>

<footer>© 2025 CNN Clone | Designed for Learning</footer>

<script>
function goHome(){window.location.href='index.php';}
function goCategory(cat){window.location.href='category.php?cat='+cat;}
function goArticle(id){window.location.href='article.php?id='+id;}
function goAddArticle(){window.location.href='add_article.php';}

function deleteArticle(id, event){
  event.stopPropagation();
  if(confirm('Are you sure you want to delete this article?')){
    window.location.href='index.php?delete=' + id;
  }
}
</script>

</body>
</html>
