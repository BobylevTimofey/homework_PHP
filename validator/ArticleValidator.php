<?php

class ArticleValidator
{
    protected $rules;

    public function __construct()
    {

        $this->rules = [

            'age' => [
                'required' => [
                    'message' => 'Возраст - обязательное поле!'
                ],
                'min_value' => [
                    'value' => 18,
                    'message' => 'Ваш возраст должен быть больше 18!'
                ],
                'max_value' => [
                    'value' => 100,
                    'message' => 'Ваш возраст должен быть меньше 100!'
                ]
            ],

            'cost' => [
                'required' => [
                    'message' => 'Стоимость недвижимости - обязательное поле!'
                ],
                'min_value' => [
                    'value' => 0,
                    'message' => 'Стоимость должна быть больше 0!'
                ],
                'max_value' => [
                    'value' => 25000000,
                    'message' => 'Стоимость должна быть меньше 25.000.000!'
                ]
            ],

            'initial payment' => [
                'required' => [
                    'message' => 'Первоначальный взнос - обязательное поле!'
                ],
                'min_value' => [
                    'value' => 0,
                    'message' => 'Первоначальный взнос должен быть больше 0!'
                ],
            ],

            'time' => [
                'required' => [
                    'message' => 'Срок кридитования - обязательное поле!'
                ],
                'min_value' => [
                    'value' => 36,
                    'message' => 'Срок кредитования должен быть больше 36!'
                ],
                'max_value' => [
                    'value' => 360,
                    'message' => 'Срок кредитования должен быть меньше 360!'
                ]
            ],
        ];
    }


    public function validate($data) {

        $errors = [
        ];


        foreach ($this->rules as $fieldName =>  $rule) {
            $fieldNotEmpty = !empty(trim($data[$fieldName]));

            if (isset($rule['required']) && $fieldNotEmpty === false)  {
                $errors[$fieldName] = isset($rule['required']['message']) ?  $rule['required']['message']  : 'Required.';
            }

        }

        $minValueAge = $data['age'] < $this->rules['age']['min_value']['value'];
        $maxValueAge = $data['age'] > $this->rules['age']['max_value']['value'];
        $minValueCost = $data['cost'] < $this->rules['cost']['min_value']['value'];
        $maxValueCost = $data['cost'] > $this->rules['cost']['max_value']['value'];
        $minValueInitialPayment = $data['initial payment'] < $this->rules['initial payment']['min_value']['value'];
        $maxValueInitialPayment = $data['initial payment'] > $data['cost'];
        $minValueTime = $data['time'] < $this->rules['time']['min_value']['value'];
        $maxValueTime = $data['time'] > $this->rules['time']['max_value']['value'];

        if (!isset($errors['age']) && $minValueAge){
            $errors['age'] = $this->rules['age']['min_value']['message'];
        } elseif (!isset($errors['age']) && $maxValueAge) {
            $errors['age'] = $this->rules['age']['max_value']['message'];
        }
        if (!isset($errors['cost']) && $minValueCost){
            $errors['cost'] = $this->rules['cost']['min_value']['message'];
        } elseif (!isset($errors['cost']) && $maxValueCost) {
            $errors['cost'] = $this->rules['cost']['max_value']['message'];
        }
        if (!isset($errors['initial payment']) && $minValueInitialPayment){
            $errors['initial payment'] = $this->rules['initial payment']['min_value']['message'];
        } elseif (!isset($errors['cost']) && $maxValueInitialPayment) {
            $errors['initial payment'] = 'Первоначальный взнос должен быть меньше стоимости!';
        }
        if (!isset($errors['time']) && $minValueTime){
            $errors['time'] = $this->rules['time']['min_value']['message'];
        } elseif (!isset($errors['time']) && $maxValueTime) {
            $errors['time'] = $this->rules['time']['max_value']['message'];
        }

        return $errors;
    }
}