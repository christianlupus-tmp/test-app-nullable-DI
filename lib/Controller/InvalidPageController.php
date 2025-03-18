<?php

declare(strict_types=1);

namespace OCA\TestNullableDi\Controller;

use OCP\AppFramework\Controller;
use OCA\TestNullableDi\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCA\TestNullableDi\Service\InvalidService;
use OCP\AppFramework\Http\Attribute\OpenAPI;
use OCP\AppFramework\Http\Attribute\FrontpageRoute;
use OCP\AppFramework\Http\Attribute\NoCSRFRequired;
use OCP\AppFramework\Http\Attribute\NoAdminRequired;
use OCP\AppFramework\Http\Attribute\PublicPage;

/**
 * @psalm-suppress UnusedClass
 */
class InvalidPageController extends Controller {
	
	public function __construct(
		private InvalidService $invalidService
	)
	{}
	
	#[NoCSRFRequired]
	#[NoAdminRequired]
	#[OpenAPI(OpenAPI::SCOPE_IGNORE)]
	#[PublicPage]
	#[FrontpageRoute(verb: 'GET', url: '/invalid')]
	public function indexInvalid(): TemplateResponse {
		return new TemplateResponse(
			Application::APP_ID,
			'index',
		);
	}
}
