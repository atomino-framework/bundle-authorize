<?php namespace Atomino\Molecules\Middleware\Auth;

use Atomino\Molecules\Module\Authenticator\ApiAuthenticator;
use Atomino\Molecules\Module\Authenticator\Authenticator;
use Atomino\RequestPipeline\Pipeline\Handler;
use Atomino\Responder\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck extends Handler {

	public static function setup(string $role){ parent::args(get_defined_vars()); }

	public function __construct(private Authenticator $authenticator){ }

	public function handle(Request $request): Response|null {
		/** @var \Atomino\Molecules\Module\Authorizable\AuthorizableInterface $user */
		$user = $this->authenticator->get();
		if($user?->hasRole($this->arguments->get('role'))) return $this->next($response);
		return new Response(null,Response::HTTP_FORBIDDEN);
	}

}