<?php
/**
 * Created by PhpStorm.
 * User: luisclaudio
 * Date: 06/11/2018
 * Time: 09:49
 */

class Usuario_model extends CI_Model{
    public $nome;
    public $username;
    public $email;
    public $cpf;
    public $password;
    public $created_at;
    public $updated_at;

    public function get_users($columns = array(), $conditions = array(), $order = ''){
        $this->db->where($conditions); // e.g: array('idusuario <=' => 20, 'nome =' => john, ...);
        $this->db->select($columns); // e.g: array('idusuario', 'nome', 'username');
        $this->db->order_by($order); // e.g: 'idusuario DESC';
        return $this->db->get(Usuario_model::$tablename)->result();

    }

    public function insert_user($data){
        $this->nome = $data->post('nome');
        $this->username = $data->post('username');
        $this->email = $data->post('email');
        $this->cpf = $data->post('cpf');
        $this->password = password_hash($data->post('password'), PASSWORD_BCRYPT);
        $this->created_at = Date('YmdGis');
        $this->updated_at = Date('YmdGis');

        if($this->db->insert('usuario', $this))
            return true;
        return false;

    }

}