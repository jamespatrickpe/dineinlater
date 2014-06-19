<?php
class Bloggers_Model extends MY_Model 
{
	public function __construct()
	{	
	}
	
	public function getAll()
	{
		$query = $this->db->get('bloggers');
        return finalizeResults($query);
	}
	
	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bloggers');
        return $this->singularResults($query);
	}
	
	public function addBlog($title,$url,$urlpic,$date,$author,$snippet)
	{
		$data = array(
			   'title' => $title,
			   'url' => $url,
			   'urlpic' => $urlpic,
			   'date' => $date,
			   'author' => $author,
			   'snippet' => $snippet,
			);
		$this->db->insert('bloggers', $data); 
	}
	
	public function deleteBlog($id)
	{
		$this->db->delete('bloggers', array('id' => $id)); 
	}
}