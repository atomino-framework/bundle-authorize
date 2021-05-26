<?php namespace Atomino\Carbon\Plugins\Authorize;

use Atomino\Bundle\Authorize\AuthorizableInterface;
use Atomino\Carbon\Generator\CodeWriter;
use Atomino\Carbon\Plugin\Plugin;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Authorizable extends Plugin {

	public function __construct(public $field, private array $roles) { }

	public function generate(\ReflectionClass $ENTITY, CodeWriter $codeWriter) {
		$codeWriter->addInterface(AuthorizableInterface::class);
		foreach ($this->roles as $role) {
			$codeWriter->addCode('const ROLE_' . strtoupper($role) . ' = "' . $role . '";');
		}
	}
	public function getTrait(): string|null { return AuthorizableTrait::class; }
}