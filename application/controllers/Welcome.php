<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("M_Area");
		$this->load->model("M_Empleado");
		$this->load->model("M_Empleado_Rol"); 
		$this->load->model("M_Rol");
		$this->load->library('form_validation');
	}

	public function index(){
		$vista = array();
		if ($this->input->server('REQUEST_METHOD')=='POST'){
			if (isset($_POST['crear'])) {
				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('email', 'Correo electronico', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('areas', 'Area', 'required');
				$this->form_validation->set_rules('roles[]', 'Roles', 'required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

				if ($this->form_validation->run() == TRUE){
					$data = array();
					$data ['nombre'] = $this->input->post('nombre');
					$data ['email'] = $this->input->post('email');
					$data ['sexo'] = $this->input->post('sexo');
					$data ['area_id'] = $this->input->post('areas');
					$data ['descripcion'] = $this->input->post('descripcion');
					if (isset($_POST['boletin'])) {
						$data ['boletin'] = 1;
					}else{
						$data ['boletin'] = 0;
					}
					$roles = $this->input->post('roles');
					$id_empleado = $this->M_Empleado->insertar($data);
					if ($id_empleado > 0) {
						foreach ($roles as $value) {
							$data = array();
							$data ['empleado_id'] = $id_empleado;
							$data ['rol_id'] = $value;
							$this->M_Empleado_Rol->insertar($data);
						}
						$vista ["mensaje"] = 'success';
						$vista ["texto"] = 'Empleado creado.!';
					}else{
						$vista ["mensaje"] = 'error';
						$vista ["texto"] = 'Error al crear Empleado!';
					}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = 'Todos los campos son obligatorios';
				}
			}
			if (isset($_POST['actualizar'])) {
				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('email', 'Correo electronico', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('areas', 'Area', 'required');
				$this->form_validation->set_rules('roles[]', 'Roles', 'required');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
				if ($this->form_validation->run() == TRUE){
					$data = array();
					$data ['nombre'] = $this->input->post('nombre');
					$data ['email'] = $this->input->post('email');
					$data ['sexo'] = $this->input->post('sexo');
					$data ['area_id'] = $this->input->post('areas');
					$data ['descripcion'] = $this->input->post('descripcion');
					if (isset($_POST['boletin'])) {
						$data ['boletin'] = 1;
					}else{
						$data ['boletin'] = 0;
					}
					// echo "<pre>";
					// print_r($data);
					// echo "</pre>";
					$roles = $this->input->post('roles');
					if ($this->M_Empleado->actualizar($_POST['actualizar'],$data)> 0) {
						if ($this->M_Empleado_Rol->borrar($_POST['actualizar'])> 0) {
							foreach ($roles as $value) {
								$data = array();
								$data ['empleado_id'] = $_POST['actualizar'];
								$data ['rol_id'] = $value;
								$this->M_Empleado_Rol->insertar($data);
							}
							$vista ["mensaje"] = 'success';
							$vista ["texto"] = 'Empleado actualizado.!';
						}
					}else{
						$vista ["mensaje"] = 'error';
						$vista ["texto"] = 'Error al crear Empleado!';
					}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = 'Todos los campos son obligatorios';
				}
			}

			if (isset($_POST['borrar'])) {
				if ($this->M_Empleado->borrar($_POST['borrar'])>0) {
					if ($this->M_Empleado_Rol->borrar($_POST['borrar'])> 0) {
						$vista ["mensaje"] = 'success';
						$vista ["texto"] = 'Empleado eliminado.!';
					}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = 'Error al eliminar Empleado!';
				}
			}
		}

		$vista ["empleados"] = $this->M_Empleado->listar();
		$vista ["areas"] = $this->M_Area->listar();
		$vista ["roles"] = $this->M_Rol->listar();
		$vista ["rol_empleado"] = $this->M_Empleado_Rol->listar();
		$this->load->view('welcome_message',$vista);
	}
}
