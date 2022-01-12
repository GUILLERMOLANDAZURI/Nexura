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
				$this->form_validation->set_rules('roles', 'Roles', 'required');
				$this->form_validation->set_rules('descripcion', 'Nombre', 'required');

				if ($this->form_validation->run() == TRUE){
					echo 'todo bien ';
				// 	$data = array();
				// 	$data ['Detalle'] = $this->input->post('detalle');
				// 	$data ['FechaVencimiento'] = $this->input->post('fecha');
				// 	$data ['FechaCreacion'] = $fecha;
				// 	$data ['Finalizado'] = 'NO';
				// 	$data ['Nombre'] = $this->session->userdata('usuario');
				// 	$this->load->model("M_Area");
				// 	if ($this->M_Area->insertar($data)>0) {
				// 		$vista ["mensaje"] = 'success';
				// 		$vista ["texto"] = 'Empleado creada.!';
				// 	}else{
				// 		$vista ["mensaje"] = 'error';
				// 		$vista ["texto"] = 'Error al crear Empleado!';
				// 	}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = validation_errors();
					//$this->response($vista);
				}
			}


			if (isset($_POST['actualizar'])) {

				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('email', 'Correo electronico', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('areas', 'Area', 'required');
				$this->form_validation->set_rules('roles', 'Roles', 'required');
				$this->form_validation->set_rules('descripcion', 'Nombre', 'required');

				if ($this->form_validation->run() == TRUE){
					$data = array();
					$data ['Detalle'] = $this->input->post('detalle');
					$data ['FechaVencimiento'] = $this->input->post('fecha');
					$data ['Finalizado'] = $this->input->post('finalizo');
					$this->load->model("M_Area");
					if ($this->M_Area->Actualizar($_POST['actualizar'],$data)>0) {
						$vista ["mensaje"] = 'success';
						$vista ["texto"] = 'Empleado actualizada.!';
					}else{
						$vista ["mensaje"] = 'error';
						$vista ["texto"] = 'Error al actualizar Empleado!';
					}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = validation_errors();
					$this->response($vista);
				}
			}

			if (isset($_POST['borrar'])) {

				$this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('email', 'Correo electronico', 'required');
				$this->form_validation->set_rules('sexo', 'Sexo', 'required');
				$this->form_validation->set_rules('areas', 'Area', 'required');
				$this->form_validation->set_rules('roles', 'Roles', 'required');
				$this->form_validation->set_rules('descripcion', 'Nombre', 'required');

				if ($this->form_validation->run() == TRUE){
					$this->load->model("M_Area");
					if ($this->M_Area->borrar($_POST['borrar'])>0) {
						$vista ["mensaje"] = 'success';
						$vista ["texto"] = 'Empleado eliminada.!';
					}else{
						$vista ["mensaje"] = 'error';
						$vista ["texto"] = 'Error al eliminar Empleado!';
					}
				}else{
					$vista ["mensaje"] = 'error';
					$vista ["texto"] = validation_errors();
					$this->response($vista);
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
