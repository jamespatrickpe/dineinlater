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
   		<th>edit</th>
   		<th>delete</th>
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
				echo "<td>". anchor('administrator/editblog?id='.$blog->bloggers_id, 'edit') ."</td>";
				echo "<td>". anchor('administrator/attemptDeleteblog?id='.$blog->bloggers_id, 'delete') ."</td>";
				echo "</tr>";
			}
   		?>
</table>

<h3> Add Blog </h3>
	<?php
		echo "<table style='vertical-align: bottom;'>";
		echo "<tr>";
		echo form_open('administrator/attemptAddBlog',"style='text-align:left;'")."</td>";
		echo "<tr><td>title : </td><td>".form_input("title","")."</td>";	
		echo "<tr><td>url : </td><td>".form_input("url","")."</td>";
		echo "<tr><td>urlpic : </td><td>".form_input("urlpic","")."</td>";
		echo "<tr><td>blogdate : </td><td>"."<input name='blogdate' type='datetime-local'>"."</td>";
		echo "<tr><td>author : </td><td>".form_input("author","")."</td>";
		echo "<tr><td>snippet : </td><td>".form_textarea("snippet","")."</td>";
		echo "</table>";
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
