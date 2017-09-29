<?php

namespace FH\Bundle\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GenreRepository extends EntityRepository
{
    public function save($genre)
    {
        $this->getEntityManager()->persist($genre);
        $this->getEntityManager()->flush();
    }
}
