<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Author: Sander "Cubit32" Buruma
-->
<html>
<head>
<title>World is cube shaped!</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
    <nav class="unselectable">
        <a href="ScriboCursim/index.php">Scribo Cursim</a><a href="index.php">Blog</a><a href="ScriboCursim/test.php">Test</a><a>Competition</a>
    </nav>
    <article>
        <header>
            <h1>World is cube shaped!!</h1>
            <p class="posted-by">Posted by: Cubit32</p>
            <figure>
                <img src="blueCube.jpg" alt="fancy blue cube">
                <figcaption>Artist rendition of our cuboid world!</figcaption>
            </figure>
        </header>
        <p>The world renowned theoritician baron von Cubethazar working from his boat has returned from the edge of the world and has discovered that the world is in fact perfectly cube shaped!</p>
        <p>"The world in fact is cube shaped. There are 5 more facets to our world that are completely unknown to us. We must go out and find out what lies beyond the edges of our facet of the world!</p>
        <div href="form.html"></div>
    </article>

    <form id="comment-form" action="submit.php" method="post">
        <input type="text" id="name" name="name"  placeholder="name" required></input><br>
        <input type="text" id="email" name="email"  placeholder="youremail@domain.dmn"></input><br>
        <textarea rows="10" cols="31" id="comment"  name="comment" placeholder="Type your comment here!" required></textarea><br>
        <input type="submit" value="Submit Comment"></input><br>
    </form>
</body>
</html>