<?php
// src/AppBundle/Entity/scanned.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="scanned")
 */
class Scanned
{
    /**
     * @ORM\Column(type="string", length=16)
     * @ORM\Id
     */
    protected $ean;
    /**
     * @ORM\Column(type="integer")
     */
    protected $repeats;

    /**
     * Set ean
     *
     * @param integer $ean
     *
     * @return Scanned
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set repeats
     *
     * @param integer $repeats
     *
     * @return Scanned
     */
    public function setRepeats($repeats)
    {
        $this->repeats = $repeats;

        return $this;
    }

    /**
     * Get repeats
     *
     * @return integer
     */
    public function getRepeats()
    {
        return $this->repeats;
    }
}
