<?php	session_start();	require_once "includes/secure.php";	require_once "includes/connect.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  
  <title>
    Add post
  </title>
  
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
  
  <script src="js/jquery-1.9.0.min.js">
  </script>
  
  <script type="text/javascript" src="js/bootstrap.js">
  </script>
  <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
  </head>
  <body>
    <!-- Shell -->
    <div id="shell">
      
      <!-- Header -->
      
      <div id="header">
		
  <h1>
    <a href="#">
      Admin
    </a>
  </h1>
  
  <div class="right">
    
    <p>
      Welcome 
      <a href="#">
        <strong>
          <?php echo $_SESSION['user']; ?>
        </strong>
      </a>
    </p>
    
    <p class="small-nav">
      <a href="logout.php">
        Log Out
      </a>
    </p>
    
  </div>
  
  </div>
  
  <!-- End Header -->
  
  <!-- Navigation -->
  
  <div id="navigation">
    
    <ul>
      
      <li>
        <a href="index.php">
          <span>
            All Posts
          </span>
        </a>
      </li>
      
      <li>
        <a href="add_post.php">
          <span>
            Add Post
          </span>
        </a>
      </li>
      
      <!--li>
<a href="#" class="active">
<span>
User Management
</span>
</a>
</li>

<li>
<a href="#">
<span>
Photo Gallery
</span>
</a>
</li>

<li>
<a href="#">
<span>
Products
</span>
</a>
</li>

<li>
<a href="#">
<span>
Services Control
</span>
</a>
</li-->
  
  </ul>
  
  </div>
  
  <!-- End Navigation -->
  
  <!-- Content -->
  
  <div id="content">
    
    <div class="addpostcontainer">
      
      <?php				$id = $_GET['id'];				$sql = "select * from posts where id=".$id;				$result = mysql_query($sql);				if(mysql_num_rows($result)==1)				{					$row = mysql_fetch_array($result);				}			?>
      
      <form action="process.php" method="post" name="addpost">
        
        <p>
          <label>
            Post Title*
          </label>
          <input type="text" name="title" required value="
<?php echo $row['title']; ?>
" id="title" />
  </p>
  
  <p>
    <label>
      Post Content*
    </label>
    <textarea name="content" required >
      <?php echo $row['content']; ?>
    </textarea>
  </p>
  
  <input type="hidden" name="id" value="
<?php echo $row['id']; ?>
">
  
  <p>
    <input type="submit" name="editpost" value="Edit Post" id="editpost" />
  </p>
  
  </form>
  
  </div>
  
  </div>
  
  <!-- End Content -->
  </div>
  <!-- End Shell -->
  <!-- Footer -->
  <div id="footer">
    
    <p>
      &copy; Train2Invest.com
    </p>
  </div>
  <!-- End Footer -->
  </body>
</html>