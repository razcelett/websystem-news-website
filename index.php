<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="static/css/index.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/ico" href="static/img/favicon.ico" />
		<title>FRONT PAGE</title>
	</head>
	<body>
		<div class="logo">
			<a href="index.php"><img src="static/img/title.png"></a>
		</div>

		<div class="nav">
			<div class="wrapper">
				<a class="foc" href="index.php">HOME</a>
				<a href="category.php?category=World">WORLD</a>
				<a href="category.php?category=Local">LOCAL</a>
				<!-- if - else condition for navbar views for logged user (admin or non admin) or no account is logged-->
				<?php
				if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 1) {
					echo "<a href='admin.php'>ADMINISTRATION</a>";
					echo "<a href='add-news.php'>ADD NEWS</a>";
					echo "<a href='logout.php'>LOGOUT</a>";
				} else if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 0){
					echo "<a href='admin.php'>ADMINISTRATION</a>";
					echo "<a href='edit-profile.php'>EDIT PROFILE</a>";
					echo "<a href='logout.php'>LOGOUT</a>";
				} else {
					echo "<a href='registration.php'>REGISTRATION</a>";
					echo "<a href='login.php'>LOGIN</a>";
				}
				?>
			</div>
		</div>

		<!-- ////////////////////////////////////////// -->
		<!-- looping of array of informations to be displayed in slides of the news -->
		<div class="imageslides">
			<?php
			include 'connect.php';
			define('UPLPATH', 'static/img/');
			?>
			
			<div class="flash_news">
				<h1>News Flash</h1>
			</div>
			
			<ul class="gallery">
				<li style="background: #f24236;">
				<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<h1>" . $row['category'] . " News</h1>";
						} 
				?>
			
				<div class="flash_image">
					<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<div class='flash_image'><img src='" . UPLPATH . $row['picture'] . "'></div>";
						} 
					?>
				</div>
				
				<div class="flash_text">
					<?php
						$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
						$result = mysqli_query($elements, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
							} 
					?>
						
					<div class="article-excerpt">
						<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
								<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
								} 
						?>
					</div>
					<br>
				</div>

				</li>

				<li style="background: #d3bdb0;">
				
				<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<h1>" . $row['category'] . " News</h1>";
						} 
				?>

				<div class="flash_image">
					<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<div class='flash_image'><img src='" . UPLPATH . $row['picture'] . "'></div>";
						} 
					?>
				</div>
				
				<div class="flash_text">
					<?php
						$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
						$result = mysqli_query($elements, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
							} 
					?>
						
					<div class="article-excerpt">
						<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
								<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
								} 
						?>
					</div>
					<br>
				</div>
				</li>

				<li style="background: #426289;">
				
				<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<h1>" . $row['category'] . " News</h1>";
						} 
				?>

				<div class="flash_image">
					<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<div class='flash_image'><img src='" . UPLPATH . $row['picture'] . "'></div>";
						} 
					?>
				</div>
				
				<div class="flash_text">
					<?php
						$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
						$result = mysqli_query($elements, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
							} 
					?>
						
					<div class="article-excerpt">
						<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
								<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
								} 
						?>
					</div>
					<br>
				</div>
				</li>

				<li style="background: #2b7878;">
				
				<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<h1>" . $row['category'] . " News</h1>";
						} 
				?>

				<div class="flash_image">
					<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<div class='flash_image'><img src='" . UPLPATH . $row['picture'] . "'></div>";
						} 
					?>
				</div>
				
				<div class="flash_text">
					<?php
						$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
						$result = mysqli_query($elements, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
							} 
					?>
						
					<div class="article-excerpt">
						<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
								<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
								} 
						?>
					</div>
					<br>
				</div>
				</li>

				<li style="background: #98d2eb;">
				
				<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<h1>" . $row['category'] . " News</h1>";
						} 
				?>

				<div class="flash_image">
					<?php
					$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
					$result = mysqli_query($elements, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo "<div class='flash_image'><img src='" . UPLPATH . $row['picture'] . "'></div>";
						} 
					?>
				</div>
				
				<div class="flash_text">
					<?php
						$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
						$result = mysqli_query($elements, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
							} 
					?>
						
					<div class="article-excerpt">
						<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
								<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
								} 
						?>
					</div>
					<br>
				</div>
				</li>
			</ul>
		</div>
		<!-- end of looping of array of informations to be displayed in slides of the news -->
		<!-- ////////////////////////////////////////// -->
		
		<!-- looping of array of informations to be displayed in each div -->
		<!-- partial:index.partial.html --> 
		<div class="latest_news">
			<main class="responsive-wrapper">
				<div class="page-title">
					<h1>Latest News</h1>
				</div>

				<div class="magazine-layout">
					<div class="magazine-column">
						<article class="article">
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=8";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--large'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=8";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
									<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									}
								?>
							</div>

							<div class="article-author">

								<div class="article-author-img">
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=8";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-img'><img src='" . UPLPATH . $row['author_pic'] . "'></div>";
										} 
									?>	
								</div>

								<div class="article-author-info">
									<dl>

										<?php
											$query = "SELECT * FROM news WHERE isArchive=0 AND id=8";
											$result = mysqli_query($elements, $query);
											while ($row = mysqli_fetch_array($result)) {
												echo "<div class='article-author-info'><dt>" . $row['author'] . "</dt>
													<dd>" . $row['author_pos'] . "</dd></div>";
												} 
										?>		

									</dl>
								</div>
							</div>
						</article>

						<article class="article">
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--large'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								}
							?>

							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									} 
								?>
							</div>
							<br>
							
							<div class="article-creditation">
								
							<dl>
								<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=3";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-creditation'><dt><p> By " . $row['author'] . "</p></dt>
										<dd>" . $row['author_pos'] . "</dd></div>";;
										} 
										
								?>
							</dl>
								
							</div>
						</article>
					</div>
					
					<div class="magazine-column">
						<article class="article">

							<h2 class="article-title article-title--small">
								<mark class="mark mark--secondary1">Miami Heat</mark> VS. <mark class="mark mark--secondary2">Denver Nuggets</mark>
							</h2>
							
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									} 
								?>		
							</figure>
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
									<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									} 
								?>
							</div>
							
							<div class="article-author">

								<div class="article-author-img">
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-img'><img src='" . UPLPATH . $row['author_pic'] . "'></div>";
										} 
									?>	
								</div>

								<div class="article-author-info">
									<dl>
										<?php
											$query = "SELECT * FROM news WHERE isArchive=0 AND id=1";
											$result = mysqli_query($elements, $query);
											while ($row = mysqli_fetch_array($result)) {
												echo "<div class='article-author-info'><dt>" . $row['author'] . "</dt>
													<dd>" . $row['author_pos'] . "</dd></div>";
												} 
										?>		
									</dl>
								</div>
							</div>
						</article>
						


						<article class="article">
							
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=7";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									} 
								?>		
							</figure>
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=7";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=7";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
									<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									} 
								?>
							</div>
							
							<div class="article-author">

								<div class="article-author-img">
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=7";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-img'><img src='" . UPLPATH . $row['author_pic'] . "'></div>";
										} 
									?>	
								</div>

								<div class="article-author-info">
									<dl>
										<?php
											$query = "SELECT * FROM news WHERE isArchive=0 AND id=7";
											$result = mysqli_query($elements, $query);
											while ($row = mysqli_fetch_array($result)) {
												echo "<div class='article-author-info'><dt>" . $row['author'] . "</dt>
													<dd>" . $row['author_pos'] . "</dd></div>";
												} 
										?>		
									</dl>
								</div>
							</div>
						</article>
					</div>

					

					<div class="magazine-column">
						<article class="article">
							
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									} 
									?>		
							</figure>
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--small'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-creditation">
								<p>
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=16";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-info'><dt> By " . $row['author'] . "</dt>
										<dd>" . $row['author_pos'] . "</dd></div>";
									} 
									?>
								</p>
							</div>
						</article>
						
						<article class="article">
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=11";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									}
								?>
							</figure>

							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=11";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--small'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-creditation">
								<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=11";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-creditation'><p> By " . $row['author'] . "</p></div>";
										} 
								?>	
							</div>
						</article>

						<article class="article">
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=10";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									}
								?>
							</figure>

							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=10";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--small'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-creditation">
								<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=10";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-creditation'><p> By " . $row['author'] . "</p></div>";
										} 
								?>	
							</div>
						</article>
					</div>

					<div class="magazine-column">
						<article class="article">
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
									<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									} 
								?>
							</div>

							<div class="article-author">

								<div class="article-author-img">
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-img'><img src='" . UPLPATH . $row['author_pic'] . "'></div>";
										} 
									?>	
								</div>

								<div class="article-author-info">
									<dl>
										<?php
											$query = "SELECT * FROM news WHERE isArchive=0 AND id=4";
											$result = mysqli_query($elements, $query);
											while ($row = mysqli_fetch_array($result)) {
												echo "<div class='article-author-info'><dt>" . $row['author'] . "</dt>
													<dd>" . $row['author_pos'] . "</dd></div>";
												} 
										?>		
									</dl>
								</div>
							</div>
						</article>

						<article class="article">
							
							<figure class="article-img">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='article-img'><img src='" . UPLPATH . $row['picture'] . "'></div>";
									}
								?>
							</figure>
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>

							<div class="article-excerpt">
								<?php
								$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
								$result = mysqli_query($elements, $query);
								while ($row = mysqli_fetch_array($result)) {
									echo "<a href='article.php?id=" . $row['id'] . "'>" . "</a>
									<div class='article-excerpt'><p>" . $row['abstract'] . "</p></div>";
									} 
								?>
							</div>

							<div class="article-author">

								<div class="article-author-img">
									<?php
									$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
									$result = mysqli_query($elements, $query);
									while ($row = mysqli_fetch_array($result)) {
										echo "<div class='article-author-img'><img src='" . UPLPATH . $row['author_pic'] . "'></div>";
										} 
									?>	
								</div>

								<div class="article-author-info">
									<dl>
										<?php
											$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
											$result = mysqli_query($elements, $query);
											while ($row = mysqli_fetch_array($result)) {
												echo "<div class='article-author-info'><dt>" . $row['author'] . "</dt>
													<dd>" . $row['author_pos'] . "</dd></div>";
												} 
										?>		
									</dl>
								</div>
							</div>
						</article>
					</div>
				</div>
			</main>
		</div>
		<!-- end of looping of array of informations to be displayed in each div -->
		<!-- partial -->
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>
	</body>
</html>