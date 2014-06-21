<h3> Current Blogs </h3>

<table>
	<tr>
		<th>id</th>
		<th>title</th>
   		<th>url</th>
   		<th>urlpic</th>
   		<th>blogdate</th>
   		<th>author</th>
   		<th>snippet</th>
   	</tr>
   		<?php
   			foreach($blogResults as $blog) 
   			{
   				echo "<tr>";
			    echo "<td>".$blog->bloggers_id."</td>";
				echo "<td>".$blog->title."</td>";
			    echo "<td>".$blog->url."</td>";
				echo "<td>".$blog->urlpic."</td>";
			    echo "<td>".$blog->blogdate."</td>";
				echo "<td>".$blog->author."</td>";
			    echo "<td>".$blog->snippet."</td>";
				echo "</tr>";
			}
   		?>
</table>

<h3> Add Blog </h3>
	<?php
		echo form_open('administrator/attemptAddBlog',"style='text-align:left;'")."<br>";
		echo "title : ".form_input("title","")."<br>";	
		echo "bloggers_id : ".form_input("bloggers_id","")."<br>";
		echo "url : ".form_input("url","")."<br>";
		echo "urlpic : ".form_input("urlpic","")."<br>";
		echo "blogdate : ".form_input("blogdate","")."<br>";
		echo "author : ".form_input("author","")."<br>";
		echo "snippet : ".form_textarea("snippet","")."<br>";
		echo form_reset("reset","reset");
		echo form_submit("submit","add")."<br>";
		echo form_close();
	?>
	
<h3> Delete Blog </h3>
	<?php
		echo form_open('administrator/attemptDeleteBlog', "style='text-align:left;'");
		
		echo "<select name='selectedBlogToBeDeleted'>";
		foreach($blogResults as $blog) 
		{
			echo "<option value=".$blog->blog_id.">".$blog->title."</option>";
		}
		echo "</select>";
		
		echo form_submit("submit","delete");
		echo form_close();
	?>
<br><br><br>
