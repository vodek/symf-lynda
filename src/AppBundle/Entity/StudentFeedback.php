<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentFeedback
 *
 * @ORM\Table(name="student_feedback")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentFeedbackRepository")
 */
class StudentFeedback
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
     * @var int
     *
     * @ORM\Column(name="student_id", type="integer")
     */
    private $studentId;

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
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;

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
     * Set studentId
     *
     * @param integer $studentId
     * @return StudentFeedback
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
     * Set feedback
     *
     * @param string $feedback
     * @return StudentFeedback
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
     * @return StudentFeedback
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
}
