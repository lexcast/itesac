<?php

namespace ItesAC\BackendBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Modelo
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(fields="nombre", message="Ya existe ese modelo")
 * @Vich\Uploadable
 */
class Modelo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotNull(
     *      message="Escriba el nombre del modelo"
     * )
     * @Assert\NotBlank(
     *      message="Escriba el nombre del modelo"
     * )
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var File
     *
     * @Assert\NotNull(
     *      message="Una imagen es requerida"
     * )
     * @Assert\Image(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/jpg"},
     *     maxSizeMessage="El limite de carga es de 1M",
     *     mimeTypesMessage="Debe ser una imagen png, jpeg o jpg"
     * )
     * @Vich\UploadableField(mapping="modelos_image", fileNameProperty="imageName")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, name="image_name")
     */
    private $imageName;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param  string $nombre
     * @return Modelo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set imageName
     *
     * @param  string $imageName
     * @return Modelo
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImage(File $image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImage()
    {
        return $this->image;
    }
}
