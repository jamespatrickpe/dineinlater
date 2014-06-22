<div id="content-container">
		<div id="body-container">
			
			<?php
				foreach($bloggers as $blog)
				{
					echo "<div class='blurb-rows'>";
					echo "<blurb>";
					echo "<a href=".$blog->url."><div class='blurb-header'><h2>".$blog->title."</h2></div></a>";
					echo "<div class='blurb-rows'>";
					echo "<div class='user-info'>";
					echo "<div class='user-photo'><img src='".$blog->urlpic."' width='200' height='200'></div>";
					echo "<h3></h3>";
					echo "<span>".$blog->author."</span>";
					echo "</div>";
					echo "<div class='review-body'>";
					echo $blog->snippet;
					echo "</div>";
					echo "</div>";
					echo "</blurb>";
					echo "</div class='blurb-rows'>";
				}
				
			?>
			</div>
		</div>