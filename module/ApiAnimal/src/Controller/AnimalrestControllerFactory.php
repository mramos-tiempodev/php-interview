<?php
namespace ApiTask\Controller;

use Animal\Model\Animal as AnimalModel;
use ApiAnimal\Controller\AnimalrestController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Used to create the AnimalrestController object and inject all the dependencies
 * required by the object
 */
class TaskRestControllerFactory implements FactoryInterface
{

	/**
	 * Create service
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 *
	 * @return AnimalrestController
	 */
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		/** @var ServiceLocatorInterface $sm */
		$sm = $serviceLocator->getServiceLocator();
		/** @var AnimalModel $taskModel */
		$taskModel = $sm->get('Task');
		return new AnimalrestController($taskModel);
	}
}