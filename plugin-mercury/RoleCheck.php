<?php namespace Atomino\Mercury\Plugins\Authorize;

use Atomino\Bundle\Authenticate\Authenticator;
use Atomino\Mercury\Pipeline\Handler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck extends Handler {

	public static function setup(string $role) { parent::args(get_defined_vars()); }

	public function __construct(private Authenticator $authenticator) { }

	public function handle(Request $request): Response|null {
		/** @var \Atomino\Bundle\Authorize\AuthorizableInterface $user */
		$user = $this->authenticator->get();
		if ($user?->hasRole($this->arguments->get('role'))) return $this->next($response);
		return new Response(null, Response::HTTP_FORBIDDEN);
	}

}