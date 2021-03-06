<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model('_product');
        $this->load->model('_setting');
        $this->load->library('form_validation');

    }
	public function index()
	{
		$data['slide'] = $this->_setting->get('2');
		$data['hot'] = $this->_setting->get('1');
		$data['category'] = $this->db->get('category')->result();

		
		$data['title']="Waringin | Home";
		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/index',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
    public function product($id=null){

        $data['product'] = $this->_product->show($id);
        $data['category'] = $this->db->get('category')->result();
		$data['key']=null;
		if ($this->input->post('key')) {
			$data['key']=$this->input->post('key');
		}
        $data['title']="Show product | Waringin";

		
		$data['title']="Waringin | Home";
		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/product',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
	public function search(){
		$data['key']=null;
		if ($this->input->post('key')) {
			$data['key']=$this->input->post('key');
		}



        $data['product'] = $this->_product->get($data['key']);
        $data['category'] = $this->db->get('category')->result();

        $data['title']="Search | Waringin";

		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/search',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
	public function category($id=null){

        $data['product'] = $this->_product->getByCategory($id);
		$data['category'] = $this->db->get('category')->result();
		$data['c_name'] = $this->db->get_where('category',['id'=>$id])->row_array();

        $data['title']="Show category | ".$data['c_name']['name'];

		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/category',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
	public function about($id=null){

        $data['product'] = $this->_product->show($id);
        $data['category'] = $this->db->get('category')->result();

        $data['title']="About | Waringin";

		
		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/about',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
	public function contact($id=null){

        $data['product'] = $this->_product->show($id);
        $data['category'] = $this->db->get('category')->result();

        $data['title']="Contact| Waringin";

		
		$data['title']="Waringin | Home";
		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/contact',$data);
		$this->load->view('parts/footer',$data);
		$this->load->view('templates/footer');
	}
}
