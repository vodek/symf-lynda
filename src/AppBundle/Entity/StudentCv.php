<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentCv
 *
 * @ORM\Table(name="student_cv")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentCvRepository")
 */
class StudentCv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cv_link", type="string", length=255, nullable=true)
     */
    private $cvLink;

    /**
     * @var string
     *
     * @ORM\Column(name="cv_category", type="string", length=255, nullable=true)
     */
    private $cvCategory;

    /**
     * @var int
     *
     * @ORM\Column(name="student_id", type="integer")
     */
    private $studentId;

    /**
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;
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
     * Set cvLink
     *
     * @param string $cvLink
     * @return StudentCv
     */
    public function setCvLink($cvLink)
    {
        $this->cvLink = $cvLink;

        return $this;
    }

    /**
     * Get cvLink
     *
     * @return string 
     */
    public function getCvLink()
    {
        return $this->cvLink;
    }

    /**
     * Set cvCategory
     *
     * @param string $cvCategory
     * @return StudentCv
     */
    public function setCvCategory($cvCategory)
    {
        $this->cvCategory = $cvCategory;

        return $this;
    }

    /**
     * Get cvCategory
     *
     * @return string 
     */
    public function getCvCategory()
    {
        return $this->cvCategory;
    }

    /**
     * Set studentId
     *
     * @param integer $studentId
     * @return StudentCv
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get studentId
     *
     * @return integer 
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     * @return StudentCv
     */
    public function setStudent(\AppBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }
}
