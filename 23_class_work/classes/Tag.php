<?php

class Tag
{
    private string $tag;
    private string $text;
    private string $attribute;
    private string $value;

    public function __construct($tag = 'a')
    {
        $this->setTag($tag);
    }

    public function setText(string $text): Tag
    {
        $this->text = $text;
        return $this;
    }

    public function setAttr($attribute, $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
        return $this;
    }

    public function show()
    {
        echo $this->get();
    }

    public function get()
    {
        return "<{$this->tag} {$this->attribute}=\"{$this->value}\"> {$this->text} </{$this->tag}>";
    }


    /**
     * @param mixed|string $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}