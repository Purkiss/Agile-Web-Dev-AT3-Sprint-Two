<?php
echo '<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ACME Arts</a>
    </div>
    <ul class="nav navbar-nav">
      <li class><a href="index.php">Artwork</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Artists
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="allartist.php">All Artists</a></li>
		  <li><a href="renoir.php">Renoir</a></li>
		  <li><a href="michelangelo.php">Michelangelo</a></li>
		  <li><a href="vangogh.php">Van Gogh</a></li>
		  <li><a href="davinci.php">da Vinci</a></li>
		  <li><a href="monet.php">Monet</a></li>
		  <li><a href="picasso.php">Picasso</a></li>
		  <li><a href="dali.php">Dali</a></li>
		  <li><a href="cezanne.php">Cezanne</a></li>
        </ul>
      </li><li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Styles
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="impressionism.php">Impressionism</a></li>		  
          <li><a href="mannerism.php">Mannerism</a></li>		  
          <li><a href="still-life.php">Still-Life</a></li>		  
          <li><a href="portrait.php">Portrait</a></li>
          <li><a href="realism.php">Realism</a></li>
          <li><a href="cubism.php">Cubism</a></li>
		  <li><a href="surrealism.php">Surrealism</a></li>
        </ul>
      </li>
	  </li><li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Artists by Style
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="artists-impressionism.php">Impressionism</a></li>
		  <li><a href="artists-mannerism.php">Mannerism</a></li>		  
          <li><a href="artists-still-life.php">Still-Life</a></li>		  
          <li><a href="artists-portrait.php">Portrait</a></li>
          <li><a href="artists-realism.php">Realism</a></li>
          <li><a href="artists-cubism.php">Cubism</a></li>
		  <li><a href="artists-surrealism.php">Surrealism</a></li>	  
        </ul>
      </li>
	  </li><li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Artists by Media
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="artists-oil.php">Oil</a></li>
		  <li><a href="artists-pen-ink.php">Pen Ink</a></li>
        </ul>
      </li>
    </ul>
    </li>
    </ul>
  </div>
</nav>';
?>