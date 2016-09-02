<?php
namespace ApiAnimal\Controller;

use Exception;
use Animal\Model\Animal as AnimalModel;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Used to receive any call that came from outside
 */
class AnimalrestController extends AbstractRestfulController
{

    /** @var AnimalModel */
    private $AnimalModel;

    public function __construct(AnimalModel $AnimalModel)
    {
        $this->setAnimalModel($AnimalModel);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function create($data)
    {
        try {
            unset($data['id']);
            $id = $this->getAnimalModel()->saveAnimal($data);
            $data['id'] = $id;
        } catch(Exception $e) {
        }

        return new JsonModel($data);
    }

    public function getList()
    {
        $results = $this->getAnimalModel()->fetchAll();
        $data = array();
        foreach($results as $result) {
            $data[] = $result;
        }

        return new JsonModel($data);
    }

    /**
     * @param string $id
     *
     * @return mixed|void
     */
    public function get($id)
    {
        $this->methodNotAllowed();
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @return mixed|void
     */
    public function update($id, $data)
    {

    }

    /**
     * @param string $id
     *
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->methodNotAllowed();
    }

    /**
     * This method is used to restrict the entry point for any call that try to connect
     */
    protected function methodNotAllowed()
    {
        $this->response->setStatusCode(Response::STATUS_CODE_405);
    }

    /**
     * @return AnimalModel
     */
    private function getAnimalModel()
    {
        return $this->AnimalModel;
    }

    /**
     * @param AnimalModel $AnimalModel
     */
    private function setAnimalModel(AnimalModel $AnimalModel)
    {
        $this->AnimalModel = $AnimalModel;
    }


} 
