<?php

/*
 * ---DATABASE CREATE STATEMENTS---
 *
 * CREATE TABLE `member` (
 * `member_id` int(11) NOT NULL,
 * `fname` varchar(256) NOT NULL,
 * `lname` varchar(256) NOT NULL,
 * `age` int(11) NOT NULL,
 * `gender` char(1) DEFAULT NULL,
 * `phone` int(11) NOT NULL,
 * `email` varchar(255) NOT NULL,
 * `state` varchar(256) DEFAULT NULL,
 * `seeking` char(2) NOT NULL,
 * `bio` varchar(512) DEFAULT NULL,
 * `premium` tinyint(1) NOT NULL,
 * `image` varchar(512) DEFAULT NULL
 * );
 *
 * CREATE TABLE `interests` (
 * `interest_id` int(11) NOT NULL,
 * `interest` varchar(32) NOT NULL,
 * `type` varchar(7) NOT NULL
 * );
 *
 * CREATE TABLE member_interests(
 *      'member_id' int(11) REFERENCES member(member_id) NOT NULL,
 *      'interests_id' int(11) REFERENCES interests(interests_id) NOT NULL
 * );
 */

class Database
{

    const INDOOR = array('tv',
        'mov',
        'cook',
        'board',
        'puzz',
        'read',
        'card',
        'video');

    const OUTDOOR = array(
        'hike',
        'bike',
        'swim',
        'collect',
        'walk',
        'climb'
    );

    const INSERT_MEMBER =
        "
          INSERT INTO member(
          fname, lname, age, gender, phone, email, state, seeking, bio, premium, image)
          VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image);
         ";

    const GET_IDENTITY =
        "
          SELECT @@identity;
        ";

    const INSERT_INTERESTS =
        "
          INSERT INTO member_interests(member_id, interests_id)
          VALUES (:member_id, :interest_id);
        ";

    const GET_ALL_MEMBERS =
        "
          SELECT * 
          FROM member
          INNER JOIN member_interests ON member.member_id = member_interests.member_id
          INNER JOIN interests on interests.interest_id = member_interests.interests_id
          ORDER BY member.member_id;
         ";
    const GET_SPECIFIC_MEMBER =
        "
          SELECT *
          FROM member
          WHERE member_id = :id;
        ";
    const GET_INTERESTS_FOR_MEMBER =
        "
            SELECT interests.interest
            FROM interests
            INNER JOIN member_interests on member_interests.member_id = interests.interest_id
            WHERE :id = member_id;
        ";

    private $_newMember;
    private $_newInterests;
    private $_getIdentity;
    private $_getMembers;
    private $_getMember;
    private $_getInterests;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connect();
    }


    public function connect(){
        require_once('/home/aharring/db-connect.php');

        // Make the connection
        try {
            $dbc = new PDO(DSN, DB_USER, DB_PASSWORD);
        }catch (PDOException $ex){
            echo "FATAL FLAW FOUND<br>$ex<br><br><br><br>";
            return;
        }

        $this->_newMember = $dbc->prepare(self::INSERT_MEMBER);
        $this->_newInterests = $dbc->prepare(self::INSERT_INTERESTS);
        $this->_getIdentity = $dbc->prepare(self::GET_IDENTITY);
        $this->_getMembers = $dbc->prepare(self::GET_ALL_MEMBERS);
        $this->_getMember = $dbc->prepare(self::GET_SPECIFIC_MEMBER);
        $this->_getInterests = $dbc->prepare(self::GET_INTERESTS_FOR_MEMBER);
    }

    public function insertMember($member){
        $fname = $member->getFname();
        $lname = $member->getLname();
        $age = $member->getAge();
        $gender = $member->getGender();
        $phone = $member->getPhone();
        $email = $member->getEmail();
        $state = $member->getState();
        $seeking = $member->getSeeking();
        $bio = $member->getBio();
        $premium = 0;
        if($member instanceof PremiumMember){
            $premium = 1;
        }
        $image = '';
        $this->_newMember->bindParam(':fname', $fname, PDO::PARAM_STR);
        $this->_newMember->bindParam(':lname', $lname, PDO::PARAM_STR);
        $this->_newMember->bindParam(':age', $age, PDO::PARAM_INT);
        $this->_newMember->bindParam(':gender', $gender, PDO::PARAM_STR);
        $this->_newMember->bindParam(':phone', $phone, PDO::PARAM_INT);
        $this->_newMember->bindParam(':email', $email, PDO::PARAM_STR);
        $this->_newMember->bindParam(':state', $state, PDO::PARAM_STR);
        $this->_newMember->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $this->_newMember->bindParam(':bio', $bio, PDO::PARAM_STR);
        $this->_newMember->bindParam(':premium', $premium, PDO::PARAM_BOOL);
        $this->_newMember->bindParam(':image', $image, PDO::PARAM_STR);
        $this->_newMember->execute();

        if($premium == 1){
            $this->_getIdentity->execute();
            $id = $this->_getIdentity->fetch(PDO::FETCH_ASSOC);
            print_r($id);
            $id = $id['@@identity'];
            echo $id;
            $this->insertInterests($member, $id);
        }
    }

    private function insertInterests($member, $id){

        $outdoor = $member->getOutDoorInterests();
        $indoor = $member->getInDoorInterests();

        $this->_newInterests->bindParam(':member_id', $id);

        foreach ($indoor as $key => $value){
            $found = array_search($value, self::INDOOR) + 1;
            echo $value . ' - ' . $found;
            $this->_newInterests->bindParam(':interest_id', $found);
            $this->_newInterests->execute();
        }

        //+9
        foreach ($outdoor as $key => $value){
            $found = array_search($value, self::OUTDOOR) + 9;
            echo $value . ' - ' . $found;
            $this->_newInterests->bindParam(':interest_id', $found);
            $this->_newInterests->execute();
        }

    }

    public function getMembers(){
        return $this->_getMembers->execute();
    }

    public function getMember($memberID){
        $this->_getMember->execute($memberID);
    }

    public function getInterests($memberID){
        $this->_getInterests->execute($memberID);
    }
}