<?php

namespace Mailery\Setting\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

final class SettingGroupList extends ArrayCollection
{

    /**
     * @return self
     */
    public function ordered(): self
    {
        return $this->matching(
            (new Criteria())->orderBy(['order' => Criteria::ASC])
        );
    }

}
