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
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
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
							<small class="article-category">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="22" viewBox="0 0 28 22">
									<defs>
										<clipPath id="clip-headphones">
											<rect width="28" height="22"/>
										</clipPath>
									</defs>
									<g id="headphones" clip-path="url(#clip-headphones)">
										<g id="Group_2" data-name="Group 2" transform="translate(-3680 -609)">
											<path id="Subtraction_1" data-name="Subtraction 1" d="M5,12H5A5.274,5.274,0,0,1,0,6.5,5.274,5.274,0,0,1,5,1V12Z" transform="translate(3680 619)"/>
											<rect id="Rectangle_18" data-name="Rectangle 18" width="2" height="11" transform="translate(3686 620)"/>
											<path id="Subtraction_5" data-name="Subtraction 5" d="M1.243,12H.045C.015,11.67,0,11.334,0,11A11,11,0,0,1,18.778,3.222,10.925,10.925,0,0,1,22,11c0,.331-.015.667-.045,1h-1.2a14.108,14.108,0,0,0-2.685-6.241A8.982,8.982,0,0,0,11,2,8.982,8.982,0,0,0,3.929,5.759,14.109,14.109,0,0,0,1.243,12Z" transform="translate(3683 609)"/>
											<path id="Subtraction_6" data-name="Subtraction 6" d="M5,0H5A5.274,5.274,0,0,0,0,5.5,5.274,5.274,0,0,0,5,11V0Z" transform="translate(3708 631) rotate(180)"/>
											<rect id="Rectangle_23" data-name="Rectangle 23" width="2" height="11" transform="translate(3700 620)"/>
											<path id="Path_8" data-name="Path 8" d="M.156-.031,2.125-1.687,2,2H0Z" transform="translate(3683 619)"/>
											<path id="Path_9" data-name="Path 9" d="M1.969-.031,0-1.687.125,2h2Z" transform="translate(3702.875 619)"/>
										</g>
									</g>
								</svg>
								<span>Post Reports / Podcast</span>
							</small>
							
							<?php
							$query = "SELECT * FROM news WHERE isArchive=0 AND id=5";
							$result = mysqli_query($elements, $query);
							while ($row = mysqli_fetch_array($result)) {
								echo "<h2 class='article-title article-title--medium'><a class='article-link' href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>";
								} 
							?>
							
							<div class="article-podcast-player">
								<button class="podcast-play-button">
									<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M232.3125,114.34375,88.34375,26.35937A15.99781,15.99781,0,0,0,64,40.00781V215.99219a16.00521,16.00521,0,0,0,24.34375,13.64843L232.3125,141.65625a16.00727,16.00727,0,0,0,0-27.3125Z"></path></svg>
								</button>
								
								<div class="podcast-progression">
								</div>
								<span class="podcast-time">23:45</span>
							</div>

							<div class="article-podcast-info">
								Apple Podcasts, Google Podcasts, Stitcher
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