<div class="container">
	<form action="#<?php //echo getHomeURL ?>employer_talent_search.php" method="POST" class="search-anything">
		<input type="text" id="searchtalent" name="searchtalent" value="<?php echo(isset($_POST['searchtalent']) ?htmlspecialchars($_POST['searchtalent']) :'') ?>" placeholder="Search for anything" class="search-anything__input">
		<button class="search-anything__button search-anything__button--blue">
			<i class="fas fa-search"></i>
		</button>
	</form>
	
	<div id="searchjobBox"></div>
	
	<nav class="user-nav-group">
		<div class="user-nav">
			<div class="user-nav__icon user-nav__icon--blue">
				<i class="fas fa-bell"></i>
			</div>
			<span class="user-nav__notification">0</span>
		</div>
		<div class="user-nav">
			<div class="user-nav__icon user-nav__icon--blue">
				<i class="far fa-envelope"></i>
			</div>
		</div>
	</nav>
</div>