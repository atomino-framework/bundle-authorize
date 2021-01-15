<?php namespace Atomino\Molecules\EntityPlugin\Authorizable;

/**
 * @method static \Atomino\Entity\Model model();
 */
trait AuthorizableTrait{

	public function hasRole(string|null $role): bool{
		if($role === null) return true;
		$plugin = Authorizable::fetch(static::model());
		foreach (is_array($this->{$plugin->field}) ? $this->{$plugin->field} : [$this->{$plugin->field}] as $group){
			if (array_key_exists($group, static::GROUPS) && is_array(static::GROUPS[$group]) && in_array($role, static::GROUPS[$group])) return true;
		}
		return false;
	}

}