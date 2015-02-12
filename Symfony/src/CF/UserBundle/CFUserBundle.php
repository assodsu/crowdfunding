<?php

namespace CF\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CFUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
