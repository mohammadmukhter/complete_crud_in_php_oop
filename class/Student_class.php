<?php

class Student_class{
	private $db;

	public function __construct()
	{
		$this->db= new Database();
	}

	public function store($data){
		$name=$data['name'];
		$roll=$data['roll'];
		$reg=$data['reg'];

		if(empty($name)||empty($roll)||empty($reg))
		{
			echo 'field is required';
		}
		else
		{
			$inserted=$this->db->insert("student_info","name='$name',roll='$roll',reg='$reg'");
			if($inserted)
			{
				echo 'data inserted successfully';
			}
			else
			{
				echo 'data not inserted';
			}
		}
	}


	public function show()
	{
		return $this->db->select("student_info");
	}

	public function destroy($delid)
	{
		$deleted=$this->db->delete("student_info","id='$delid'");
		if($deleted)
		{
			echo 'data deleted successfully';
		}
		else
		{
			echo 'something went wrong';
		}
	}

	public function first_select($id)
		{

			return $this->db->first("student_info","id='$id'")->fetch_assoc();
			


		}

	public function update_data($id,$data)
	{
		$name=$data['name'];
		$roll=$data['roll'];
		$reg=$data['reg'];

		if(empty($name)||empty($roll)||empty($reg))
		{
			echo 'field is required';
		}
		else
		{
			$updated=$this->db->update("student_info","name='$name',roll='$roll',reg='$reg'","id='$id'");
			if($updated)
			{
				echo 'update successfully';
			}
			else
			{
				echo 'something went wrong';
			}
		}
	}

}

?>