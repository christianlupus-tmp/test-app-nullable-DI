<?php

declare(strict_types=1);

namespace OCA\TestNullableDi\Controller;

use OCP\AppFramework\Controller;
use OCA\TestNullableDi\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCA\TestNullableDi\Service\ValidService;
use OCP\AppFramework\Http\Attribute\OpenAPI;
use OCP\AppFramework\Http\Attribute\PublicPage;
use OCP\AppFramework\Http\Attribute\FrontpageRoute;
use OCP\AppFramework\Http\Attribute\NoCSRFRequired;
use OCP\AppFramework\Http\Attribute\NoAdminRequired;

/**
 * @psalm-suppress UnusedClass
 */
class PageController extends Controller {
	
	public function __construct(
		private ValidService $validService
	)
	{}
	
	#[NoCSRFRequired]
	#[NoAdminRequired]
	#[OpenAPI(OpenAPI::SCOPE_IGNORE)]
	#[PublicPage]
	#[FrontpageRoute(verb: 'GET', url: '/')]
	public function index(): TemplateResponse {
		return new TemplateResponse(
			Application::APP_ID,
			'index',
		);
	}
}
