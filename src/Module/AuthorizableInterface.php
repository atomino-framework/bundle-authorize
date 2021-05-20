<?php namespace Atomino\Molecules\Module\Authorizable;

use Atomino\Molecules\Module\Authenticator\AuthenticableInterface;

interface AuthorizableInterface extends AuthenticableInterface {
	public function hasRole(string $role):bool;
}