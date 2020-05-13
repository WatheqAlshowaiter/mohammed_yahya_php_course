<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->_data['employees'] =  EmployeeModel::getAll();

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
        if ($emp === false) {
            $this->redirect('/employee');
        }

        $this->_data['employee'] = $emp;

        if (isset($_POST['submt'])) {

            $emp->name = $this->filterString($_POST['name']);
            $emp->age = $this->filterInteger($_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);

            if ($emp->save()) {
                // echo $emp->name . ' has been saved successfully, with id: '.$emp->id;
                $_SESSION['message'] = 'Employee saves successfully';
                $this->redirect('/employee');
            }
            var_dump($emp);
        }
        $this->_view();
    }
    public function deletAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
        
        if ($emp === false) {
            $this->redirect('/employee');
        }

        if ($emp->delete()) {
            $_SESSION['message'] = 'Employee deleted successfully';
            $this->redirect('/employee');
        }
    }
}
