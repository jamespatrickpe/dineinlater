<?php
class Bloggers_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('bloggers');
        return $this->multipleResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('bloggers_id', $id);
		$query = $this->db->get('bloggers');
        return $this->singularResults($query);
	}
	
	public function editBlog($data, $id)
	{
		$data = array_filter($data);
		$this->db->where('restaurant_id', $id);
		$this->db->update('restaurant', $data); 
	}
	
	public function addBlog($title,$url,$urlpic = "resources/uploads/something.jpg",$date,$author,$snippet)
	{
		$data = array(
			   'title' => $title,
			   'url' => $url,
			   'urlpic' => $urlpic,
			   'blogdate' => $date,
			   'author' => $author,
			   'snippet' => $snippet,
			);
		$this->db->insert('bloggers', $data); 
	}
	
	public function deleteBlog($id)
	{
		$this->db->delete('bloggers', array('bloggers_id' => $id)); 
	}
}