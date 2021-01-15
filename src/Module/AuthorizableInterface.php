<?php namespace Application\Modules\Authorize\Module;

interface AuthorizableInterface{
	public function hasRole(string $role):bool;
}