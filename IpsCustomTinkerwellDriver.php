<?php

use Tinkerwell\ContextMenu\Label;
use Tinkerwell\ContextMenu\OpenURL;
use Tinkerwell\ContextMenu\Separator;

class IpsCustomTinkerwellDriver extends TinkerwellDriver
{

	public function canBootstrap($projectPath)
	{
		return file_exists($projectPath . '/conf_global.php') AND file_exists( $projectPath . '/init.php');
	}

	public function bootstrap($projectPath)
	{
		require $projectPath . '/init.php';
	}

	public function contextMenu()
	{
		return array_merge(parent::contextMenu(), [
			Separator::create(),
			Label::create('IPS4'),
			OpenURL::create('Community', 'https://invisioncommunity.com'),
			OpenURL::create('Documentation', 'https://invisioncommunity.com/4guides/welcome/about-invision-community-r7/'),
			OpenURL::create('Dev Docs', 'https://invisioncommunity.com/developers/'),
			OpenURL::create('Local Dev Site', \IPS\Settings::i()->base_url),
		]);
	}
}
