<?php

declare(strict_types=1);

namespace Yard\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;
use Spatie\Csp\Scheme;
use Spatie\Csp\Value;

class Basic extends Policy
{
	public function configure()
	{
		$this
			->addDirective(Directive::BASE, Keyword::SELF)
			->addDirective(Directive::CONNECT, Keyword::SELF)
			->addDirective(Directive::DEFAULT, Keyword::SELF)
			->addDirective(Directive::FONT, Keyword::SELF)
			->addDirective(Directive::FORM_ACTION, Keyword::SELF)
			->addDirective(Directive::IMG, Keyword::SELF)
			->addDirective(Directive::MEDIA, Keyword::SELF)
			->addDirective(Directive::OBJECT, Keyword::SELF)
			->addDirective(Directive::SCRIPT, Keyword::SELF)
			->addDirective(Directive::STYLE, Keyword::SELF)

			// Prevent clickjacking by not allowing page to be embedded
			->addDirective(Directive::FRAME_ANCESTORS, Keyword::SELF)

			// GravityForms AJAX requires iframes of itself
			->addDirective(Directive::FRAME, Keyword::SELF)

			// Allow iframes for recaptcha
			->addDirective(Directive::FRAME, ['https://www.google.com/recaptcha/', 'https://recaptcha.google.com/recaptcha/',])

			// Allow embedded base64 encoded images and fonts
			->addDirective(Directive::FONT, Scheme::DATA)
			->addDirective(Directive::IMG, Scheme::DATA)
			->addDirective(Directive::UPGRADE_INSECURE_REQUESTS, Value::NO_VALUE)

			// There's no filter for inline styles in WordPress
			->addDirective(Directive::STYLE, Keyword::UNSAFE_INLINE)

			// Video embeds
			->addDirective(
				Directive::FRAME,
				[
					'https://player.vimeo.com',
					'https://www.youtube.com',
					'https://www.youtube-nocookie.com',
				]
			)
			->addDirective(
				Directive::IMG,
				[
					'https://img.youtube.com',
					'https://i.ytimg.com',
					'https://i.vimeocdn.com',
				]
			)

			// Gravatar
			->addDirective(Directive::IMG, 'https://secure.gravatar.com')

			// Google Analytics 4
			->addDirective(
				Directive::IMG,
				[
					'https://*.google-analytics.com',
					'https://*.googletagmanager.com',
				]
			)
			->addDirective(
				Directive::CONNECT,
				[
					'https://*.google-analytics.com',
					'https://*.analytics.google.com',
					'https://*.googletagmanager.com',
				]
			)

			// Clarity
			->addDirective(Directive::CONNECT, 'https://*.clarity.ms')

			// Monsido
			->addDirective(Directive::IMG, 'https://tracking.monsido.com')
			->addDirective(
				Directive::CONNECT,
				[
					'https://heatmaps.monsido.com',
					'https://pagecorrect.monsido.com',
				]
			)

			// Font Awesome
			->addDirective(
				Directive::CONNECT,
				[
					'https://ka-p.fontawesome.com',
					'https://kit.fontawesome.com',
				]
			)
			->addDirective(
				Directive::STYLE,
				[
					'https://ka-p.fontawesome.com',
					'https://kit.fontawesome.com',
				]
			)
			->addDirective(Directive::FONT, 'https://ka-p.fontawesome.com')

			// Google Fonts
			->addDirective(Directive::FONT, 'https://fonts.gstatic.com')
			->addDirective(Directive::STYLE, 'https://fonts.googleapis.com')
			->addDirective(Directive::CONNECT, 'https://fonts.googleapis.com')

			// Adobe Fonts
			->addDirective(Directive::FONT, 'https://use.typekit.net')
			->addDirective(Directive::STYLE, 'https://*.typekit.net')

			// ElasticSearch
			->addDirective(Directive::CONNECT, env('WP_ENV') == 'production' ? 'https://es.elk01.yard.nl/' : 'https://es.test01.yard.nl')

			// Google Translate
			->addDirective(Directive::CONNECT, [
				'https://translate.googleapis.com',
				'https://translate-pa.googleapis.com',
			])
			->addDirective(Directive::SCRIPT, [
				'https://translate.googleapis.com',
				'https://www.google.com',
			])
			->addDirective(Directive::STYLE, 'https://www.gstatic.com')
			->addDirective(Directive::IMG, [
				'https://www.gstatic.com',
				'https://www.google.com',
				'https://fonts.gstatic.com',
				'https://translate.googleapis.com',
				'https://translate.google.com',
			])
			->addDirective(Directive::FRAME, 'https://translate.googleapis.com')

			// Google Maps
			->addDirective(Directive::CONNECT, 'https://maps.googleapis.com')
			->addDirective(Directive::IMG, [
				'https://maps.googleapis.com',
				'https://maps.gstatic.com',
			])

			// Siteimprove
			->addDirective(Directive::CONNECT, ['https://contentassistant.eu.siteimprove.com', 'https://id.eu.siteimprove.com'])
			->addDirective(Directive::IMG, 'https://*.global.siteimproveanalytics.io')

			// Used by PDC Leges & Verordeningen
			->addDirective(Directive::STYLE, 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css')

			// ReadSpeaker
			->addDirective(Directive::CONNECT, ['https://cdn-eu.readspeaker.com', 'https://app-eu.readspeaker.com', 'https://vttts-eu.readspeaker.com'])
			->addDirective(Directive::STYLE, ['https://cdn-eu.readspeaker.com', 'https://app-eu.readspeaker.com'])
			->addDirective(Directive::FORM_ACTION, ['https://app-eu.readspeaker.com'])
			->addDirective(Directive::FRAME, ['https://app-eu.readspeaker.com'])

			// A11y Toolbar: Open Dyslexic font
			->addDirective(
				Directive::STYLE,
				[
					'https://cdn.jsdelivr.net/gh/antijingoist/open-dyslexic@master/woff/OpenDyslexic-Regular.woff',
					'https://cdn.jsdelivr.net/gh/antijingoist/open-dyslexic@master/woff/OpenDyslexic-Bold.woff',
				]
			)
			->addDirective(
				Directive::FONT,
				[
					'https://cdn.jsdelivr.net/gh/antijingoist/open-dyslexic@master/woff/OpenDyslexic-Regular.woff',
					'https://cdn.jsdelivr.net/gh/antijingoist/open-dyslexic@master/woff/OpenDyslexic-Bold.woff',
				]
			)

			// Used by Filebird
			->addDirective(Directive::CONNECT, ['https://preview.ninjateam.org']);

		// Admin side requires unsafe-inline which doesn't work together with nonces or strict-dynamic
		if (is_admin()) {
			$this->addDirective(Directive::SCRIPT, Keyword::UNSAFE_INLINE);
		} else {
			// Propagate trust for scripts with a nonce
			// TODO: re-activate code when FacetWP registers scripts by WP practices
			// $this->addNonceForDirective(Directive::SCRIPT);
			$this->addDirective(
				Directive::SCRIPT,
				[
					// Keyword::STRICT_DYNAMIC,
					Keyword::UNSAFE_INLINE,
					'https:',
				]
			);
		}
	}
}
