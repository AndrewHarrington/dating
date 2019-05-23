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
          SELECT member.member_id AS id, concat(member.fname, ' ', member.lname) AS name, member.age, 
            member.phone, member.email, member.state, member.gender, member.seeking, member.premium, 
            GROUP_CONCAT(interests.interest SEPARATOR ', ') as interests
          FROM member
          INNER JOIN member_interests ON member.member_id = member_interests.member_id
          INNER JOIN interests on interests.interest_id = member_interests.interests_id
          UNION
          SELECT member_id AS id, concat(fname, ' ', lname) AS name, age, phone, email, state, gender, seeking,
          	premium, '' AS interests
          FROM member
          WHERE premium = 0
          ORDER BY name ASC
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
        $premium = 0;
        if($member instanceof PremiumMember){
            $premium = 1;
        }
        $image = '';
        $this->_newMember->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':age', $member->getAge(), PDO::PARAM_INT);
        $this->_newMember->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':phone', $member->getPhone(), PDO::PARAM_INT);
        $this->_newMember->bindParam(':email', $member->getEmail(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':state', $member->getState(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':bio', $member->getBio(), PDO::PARAM_STR);
        $this->_newMember->bindParam(':premium', $premium, PDO::PARAM_BOOL);
        $this->_newMember->bindParam(':image', $image, PDO::PARAM_STR);
        $this->_newMember->execute();

        if($premium == 1){
            $this->_getIdentity->execute();
            $id = $this->_getIdentity->fetch(PDO::FETCH_ASSOC);
            $id = $id['@@identity'];
            $this->insertInterests($member, $id);
        }
    }

    private function insertInterests($member, $id){

        $outdoor = $member->getOutDoorInterests();
        $indoor = $member->getInDoorInterests();

        $this->_newInterests->bindParam(':member_id', $id);

        foreach ($indoor as $key => $value){
            $found = array_search($value, self::INDOOR) + 1;
            $this->_newInterests->bindParam(':interest_id', $found);
            $this->_newInterests->execute();
        }

        //+9
        foreach ($outdoor as $key => $value){
            $found = array_search($value, self::OUTDOOR) + 9;
            $this->_newInterests->bindParam(':interest_id', $found);
            $this->_newInterests->execute();
        }

    }

    public function getMembers(){
        $this->_getMembers->execute();
        return $this->_getMembers->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMember($memberID){
        $this->_getMember->execute($memberID);
    }

    public function getInterests($memberID){
        $this->_getInterests->execute($memberID);
    }
}