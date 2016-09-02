<?php
namespace Animal\Options;

/**
 * Used to map each database field in a class
 */
class Animal
{

    public $id;
    public $description;
    public $url;

    /**
     * @param array $data
     */
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->description = (isset($data['description'])) ? $data['description'] : null;
        $this->url = (isset($data['url'])) ? $data['url'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
