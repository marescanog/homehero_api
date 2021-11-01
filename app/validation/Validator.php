<?php

namespace App\Validation;

class Validator{
    protected $requestHandler;
    public $errors = [];

    public function validate($request, array $rules){
        foreach($rules as $field => $rule){
            try{
                $rule->setName($field)->assert(CustomRequestHandler::getParam($request, $field));
            }catch(NestedValidationException $ex){
                $this->errors[$field] = $ex->getMessages();
            }
        }
        return this;
    }

    public function failed(){
        return !empty($this->errors);
    }
}