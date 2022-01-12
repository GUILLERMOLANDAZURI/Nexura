<?php 
class M_Empleado extends Ci_Model{
	public function __contruct(){
		parent::__contruct();
	}
	private $tabla = "empleado";
	public function insertar($datos){
		return $this->db->insert($this->tabla,$datos);
	}
	public function actualizar($id,$datos){
		$this->db->where("id",$id);
		return $this->db->update($this->tabla,$datos);
	}
	public function borrar($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tabla);
	}
	public function listar(){ 
		$resultado = $this->db->query("SELECT a.id,a.nombre,a.email,a.sexo,a.area_id,a.boletin,a.descripcion,b.nombre as area FROM empleado a INNER JOIN areas b on b.id = a.area_id");
		return $resultado->result();
	}
}
?>