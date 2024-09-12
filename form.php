<?php
class formBuilder
{
    var $form_id;
    var $validators=" ";
	function build($type,$name,$id,$class,$placeholder,$opt)
	{
		if ($type=="text")
		{
			$input="<input type='text' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
		}
        if ($type=="date")
		{
			$input="<input type='date' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
		}
        if ($type=="number")
		{
			$input="<input type='number' name='$name' id='$id' class='$class' $opt>";
            echo $input;
		}
        if ($type=="email")
		{
			$input="<input type='email' name='$name' id='$id' class='$class' $opt>";
            echo $input;
		}
        if ($type=="password")
		{
			$input="<input type='password' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
		}
        if ($type=="radio")
		{
			$input="<input type='radio' name='$name' id='$id' class='$class' $opt>";
            echo $input;
		}
        if ($type=="checkbox")
		{
			$input="<input type='checkbox' name='$name' id='$id' class='$class' $opt>";
            echo $input;
		}
        if ($type=="textarea")
		{
			$input="<textarea name='$name' id='$id' class='$class' placeholder='$placeholder' $opt></textarea>";
            echo $input;
		}
        if ($type=="submit")
		{
			$input="<button type='submit' class='$class'>$opt</button>";
            echo $input;
		}
        if ($type=="file")
		{
			$input="<input type='file' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
		}
    }
    function validate($name,$rules)
    {
       
        $this->validators=$this->validators."
            $name: {
            verbose: false,
                validators: {";
        if (in_array("required",$rules))
        {
            $label=$rules["label"];
           $this->validators=$this->validators."notEmpty: {
                        message: '$label không được để trống'
                    }," ;
        }
        if (array_key_exists("min",$rules) && array_key_exists("max",$rules))
        {
            $label=$rules["label"];
            $min=$rules["min"];
            $max=$rules["max"];
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    max: $max,
                    message: 'Độ dài $label cần nhiều hơn $min vả nhỏ hơn $max ký tự'
                }," ;
           
        }
        else if(array_key_exists("max",$rules))
        {
            $label=$rules["label"];
            $max=$rules["max"];
            $this->validators=$this->validators."stringLength: {
                    max: $max,
                    message: 'Độ dài $label cần nhỏ hơn $max ký tự'
                }," ;
        }
        else if(array_key_exists("min",$rules))
        {
            $label=$rules["label"];
            $min=$rules["min"];
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    message: 'Độ dài $label cần nhiều hơn $min ký tự'
                }," ;
        }
        if (array_key_exists("regexp",$rules))
        {
            $label=$rules["label"];
            $exp=$rules["regexp"];
            switch($exp)
            {
                case "name": 
                    $expression='/^[a-zA-Z ]+$/';
                    $err_msg="$label chỉ bao gồm chữ cái";
                    break;
                case "age":
                    $expression='/^(0?[0-9]?[0-9]|1[01][0-1]|11[0-1])$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "address":
                    $expression='/^[a-zA-Z0-9,\n ]+$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "place":
                    $expression='/^[a-zA-Z ,]+$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "pin":
                    $expression='/^[1-9][0-9]{5}$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "mobile":
                    $expression='/^([0|\+[9][1]{1,5})?([0][0-9]{9})$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "phone":
                    $expression='/^[0-9]\d{2,4}-\d{6,8}$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "number":
                    $expression='/^[0-9 ]+$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "text":
                    $expression='/^[a-zA-Z,. ]+$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "year":
                    $expression='/^[1-2]{1}[0-9]{3}$/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
                case "url":
                    $expression='/@^(http\:\/\/|https\:\/\/)?([a-z0-9][a-z0-9\-]*\.)+[a-z0-9][a-z0-9\-]*$@i/';
                    $err_msg="Nhập hợp lệ $label";
                    break;
            }
            $this->validators=$this->validators."regexp: {
                        regexp: $expression,
                        message: '$err_msg'
                    },";
        }
        if (in_array("email",$rules)) 
        {
            $this->validators=$this->validators."emailAddress: {
                        message: 'Giá trị nhập không phải địa chỉ email'
                    },";
            
        }
        if (array_key_exists("identical",$rules)) 
        { 
            $identical=$rules["identical"];
            $identical_field= explode(" ",$identical);
            $idl=$identical_field[0];
            $label=$rules["label"];
            $msg="";
            for($i=1;$i<sizeof($identical_field);$i++)
            {
                $msg=$msg.' '.$identical_field[$i];
            }
            $this->validators=$this->validators."identical: {
                        field: '$idl',
                        message: '$msg và $label không giống nhau'
                    },";
        }
        if (array_key_exists("different",$rules))
        { 
            $different=$rules["different"];
            $label=$rules["label"];
            $different_field= explode(" ",$different);
            $msg="";
            $dff=$different_field[0];
            for($i=1;$i<sizeof($different_field);$i++)
            { 
                $msg=$msg.' '.$different_field[$i];
            }
            $this->validators=$this->validators."different: {
                        field: '$dff',
                        message: '$label và $msg phải khác nhau'
                    },";
        }
        if (array_key_exists("remote",$rules)) 
        {
            $remote=$rules["remote"];
            $label=$rules["label"];
            $this->validators=$this->validators."remote: {
                        message: 'Enter the $label',
                        url: '$remote',
                        type: 'POST',
                        delay: 2000
                    },";
        }
        $this->validators=rtrim($this->validators,",");
        $this->validators=$this->validators." } },";
        
    }
    function applyvalidations($form_id)
    { 
        $header="
            $(document).ready(function() {
            $('#$form_id').bootstrapValidator({
            fields: {";
        $footer="}
            });
            });
            ";
        $this->validators=rtrim($this->validators,",");
        echo $header;
        echo $this->validators;
        echo $footer;
        $this->validators="";
    }
    
}
?>