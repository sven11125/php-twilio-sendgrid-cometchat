<div class="container">
	<form action="<?php echo getHomeURL ?>talent-jobs-search.php" method="POST" class="search-anything">
		<input type="text" id="searchjob" name="searchjob" value="<?php echo(isset($_POST['searchjob']) ?htmlspecialchars($_POST['searchjob']) :'') ?>" placeholder="Search for anything" class="search-anything__input">
		<button class="search-anything__button">
			<i class="fas fa-search"></i>
		</button>
		<div id="searchjobBox"><div id="arrow_box"></div></div>
	</form>
	
	<nav class="user-nav-group">
		<div class="user-nav">
			<div class="user-nav__icon">
				<i class="fas fa-bell"></i>
			</div>
			<span class="user-nav__notification">0</span>
		</div>
		<div class="user-nav">
			<div class="user-nav__icon">
				<i class="far fa-envelope"></i>
			</div>
		</div>
	</nav>
</div>