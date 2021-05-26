<?php namespace Atomino\Bundle\Authorize;

use Atomino\Bundle\Authenticate\AuthenticableInterface;

interface AuthorizableInterface extends AuthenticableInterface {
	public function hasRole(string $role): bool;
}