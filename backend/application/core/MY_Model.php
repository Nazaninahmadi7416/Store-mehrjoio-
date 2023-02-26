<?php


class MY_Model extends CI_Model {


	const DB_TABLE='abstract';
	const DB_TABLE_PK='abstract';


	private function insert(){
		$this->db->insert($this::DB_TABLE, $this);
		$this->{$this::DB_TABLE_PK} = $this->db->insert_id();
	}

	private function update($id){
		$this->db->update($this::DB_TABLE, $this, array($this::DB_TABLE_PK => $id));
	}

	public function populate($row){
			if($row!=null){
					foreach ($row as $key => $value) {
						$this->$key = $value;
					}
			}
	}

	public function load($id){
		$query=$this->db->get_where($this::DB_TABLE, array(
			$this::DB_TABLE_PK =>$id,
		));
		$this->populate($query->row());
	}

	public function login($mobile, $password){
		$query=$this->db->get_where($this::DB_TABLE, array(
			'mobile' =>$mobile,
			'password' =>$password
		));
		$this->populate($query->row());
	}

	public function loadByField($field_title, $field_value){
		$query=$this->db->get_where($this::DB_TABLE, array(
			$field_title =>$field_value,
		));
		//print_r($query->row());
		if($query->num_rows()>0){
			$this->populate($query->row());
		}
		
	}

	public function loadByMultiField($array){
		$query=$this->db->get_where($this::DB_TABLE, $array);
		//print_r($query->row());
		if($query->num_rows()>0){
			$this->populate($query->row());
		}
		
	}

	public function loadPromotedProduct(){
		$query=$this->db->get_where($this::DB_TABLE, array(
			'promote_index' => 1,
			'is_published' => 1
		), 1);
		//print_r($query->row());
		if($query->num_rows()>0){
			$this->populate($query->row());
		}
		
	}

	public function delete(){
		$this->db->delete($this::DB_TABLE, array(
			$this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},
		));
		unset($this->{$this::DB_TABLE_PK});
	}

	public function deleteBy($where){
		$this->db->delete($this::DB_TABLE, $where);
		unset($this->{$this::DB_TABLE_PK});
	}

	public function deleteByID($id){
		$this->db->delete($this::DB_TABLE, array(
			$this::DB_TABLE_PK => $id,
		));
		unset($this->{$this::DB_TABLE_PK});
	}

	public function deleteByMultipleField($array){
		$this->db->delete($this::DB_TABLE, $array);
		unset($this->{$this::DB_TABLE_PK});
	}

	public function save(){
		if(isset($this->{$this::DB_TABLE_PK})){
			$this->update($this->{$this::DB_TABLE_PK});
		}else{
			$this->insert();
			return $this->db->insert_id();
		}
	}

	function count($where=array())
    {
		$this->db->from($this::DB_TABLE);
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
        return $this->db->count_all_results();
    }

	public function get($limit=0, $offset=0, $where=array()){
		if($limit){
			if(count($where)>0){
				$query=$this->db->get_where($this::DB_TABLE, $where, $limit, $offset);
			}else{
				$query=$this->db->get($this::DB_TABLE, $limit, $offset);
			}

		}else{
			if(count($where)>0){
				$query=$this->db->get_where($this::DB_TABLE, $where);
			}else{
				$query=$this->db->get($this::DB_TABLE);
			}
		}

		$ret_val=array();
		$class=get_class($this);

		foreach ($query->result() as $row) {
			$model = new $class;
			$model->populate($row);
			$ret_val[] = $model;
		}
		return $ret_val;
	}


}




?>