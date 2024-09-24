<?php 

/**
 * Main Model trait
 */
Trait Model
{
	use Database;

	protected $limit 		= 10;
	protected $offset 		= 0;
	protected $order_type 	= "desc";
	protected $order_column = "id";
	public $errors 		= [];

	public function get_all()
	{
	 
		$query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

		return $this->query($query);
	}

	public function get($data, $data_not = [])
	{

		$query = "select * from $this->table where ";

		foreach ($data as $key=>$value) {
			$query .= $key . " = '". $value . "' && ";
		}

		foreach ($data_not as $key=>$value) {
			$query .= $key . " != '". $value . "' && ";
		}
		
		$query = trim($query," && ");

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		return $this->query($query);
	}

	public function insert($data)
	{
		
		/** remove unwanted data **/
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
        $values = array_values($data);
		$query = "insert into $this->table (".implode(",", $keys).") values ('".implode("','", $values)."')";
		
		return $this->query($query);

		
	}



	
}