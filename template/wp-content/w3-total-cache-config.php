<?php

return array(
	'dbcache.enabled' => false,
	'dbcache.debug' => false,
	'dbcache.engine' => 'file',
	'dbcache.file.gc' => 3600,
	'dbcache.file.locking' => false,
	'dbcache.memcached.servers' => array(
		0 => '127.0.0.1:11211',
	),
	'dbcache.memcached.persistant' => true,
	'dbcache.reject.logged' => true,
	'dbcache.reject.uri' => array(
	),
	'dbcache.reject.cookie' => array(
	),
	'dbcache.reject.sql' => array(
		0 => 'gdsr_',
		1 => 'wp_rg_',
	),
	'dbcache.lifetime' => 3600,
	'objectcache.enabled' => false,
	'objectcache.debug' => false,
	'objectcache.engine' => 'file',
	'objectcache.file.gc' => 3600,
	'objectcache.file.locking' => false,
	'objectcache.memcached.servers' => array(
		0 => '127.0.0.1:11211',
	),
	'objectcache.memcached.persistant' => true,
	'objectcache.reject.admin' => true,
	'objectcache.reject.uri' => array(
	),
	'objectcache.groups.global' => array(
		0 => 'users',
		1 => 'userlogins',
		2 => 'usermeta',
		3 => 'user_meta',
		4 => 'site-transient',
		5 => 'site-options',
		6 => 'site-lookup',
		7 => 'blog-lookup',
		8 => 'blog-details',
		9 => 'rss',
		10 => 'global-posts',
	),
	'objectcache.groups.nonpersistent' => array(
		0 => 'comment',
		1 => 'counts',
		2 => 'plugins',
	),
	'objectcache.lifetime' => 3600,
	'pgcache.enabled' => true,
	'pgcache.debug' => false,
	'pgcache.engine' => 'file',
	'pgcache.file.gc' => 3600,
	'pgcache.file.locking' => false,
	'pgcache.memcached.servers' => array(
		0 => '127.0.0.1:11211',
	),
	'pgcache.memcached.persistant' => true,
	'pgcache.cache.query' => true,
	'pgcache.cache.home' => true,
	'pgcache.cache.feed' => true,
	'pgcache.cache.404' => false,
	'pgcache.cache.flush' => false,
	'pgcache.cache.headers' => array(
		0 => 'Last-Modified',
		1 => 'Content-Type',
		2 => 'X-Pingback',
		3 => 'P3P',
	),
	'pgcache.accept.uri' => array(
		0 => 'sitemap\\.xml(\\.gz)?',
	),
	'pgcache.accept.files' => array(
		0 => 'wp-comments-popup.php',
		1 => 'wp-links-opml.php',
		2 => 'wp-locations.php',
	),
	'pgcache.reject.logged' => true,
	'pgcache.reject.uri' => array(
		0 => 'wp-.*\\.php',
		1 => 'index\\.php',
	),
	'pgcache.reject.ua' => array(
	),
	'pgcache.reject.cookie' => array(
	),
	'pgcache.purge.home' => true,
	'pgcache.purge.post' => true,
	'pgcache.purge.comments' => false,
	'pgcache.purge.author' => false,
	'pgcache.purge.terms' => false,
	'pgcache.purge.archive.daily' => false,
	'pgcache.purge.archive.monthly' => false,
	'pgcache.purge.archive.yearly' => false,
	'pgcache.purge.feed.blog' => true,
	'pgcache.purge.feed.comments' => false,
	'pgcache.purge.feed.author' => false,
	'pgcache.purge.feed.terms' => false,
	'pgcache.purge.feed.types' => array(
		0 => 'rss2',
	),
	'pgcache.prime.enabled' => false,
	'pgcache.prime.interval' => 900,
	'pgcache.prime.limit' => 10,
	'pgcache.prime.sitemap' => 'https://backstagedv.safeway.com/strategicsourcing/sitemap.xml',
	'minify.enabled' => true,
	'minify.auto' => false,
	'minify.debug' => false,
	'minify.engine' => 'file',
	'minify.file.gc' => 86400,
	'minify.file.locking' => false,
	'minify.memcached.servers' => array(
		0 => '127.0.0.1:11211',
	),
	'minify.memcached.persistant' => true,
	'minify.rewrite' => false,
	'minify.options' => array(
	),
	'minify.symlinks' => array(
	),
	'minify.lifetime' => 86400,
	'minify.upload' => true,
	'minify.html.enable' => true,
	'minify.html.engine' => 'html',
	'minify.html.reject.feed' => false,
	'minify.html.inline.css' => false,
	'minify.html.inline.js' => false,
	'minify.html.strip.crlf' => false,
	'minify.html.comments.ignore' => array(
		0 => 'google_ad_',
		1 => 'RSPEAK_',
	),
	'minify.css.enable' => true,
	'minify.css.engine' => 'csstidy',
	'minify.css.combine' => false,
	'minify.css.strip.comments' => false,
	'minify.css.strip.crlf' => false,
	'minify.css.imports' => 'process',
	'minify.css.groups' => array(
		'ddcb5' => array(
			'default' => array(
				'include' => array(
					'files' => array(
						0 => 'strategicsourcing/wp-includes/js/thickbox/thickbox.css',
						1 => 'strategicsourcing/wp-content/themes/safewaytheme/tabz/css/demos.css',
						2 => 'strategicsourcing/wp-content/plugins/nextgen-gallery/css/nggallery.css',
						3 => 'strategicsourcing/wp-content/plugins/nextgen-gallery/shutter/shutter-reloaded.css',
						4 => 'strategicsourcing/wp-content/themes/safewaytheme/css/prettyPhoto.css',
						5 => 'strategicsourcing/wp-content/themes/safewaytheme/css/superfish.css',
					),
				),
			),
		),
	),
	'minify.js.enable' => true,
	'minify.js.engine' => 'js',
	'minify.js.combine.header' => false,
	'minify.js.combine.body' => false,
	'minify.js.combine.footer' => false,
	'minify.js.strip.comments' => false,
	'minify.js.strip.crlf' => false,
	'minify.js.groups' => array(
		'ddcb5' => array(
			'default' => array(
				'include' => array(
					'blocking' => true,
					'files' => array(
						0 => 'strategicsourcing/wp-includes/js/jquery/jquery.js',
						1 => 'strategicsourcing/wp-content/plugins/nextgen-gallery/js/jquery.cycle.all.min.js',
						2 => 'strategicsourcing/wp-content/plugins/nextgen-gallery/js/ngg.slideshow.min.js',
						3 => 'strategicsourcing/wp-content/plugins/nextgen-gallery/shutter/shutter-reloaded.js',
						4 => 'strategicsourcing/wp-includes/js/l10n.js',
						5 => 'strategicsourcing/wp-content/plugins/events-calendar/js/jquery.bgiframe.js',
						6 => 'strategicsourcing/wp-content/themes/safewaytheme/fancybox/jquery.mousewheel-3.0.4.pack.js',
						7 => 'strategicsourcing/wp-content/plugins/events-calendar/js/jquery.tooltip.min.js',
						8 => 'strategicsourcing/wp-content/themes/safewaytheme/js/tab.js',
						9 => 'strategicsourcing/wp-content/themes/safewaytheme/fancybox/jquery.fancybox-1.3.4.pack.js',
						10 => 'strategicsourcing/wp-content/themes/safewaytheme/js/jquery.nivo.slider.pack.js',
						11 => 'strategicsourcing/wp-content/themes/safewaytheme/js/nivostart.js',
						12 => 'strategicsourcing/wp-content/themes/safewaytheme/js/fadeslideshow.js',
						13 => 'strategicsourcing/wp-content/themes/safewaytheme/js/fadeslideshowstart.js',
						14 => 'strategicsourcing/wp-content/themes/safewaytheme/tabz/js/jquery.ui.core.js',
						15 => 'strategicsourcing/wp-content/themes/safewaytheme/tabz/js/jquery.ui.widget.js',
						16 => 'strategicsourcing/wp-content/themes/safewaytheme/tabz/js/jquery.ui.tabs.js',
						17 => 'strategicsourcing/wp-content/themes/safewaytheme/greeting/sfygreeting.js',
						18 => 'strategicsourcing/wp-content/themes/safewaytheme/strategicsourcing/strategicsourcing.js',
						19 => 'strategicsourcing/wp-content/themes/safewaytheme/js/jquery.cycle.all.js',
						20 => 'strategicsourcing/wp-content/themes/safewaytheme/js/jquery.prettyPhoto.js',
						21 => 'strategicsourcing/wp-content/themes/safewaytheme/js/superfish.js',
					),
				),
			),
		),
	),
	'minify.yuijs.path.java' => 'java',
	'minify.yuijs.path.jar' => 'yuicompressor.jar',
	'minify.yuijs.options.line-break' => 5000,
	'minify.yuijs.options.nomunge' => false,
	'minify.yuijs.options.preserve-semi' => false,
	'minify.yuijs.options.disable-optimizations' => false,
	'minify.yuicss.path.java' => 'java',
	'minify.yuicss.path.jar' => 'yuicompressor.jar',
	'minify.yuicss.options.line-break' => 5000,
	'minify.ccjs.path.java' => 'java',
	'minify.ccjs.path.jar' => 'compiler.jar',
	'minify.ccjs.options.compilation_level' => 'SIMPLE_OPTIMIZATIONS',
	'minify.ccjs.options.formatting' => '',
	'minify.csstidy.options.remove_bslash' => true,
	'minify.csstidy.options.compress_colors' => true,
	'minify.csstidy.options.compress_font-weight' => true,
	'minify.csstidy.options.lowercase_s' => false,
	'minify.csstidy.options.optimise_shorthands' => 1,
	'minify.csstidy.options.remove_last_;' => false,
	'minify.csstidy.options.case_properties' => 1,
	'minify.csstidy.options.sort_properties' => false,
	'minify.csstidy.options.sort_selectors' => false,
	'minify.csstidy.options.merge_selectors' => 2,
	'minify.csstidy.options.discard_invalid_properties' => false,
	'minify.csstidy.options.css_level' => 'CSS2.1',
	'minify.csstidy.options.preserve_css' => false,
	'minify.csstidy.options.timestamp' => false,
	'minify.csstidy.options.template' => 'default',
	'minify.htmltidy.options.clean' => false,
	'minify.htmltidy.options.hide-comments' => true,
	'minify.htmltidy.options.wrap' => 0,
	'minify.reject.logged' => false,
	'minify.reject.ua' => array(
	),
	'minify.reject.uri' => array(
	),
	'minify.error.notification' => '',
	'minify.error.notification.last' => 0,
	'cdn.enabled' => false,
	'cdn.debug' => false,
	'cdn.engine' => 'ftp',
	'cdn.uploads.enable' => true,
	'cdn.includes.enable' => true,
	'cdn.includes.files' => '*.css;*.js;*.gif;*.png;*.jpg',
	'cdn.theme.enable' => true,
	'cdn.theme.files' => '*.css;*.js;*.gif;*.png;*.jpg;*.ico;*.ttf;*.otf,*.woff',
	'cdn.minify.enable' => true,
	'cdn.custom.enable' => true,
	'cdn.custom.files' => array(
		0 => 'favicon.ico',
		1 => 'wp-content/gallery/*',
		2 => 'wp-content/uploads/avatars/*',
	),
	'cdn.import.external' => false,
	'cdn.import.files' => '*.jpg;*.png;*.gif;*.avi;*.wmv;*.mpg;*.wav;*.mp3;*.txt;*.rtf;*.doc;*.xls;*.rar;*.zip;*.tar;*.gz;*.exe',
	'cdn.queue.interval' => 900,
	'cdn.queue.limit' => 25,
	'cdn.force.rewrite' => false,
	'cdn.autoupload.enabled' => false,
	'cdn.autoupload.interval' => 3600,
	'cdn.mirror.domain' => array(
	),
	'cdn.mirror.ssl' => 'auto',
	'cdn.netdna.apiid' => '',
	'cdn.netdna.apikey' => '',
	'cdn.netdna.domain' => array(
	),
	'cdn.netdna.ssl' => 'auto',
	'cdn.cotendo.username' => '',
	'cdn.cotendo.password' => '',
	'cdn.cotendo.zones' => array(
	),
	'cdn.cotendo.domain' => array(
	),
	'cdn.cotendo.ssl' => 'auto',
	'cdn.ftp.host' => '',
	'cdn.ftp.port' => 21,
	'cdn.ftp.user' => '',
	'cdn.ftp.pass' => '',
	'cdn.ftp.path' => '',
	'cdn.ftp.pasv' => false,
	'cdn.ftp.domain' => array(
	),
	'cdn.ftp.ssl' => 'auto',
	'cdn.s3.key' => '',
	'cdn.s3.secret' => '',
	'cdn.s3.bucket' => '',
	'cdn.s3.cname' => array(
	),
	'cdn.s3.ssl' => 'auto',
	'cdn.cf.key' => '',
	'cdn.cf.secret' => '',
	'cdn.cf.bucket' => '',
	'cdn.cf.id' => '',
	'cdn.cf.cname' => array(
	),
	'cdn.cf.ssl' => 'auto',
	'cdn.cf2.key' => '',
	'cdn.cf2.secret' => '',
	'cdn.cf2.id' => '',
	'cdn.cf2.cname' => array(
	),
	'cdn.cf2.ssl' => 'auto',
	'cdn.rscf.user' => '',
	'cdn.rscf.key' => '',
	'cdn.rscf.location' => 'us',
	'cdn.rscf.container' => '',
	'cdn.rscf.cname' => array(
	),
	'cdn.rscf.ssl' => 'auto',
	'cdn.azure.user' => '',
	'cdn.azure.key' => '',
	'cdn.azure.container' => '',
	'cdn.azure.cname' => array(
	),
	'cdn.azure.ssl' => 'auto',
	'cdn.reject.admins' => false,
	'cdn.reject.ua' => array(
	),
	'cdn.reject.uri' => array(
	),
	'cdn.reject.files' => array(
		0 => 'wp-content/uploads/wpcf7_captcha/*',
		1 => 'wp-content/uploads/imagerotator.swf',
	),
	'cloudflare.enabled' => false,
	'cloudflare.email' => '',
	'cloudflare.key' => '',
	'cloudflare.zone' => '',
	'varnish.enabled' => false,
	'varnish.debug' => false,
	'varnish.servers' => array(
	),
	'browsercache.enabled' => true,
	'browsercache.no404wp' => false,
	'browsercache.no404wp.exceptions' => array(
		0 => 'robots\\.txt',
		1 => 'sitemap(_index|[0-9]+)?\\.xml(\\.gz)?',
	),
	'browsercache.cssjs.compression' => true,
	'browsercache.cssjs.expires' => true,
	'browsercache.cssjs.lifetime' => 31536000,
	'browsercache.cssjs.cache.control' => true,
	'browsercache.cssjs.cache.policy' => 'cache_maxage',
	'browsercache.cssjs.etag' => true,
	'browsercache.cssjs.w3tc' => true,
	'browsercache.cssjs.replace' => false,
	'browsercache.html.compression' => true,
	'browsercache.html.expires' => true,
	'browsercache.html.lifetime' => 3600,
	'browsercache.html.cache.control' => true,
	'browsercache.html.cache.policy' => 'cache_maxage',
	'browsercache.html.etag' => true,
	'browsercache.html.w3tc' => true,
	'browsercache.html.replace' => false,
	'browsercache.other.compression' => true,
	'browsercache.other.expires' => true,
	'browsercache.other.lifetime' => 31536000,
	'browsercache.other.cache.control' => true,
	'browsercache.other.cache.policy' => 'cache_maxage',
	'browsercache.other.etag' => true,
	'browsercache.other.w3tc' => true,
	'browsercache.other.replace' => false,
	'mobile.enabled' => true,
	'mobile.rgroups' => array(
		'high' => array(
			'theme' => '',
			'enabled' => true,
			'redirect' => '',
			'agents' => array(
				0 => 'acer\\ s100',
				1 => 'android',
				2 => 'archos5',
				3 => 'blackberry9500',
				4 => 'blackberry9530',
				5 => 'blackberry9550',
				6 => 'blackberry\\ 9800',
				7 => 'cupcake',
				8 => 'docomo\\ ht\\-03a',
				9 => 'dream',
				10 => 'htc\\ hero',
				11 => 'htc\\ magic',
				12 => 'htc_dream',
				13 => 'htc_magic',
				14 => 'incognito',
				15 => 'ipad',
				16 => 'iphone',
				17 => 'ipod',
				18 => 'kindle',
				19 => 'lg\\-gw620',
				20 => 'liquid\\ build',
				21 => 'maemo',
				22 => 'mot\\-mb200',
				23 => 'mot\\-mb300',
				24 => 'nexus\\ one',
				25 => 'opera\\ mini',
				26 => 'samsung\\-s8000',
				27 => 'series60.*webkit',
				28 => 'series60/5\\.0',
				29 => 'sonyericssone10',
				30 => 'sonyericssonu20',
				31 => 'sonyericssonx10',
				32 => 't\\-mobile\\ mytouch\\ 3g',
				33 => 't\\-mobile\\ opal',
				34 => 'tattoo',
				35 => 'webmate',
				36 => 'webos',
			),
		),
		'low' => array(
			'theme' => '',
			'enabled' => true,
			'redirect' => '',
			'agents' => array(
				0 => '2\\.0\\ mmp',
				1 => '240x320',
				2 => 'alcatel',
				3 => 'amoi',
				4 => 'asus',
				5 => 'au\\-mic',
				6 => 'audiovox',
				7 => 'avantgo',
				8 => 'benq',
				9 => 'bird',
				10 => 'blackberry',
				11 => 'blazer',
				12 => 'cdm',
				13 => 'cellphone',
				14 => 'danger',
				15 => 'ddipocket',
				16 => 'docomo',
				17 => 'dopod',
				18 => 'elaine/3\\.0',
				19 => 'ericsson',
				20 => 'eudoraweb',
				21 => 'fly',
				22 => 'haier',
				23 => 'hiptop',
				24 => 'hp\\.ipaq',
				25 => 'htc',
				26 => 'huawei',
				27 => 'i\\-mobile',
				28 => 'iemobile',
				29 => 'j\\-phone',
				30 => 'kddi',
				31 => 'konka',
				32 => 'kwc',
				33 => 'kyocera/wx310k',
				34 => 'lenovo',
				35 => 'lg',
				36 => 'lg/u990',
				37 => 'lge\\ vx',
				38 => 'midp',
				39 => 'midp\\-2\\.0',
				40 => 'mmef20',
				41 => 'mmp',
				42 => 'mobilephone',
				43 => 'mot\\-v',
				44 => 'motorola',
				45 => 'netfront',
				46 => 'newgen',
				47 => 'newt',
				48 => 'nintendo\\ ds',
				49 => 'nintendo\\ wii',
				50 => 'nitro',
				51 => 'nokia',
				52 => 'novarra',
				53 => 'o2',
				54 => 'openweb',
				55 => 'opera\\ mobi',
				56 => 'opera\\.mobi',
				57 => 'palm',
				58 => 'panasonic',
				59 => 'pantech',
				60 => 'pdxgw',
				61 => 'pg',
				62 => 'philips',
				63 => 'phone',
				64 => 'playstation\\ portable',
				65 => 'portalmmm',
				66 => '\\bppc\\b',
				67 => 'proxinet',
				68 => 'psp',
				69 => 'qtek',
				70 => 'sagem',
				71 => 'samsung',
				72 => 'sanyo',
				73 => 'sch',
				74 => 'sec',
				75 => 'sendo',
				76 => 'sgh',
				77 => 'sharp',
				78 => 'sharp\\-tq\\-gx10',
				79 => 'small',
				80 => 'smartphone',
				81 => 'softbank',
				82 => 'sonyericsson',
				83 => 'sph',
				84 => 'symbian',
				85 => 'symbian\\ os',
				86 => 'symbianos',
				87 => 'toshiba',
				88 => 'treo',
				89 => 'ts21i\\-10',
				90 => 'up\\.browser',
				91 => 'up\\.link',
				92 => 'uts',
				93 => 'vertu',
				94 => 'vodafone',
				95 => 'wap',
				96 => 'willcome',
				97 => 'windows\\ ce',
				98 => 'windows\\.ce',
				99 => 'winwap',
				100 => 'xda',
				101 => 'zte',
			),
		),
	),
	'referrer.enabled' => true,
	'referrer.rgroups' => array(
		'search_engines' => array(
			'theme' => '',
			'enabled' => true,
			'redirect' => '',
			'referrers' => array(
				0 => 'google\\.com',
				1 => 'yahoo\\.com',
				2 => 'bing\\.com',
				3 => 'ask\\.com',
				4 => 'msn\\.com',
			),
		),
	),
	'common.support' => '',
	'common.install' => 1327543931,
	'common.tweeted' => false,
	'config.check' => true,
	'config.path' => '',
	'widget.latest.enabled' => false,
	'widget.latest.items' => 3,
	'widget.pagespeed.enabled' => false,
	'widget.pagespeed.key' => '',
	'notes.wp_content_perms' => false,
	'notes.php_is_old' => true,
	'notes.theme_changed' => false,
	'notes.wp_upgraded' => false,
	'notes.plugins_updated' => false,
	'notes.cdn_upload' => false,
	'notes.cdn_reupload' => false,
	'notes.need_empty_pgcache' => false,
	'notes.need_empty_minify' => false,
	'notes.need_empty_objectcache' => false,
	'notes.pgcache_rules_core' => true,
	'notes.pgcache_rules_cache' => true,
	'notes.pgcache_rules_legacy' => true,
	'notes.pgcache_rules_wpsc' => true,
	'notes.minify_rules_core' => true,
	'notes.minify_rules_cache' => true,
	'notes.minify_rules_legacy' => true,
	'notes.support_us' => false,
	'notes.no_curl' => true,
	'notes.no_zlib' => true,
	'notes.zlib_output_compression' => true,
	'notes.no_permalink_rules' => true,
	'notes.browsercache_rules_cache' => true,
	'notes.browsercache_rules_no404wp' => true,
	'notes.minify_error' => false,
	'timelimit.email_send' => 180,
	'timelimit.varnish_purge' => 300,
	'timelimit.cache_flush' => 600,
	'timelimit.cache_gc' => 600,
	'timelimit.cdn_upload' => 600,
	'timelimit.cdn_delete' => 300,
	'timelimit.cdn_purge' => 300,
	'timelimit.cdn_import' => 600,
	'timelimit.cdn_test' => 300,
	'timelimit.cdn_container_create' => 300,
	'timelimit.cloudflare_api_request' => 180,
	'timelimit.domain_rename' => 120,
	'timelimit.minify_recommendations' => 600,
);