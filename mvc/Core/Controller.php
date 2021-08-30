<?php
namespace mvc\Core;
use mvc\Core\Model;

class Controller {
    public $vars = [];
    public $layout = 'default';

    public function set( $d ) {
        $this->vars = array_merge( $this->vars, $d );
    }

    public function render( $filename ) {
        extract( $this->vars ); // array => variable
        ob_start();
        require( ROOT . 'Views/' . ucfirst( str_replace( 'Controller', '', basename( get_class( $this ) ) ) ) . '/' . $filename . '.php' ); 
        // Tasks

        $content_for_layout = ob_get_clean();
        // C:/xampp/htdocs/mvc/Views/Tasks/

        if ( $this->layout == false ) {
            $content_for_layout;
        } else {
            require( ROOT . 'Views/Layouts/' . $this->layout . '.php' );
        }
    }

    private function secure_input( $data ) {
        // var_dump($data);
        // exit;
        $data = trim( $data );
        $data = stripslashes( $data );
        $data = htmlspecialchars( $data );
        return $data;
    }

    protected function secure_form( $form ) {
        foreach ( $form as $key => $value ) {
            $form[$key] = $this->secure_input( $value );
        }
    }
}
