<?php

namespace CF\NotificationBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NotificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
	public function findUserNotification($user)
	{
		return $this->createQueryBuilder('n')
			->join('n.utilisateur', 'u')
			->orderBy('n.id', 'DESC')
			->setMaxResults(50)
			->getQuery()
			->getResult();
	}
}
