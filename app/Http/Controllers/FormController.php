<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    private $response = array();

    private function buildResponse($field, $value){
        switch ($field) {
            case "university":
                $this->response['university'] = $value;
                break;
            case "name":
                $this->response['students']['name'] = $value;
                break;
            case "surname":
                $this->response['students']['surname'] = $value;
                break;
            case "age":
                $this->response['students']['age'] = $value;
                break;
            case "ID":
                $this->response['students']['ID'] = $value;
                break;
            case "grades":
                $this->response['students']['grades'][] = $value;
                break;
            case "graduates":
                $oldValue = 0;
                if (isset($this->response['graduates'])){
                    $oldValue = $this->response['graduates'];
                }
                $this->response['graduates'] = $value +  $oldValue;
                break;
        }

    }

    private function parseInput($input){
        $elements = preg_split("/[\s,?%]+/", $input);
        foreach ($elements as $rs){
            $pairs = preg_split("(//|/|=|-)", $rs);
            $elemCount = count($pairs);
            for ($x = 0; $x < $elemCount; $x++) {
                $field = $pairs[$x];
                $x++;
                $value = $pairs[$x];
                $this->buildResponse($field, $value);
            }
        }
    }
    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $input = $request->stringInput;
        $this->parseInput($input);
        return view('form', array('input' => $input, 'response' => json_encode($this->response)));
    }
}
