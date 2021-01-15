<?php namespace Atomino\Molecules\Module\Authorizable;

interface AuthorizableInterface{
	public function hasRole(string $role):bool;
}