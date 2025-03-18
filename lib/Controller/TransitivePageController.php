<?php

declare(strict_types=1);

namespace OCA\TestNullableDi\Controller;

use OCP\AppFramework\Controller;
use OCA\TestNullableDi\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCA\TestNullableDi\Service\ValidService;
use OCP\AppFramework\Http\Attribute\OpenAPI;
use OCP\AppFramework\Http\Attribute\PublicPage;
use OCA\TestNullableDi\Service\TransitiveService;
use OCP\AppFramework\Http\Attribute\FrontpageRoute;
use OCP\AppFramework\Http\Attribute\NoCSRFRequired;
use OCP\AppFramework\Http\Attribute\NoAdminRequired;
use OCP\AppFramework\Http\Template\PublicTemplateResponse;

/**
 * @psalm-suppress UnusedClass
 */
class TransitivePageController extends Controller {
	
	public function __construct(
		private ?string $userId,
		private ?TransitiveService $transitiveService
	)
	{}
	
	#[NoCSRFRequired]
	#[NoAdminRequired]
	#[OpenAPI(OpenAPI::SCOPE_IGNORE)]
	#[FrontpageRoute(verb: 'GET', url: '/transitive')]
	public function index(): TemplateResponse {
		return new TemplateResponse(
			Application::APP_ID,
			'index',
		);
	}

	#[NoCSRFRequired]
	#[NoAdminRequired]
	#[OpenAPI(OpenAPI::SCOPE_IGNORE)]
	#[PublicPage]
	#[FrontpageRoute(verb: 'GET', url: '/transitive-pub')]
	public function indexPub(): TemplateResponse {
		return new PublicTemplateResponse(
			Application::APP_ID,
			'index',
		);
	}
}
