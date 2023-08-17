<?php


class Book extends Product
{
    public function setWeight($weight)
    {
        if ($weight > 0) {
            $this->weight = $weight;
        } else {
        }
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function filldata($data)
    {
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setSku($data['sku']);
        $this->setWeight($data['weight']);
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'price' => $this->getPrice(),
            'attributes' => "Weight: " . $this->getWeight() . "KG",
        ];
    }
}
