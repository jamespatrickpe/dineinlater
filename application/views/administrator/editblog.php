<h3> Edit Blog </h3>
	<?php
		echo form_open('administrator/attemptEditBlog',"style='text-align:left;'")."<br>";
		echo "<table style='vertical-align: bottom;'>";
		echo "<tr><td>title : </td><td>".form_input("title",$myBlog[0]->title)."</td></tr>";	
		echo "<tr><td>url : </td><td>".form_input("url",$myBlog[0]->url)."</td></tr>";
		echo "<tr><td>urlpic : </td><td>".form_input("urlpic",$myBlog[0]->urlpic)."</td></tr>";
		echo "<tr><td>blogdate : </td><td>"."<input name='blogdate' type='datetime-local', value=".$myBlog[0]->blogdate.">"."</td></tr>";
		echo "<tr><td>author : </td><td>".form_input("author",$myBlog[0]->author)."</td></tr>";
		echo "<tr><td>snippet : </td><td>".form_textarea("snippet",$myBlog[0]->snippet)."</td></tr>";
		echo "</table>";
		echo form_reset("reset","reset");
		echo form_submit("submit","edit")."<br>";
		echo form_close();
	?>