<h3> Edit Blog </h3>
	<?php
		echo form_open('administrator/attemptEditBlog',"style='text-align:left;'")."<br>";
		echo "title : ".form_input("title","")."<br>";	
		echo "url : ".form_input("url","")."<br>";
		echo "urlpic : ".form_input("urlpic","")."<br>";
		echo "blogdate : "."<input name='blogdate' type='datetime-local'>"."<br>";
		echo "author : ".form_input("author","")."<br>";
		echo "snippet : ".form_textarea("snippet","")."<br>";
		echo form_reset("reset","reset");
		echo form_submit("submit","add")."<br>";
		echo form_close();
	?>