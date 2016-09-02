<?php
namespace Animal\Model;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Hydrator\ObjectProperty;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Used Animalreate the TaskModel object but inject all his dependeAnimals
 */
class TaskFactory implements FactoryInterface
{

    const TABLE = 'animals';

    const DB_ADAPTER = 'Zend\Db\Adapter\Adapter';

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
  Animal
     * @return AnimalModel
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var AdapterInterface $db */
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetProperty = new HydratingResultSet();
        $resultSetProperty->setHydrator(new ObjectProperty());
        $resultSetProperty->setObjectPrototype(new AnimalOption());

        $tableGateway = new TableGateway(self::TABLE, $db, null, $resultSetProperty);
        //TODO: create an interface to manage the model as something abstract
        //instead of depend from in this case tableGatAnimal
        return new AnimalModel($tableGateway);
    }
}
