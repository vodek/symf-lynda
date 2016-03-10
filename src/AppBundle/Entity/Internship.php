<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Internship
 *
 * @ORM\Table(name="internship")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InternshipRepository")
 */
class Internship
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
     * @ORM\Column(name="job_title", type="string", length=255)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="skills_required", type="string", length=400, nullable=true)
     */
    private $skillsRequired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;
//Relationships goes here:

//..
    /**
     * @ORM\ManyToOne(targetEntity="Employer")
     * @ORM\JoinColumn(name="employer_id", referencedColumnName="id")
     */
    private $employer;
    //..

    /**
     * @ORM\ManyToMany(targetEntity="Student")
     * @ORM\JoinTable(name="students_internships",
     *     joinColumns={@ORM\JoinColumn(name="internship_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="student_id", referencedColumnName="id" )}
     *  )
     */
    private $students;


    /**
     * Internship constructor.
     */
    public function __construct()
    {
        $this->students = new\Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set jobTitle
     *
     * @param string $jobTitle
     * @return Internship
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string 
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Internship
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set skillsRequired
     *
     * @param string $skillsRequired
     * @return Internship
     */
    public function setSkillsRequired($skillsRequired)
    {
        $this->skillsRequired = $skillsRequired;

        return $this;
    }

    /**
     * Get skillsRequired
     *
     * @return string 
     */
    public function getSkillsRequired()
    {
        return $this->skillsRequired;
    }

    /**
     * Set employerId
     *
     * @param integer $employerId
     * @return Internship
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Internship
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Internship
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set employer
     *
     * @param \AppBundle\Entity\Employer $employer
     * @return Internship
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
     * Add students
     *
     * @param \AppBundle\Entity\Student $students
     * @return Internship
     */
    public function addStudent(\AppBundle\Entity\Student $students)
    {
        $this->students[] = $students;

        return $this;
    }

    /**
     * Remove students
     *
     * @param \AppBundle\Entity\Student $students
     */
    public function removeStudent(\AppBundle\Entity\Student $students)
    {
        $this->students->removeElement($students);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }
}
