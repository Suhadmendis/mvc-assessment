<?php

class Model_unit extends CI_Model{


    function showAmount()
    {
        return $this->cal($this->input->post('units'));
    }

    function cal($value)
    {
        // admin configuration

        $lavel_1_limit = 80;
        $lavel_1_value = 2.5; 
        //200

        $lavel_2_limit = 200;
        $lavel_2_value = 6;
        //1200

        $lavel_3_limit = 200;
        $lavel_3_value = 7.2;
        //1440

        $lavel_4_limit = 480;
        $lavel_4_value = 8.5;
        //2840 + level 4

        // admin configuration
            
        $amount = 0;

        if ($lavel_1_limit < $value) {
            $amount = $lavel_1_limit * $lavel_1_value;
            $value = $value - $lavel_1_limit;
        }else{
            return "Rs. " . number_format($value * $lavel_1_value, 2);
        }

        if ($lavel_2_limit < $value) {
            $amount = $amount + $lavel_2_limit * $lavel_2_value;
            $value = $value - $lavel_2_limit;
        }else{
            return "Rs. " . number_format($value * $lavel_2_value + $amount, 2);
        }

        if ($lavel_3_limit < $value) {
            $amount = $amount + $lavel_3_limit * $lavel_3_value;
            $value = $value - $lavel_3_limit;
        }else{
            return "Rs. " . number_format($value * $lavel_3_value + $amount, 2);
        }


        if (0 < $value) {
            $amount = $amount + $value * $lavel_4_value;
            return "Rs. " . number_format($amount, 2);
        }

    }
}




?>