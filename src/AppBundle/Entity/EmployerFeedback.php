<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployerFeedback
 *
 * @ORM\Table(name="employer_feedback")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployerFeedbackRepository")
 */
class EmployerFeedback
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
     * @ORM\Column(name="feedback", type="string", length=400)
     */
    private $feedback;

    /**
     * @var int
     *
     * @ORM\Column(name="internship_id", type="integer")
     */
    private $internshipId;

    /**
     * @var int
     *
     * @ORM\Column(name="employer_id", type="integer")
     */
    private $employerId;




    /**
     * @ORM\ManyToOne(targetEntity="Employer")
     * @ORM\JoinColumn(name="employer_id", referencedColumnName="id")
     */

    private $employer;


    /**
     * @ORM\OneToOne(targetEntity="Internship")
     * @ORM\JoinColumn(name="internship_id", referencedColumnName="id")
     */

     private $internship;


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
     * Set feedback
     *
     * @param string $feedback
     * @return EmployerFeedback
     */
    public function setFeedback($feedback)
    {
        $this->feedback = $feedback;

        return $this;
    }

    /**
     * Get feedback
     *
     * @return string 
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * Set internshipId
     *
     * @param integer $internshipId
     * @return EmployerFeedback
     */
    public function setInternshipId($internshipId)
    {
        $this->internshipId = $internshipId;

        return $this;
    }

    /**
     * Get internshipId
     *
     * @return integer 
     */
    public function getInternshipId()
    {
        return $this->internshipId;
    }

    /**
     * Set employerId
     *
     * @param integer $employerId
     * @return EmployerFeedback
     */
    public function setEmployerId($employerId)
    {
        $this->employerId = $employerId;

        return $this;
    }

    /**
     * Get employerId
     *
     * @return integer 
     */
    public function getEmployerId()
    {
        return $this->employerId;
    }

    /**
     * Set employer
     *
     * @param \AppBundle\Entity\Employer $employer
     * @return EmployerFeedback
     */
    public function setEmployer(\AppBundle\Entity\Employer $employer = null)
    {
        $this->employer = $employer;

        return $this;
    }

    /**
     * Get employer
     *
     * @return \AppBundle\Entity\Employer 
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Set internship
     *
     * @param \AppBundle\Entity\Internship $internship
     * @return EmployerFeedback
     */
    public function setInternship(\AppBundle\Entity\Internship $internship = null)
    {
        $this->internship = $internship;

        return $this;
    }

    /**
     * Get internship
     *
     * @return \AppBundle\Entity\Internship 
     */
    public function getInternship()
    {
        return $this->internship;
    }
}
