<?php

class DVD extends Product
{
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if ($size > 0) {
            $this->size = $size;
        } else {
        }
    }

    public function filldata($data)
    {
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setSku($data['sku']);
        $this->setSize($data['size']);
    }

    public function getData()
    {
        return [
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'price' => $this->getPrice(),
            'attributes' => "Size: " . $this->getSize() . "MB",
        ];
    }
}
