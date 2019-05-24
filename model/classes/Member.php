<?php

/**
 * Class Member
 *
 * Simple class representing a standard member on my dating site
 *
 * This class is the parent of the PremiumMember class (found in this directory).
 * It contains user data and the necessary accessors and modifiers for interacting with this data
 *
 * @author Andrew Harrington
 * @version 1.0
 */
class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    /**
     * Member constructor.
     * @param $_fname
     * @param $_lname
     * @param $_age
     * @param $_gender
     * @param $_phone
     */
    public function __construct($_fname, $_lname, $_age, $_gender, $_phone)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_age = $_age;
        $this->_gender = $_gender;
        $this->_phone = $_phone;
    }

    /**
     * fname getter
     *
     * @return mixed - The first name of the user
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * fname setter
     *
     * @param mixed $_fname - The new first name to be set
     */
    public function setFname($_fname)
    {
        $this->_fname = $_fname;
    }

    /**
     * lname getter
     *
     * @return mixed - The current last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * lname setter
     *
     * @param mixed $_lname - The new last name
     */
    public function setLname($_lname)
    {
        $this->_lname = $_lname;
    }

    /**
     * age getter
     *
     * @return mixed - The current age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * age setter
     *
     * @param mixed $_age - The new age
     */
    public function setAge($_age)
    {
        $this->_age = $_age;
    }

    /**
     * gender getter
     *
     * @return mixed - The current gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * gender setter
     *
     * @param mixed $_gender - The new gender
     */
    public function setGender($_gender)
    {
        $this->_gender = $_gender;
    }

    /**
     * phone number getter
     *
     * @return mixed - The current phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * phone number setter
     *
     * @param mixed $_phone - The new phone number
     */
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;
    }

    /**
     * email getter
     *
     * @return mixed - The current value of email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * email setter
     *
     * @param mixed $_email - The new value of email
     */
    public function setEmail($_email)
    {
        $this->_email = $_email;
    }

    /**
     * state getter
     *
     * @return mixed - Gets the current value of state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * state setter
     *
     * @param mixed $_state - The new value to state
     */
    public function setState($_state)
    {
        $this->_state = $_state;
    }

    /**
     * seeking getter
     *
     * @return mixed - The current value of seeking
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * seeking setter
     *
     * @param mixed $_seeking - The new seeking to be set
     */
    public function setSeeking($_seeking)
    {
        $this->_seeking = $_seeking;
    }

    /**
     * bio getter
     *
     * @return mixed - The current bio being stored
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * bio setter
     *
     * @param mixed $_bio - The new bio to be set
     */
    public function setBio($_bio)
    {
        $this->_bio = $_bio;
    }
}