<?php

namespace Model;

class Usuario extends ActiveRecord {
    //base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin' , 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'Nombre es obligatorio';
        }

        if(!$this->apellido) {
            self::$alertas['error'][] = 'Apellido es obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'Email es obligatorio';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'Telefono es obligatorio';
        }

        return self::$alertas;
    }

    //revisa si el usuario ya existe
    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }
        return $resultado;
        debuguear($query);
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function validarLoguin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La Contraseña es obligatoria';
        }
        return self::$alertas;
    }

    public function comprobarPasswordYVerificado($password) {
        $resultado = password_verify($password, $this->password);
        if(!$this->confirmado || !$resultado) {
            self::$alertas['error'][] = 'Contraseña incorrecta o cuenta no confirmada';
        }else {
            return true;
        }
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatorio';
        }
        return self::$alertas;
    }
}