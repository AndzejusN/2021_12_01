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

    private array $file;

    function __construct($address = 'index.php', $method = 'POST', $text = 'Some text', $type='text', $value = 'some')
    {
        $this->address = $address;
        $this->method = $method;
        $this->text = $text;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @param array $some
     */
    public function setFile(array $file): void
    {
        $this->file = $file;
    }


    public function open($address, $method)
    {
        return "<form action=\"{$address}\" method=\"{$method}\">";
    }

    public function close(){
        return "</form>";
    }
}