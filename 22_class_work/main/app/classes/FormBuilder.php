<?php

namespace App\classes;

use App\classes\traits;

class FormBuilder
{
    use traits\ValueTypes;
    use traits\TextTypes;
    use traits\OtherTypes;

    public string $address;
    public string $method;
    public string $text;
    public string $type;
    public string $value;

    const ALLOWED_TYPE = ['button','checkbox','color','date','datetime-local','email','file','hidden','image','month','number','password','radio','range','reset','search','submit','tel','text','time','url','week'];

    function __construct($address = 'index.php', $method = 'POST', $text = 'Some text', $type='text', $value = 'some')
    {
        $this->address =$address;
        $this->method = $method;
        $this->text = $text;
        $this->type = $type;
        $this->value = $value;
    }

    public function open($address, $method)
    {
        return "<form action=\"{$address}\" method=\"{$method}\">";
    }

    public function close(){
        return "</form>";
    }
}