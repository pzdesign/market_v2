<?php

use Nette\Security,
	Nette\Utils\Strings;


/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator
{
	private $amr;
	private $ur;

	public function __construct(Market\AuthmeRepository $amr, \Market\UserRepository $ur)
	{
		$this->amr = $amr;
		$this->ur = $ur;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password, $hash) = $credentials;
		
		$row = $this->amr->findByName($username);
		
		if(!$row){
		    throw new Security\AuthenticationException("Nesprávné uživatelské jméno.", self::IDENTITY_NOT_FOUND);
		}
		
		
		$truepass = $row['password'];
        switch($hash){
            case 'MD5':
                $encryptpass = hash("MD5", $password);
                break;
            case 'SHA1':
                $encryptpass = hash("SHA1", $password);
                break;
            case 'SHA256':
                $salt = explode('$', $truepass);
                $encryptpass = '$SHA$'. $salt[2] .'$'. hash("sha256", hash("sha256", $password).$salt[2]);
                break;
        }

		if($encryptpass !== $truepass){
		    throw new Security\AuthenticationException("Nesprávné heslo.", self::INVALID_CREDENTIAL);
		}
		
		//unset($row['password']);
		return new Security\Identity($row['id'], $this->ur->isAdmin($username) ? "admin" : "member", array('username' => $row['username'],
			'lastip' => $row['ip'],
			'lastlogin' => $row['lastlogin'],
			'x' => $row['x'],
			'y' => $row['y'],
			'z' => $row['z'],
			'world' => $row['world']));
	}
}
