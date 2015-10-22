<?php

class PagesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index(){
        // $this->data['pages'] = $this->model->getList();
    }

    public function q2_1(){

    }
    public function q2_2(){

    }
    public function q2_3(){

    }
    public function q2_4(){

    }
    public function q3_1(){

    }
    public function q3_2(){

    }
    public function q3_3(){

    }
    public function q4_1(){

    }
    public function q5_1(){

    }
    public function q5_2(){

    }
    public function q5_3(){

    }
    public function q5_4(){

    }
    public function q5_5(){

    }
    public function q5_6(){

    }
    public function q5_7(){

    }
    public function q5_8(){

    }
    public function q5_9(){

    }
    public function q6_1(){

    }
    public function q6_2(){

    }
    public function q6_3(){

    }
    public function q6_4(){

    }
    public function q6_5(){

    }
    public function q6_6(){

    }
    public function q7_1(){

    }
    public function q8_1(){

    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = strtolower($params[0]);
            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }

    public function admin_index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function admin_add(){
        if ( $_POST ){
            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }

    public function admin_edit(){

        if ( $_POST ){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }

        if ( isset($this->params[0]) ){
            $this->data['page'] = $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/pages/');
        }
    }

    public function admin_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }

}