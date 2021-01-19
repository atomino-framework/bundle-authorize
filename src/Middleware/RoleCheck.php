<?php namespace Atomino\Molecules\Middleware\Auth;

use Atomino\Molecules\Module\Authenticator\ApiAuthenticator;
use Atomino\Molecules\Module\Authenticator\Authenticator;
use Atomino\Responder\Middleware;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck extends Middleware{

	public static function setup(string $role, string|null $redirect = null){ parent::args(get_defined_vars()); }

	public function __construct(private Authenticator $authenticator){ }

	protected function respond(Response $response): Response{
		/** @var \Atomino\Molecules\Module\Authorizable\AuthorizableInterface $user */
		$user = $this->authenticator->get();
		if($user?->hasRole($this->getArgsBag('role'))) return $this->next($response);
		$response->setStatusCode(Response::HTTP_FORBIDDEN);
		if(!is_null($redirect = $this->getArgsBag('redirect'))) $this->redirect($response, $redirect);
		return $response;
	}
	
}