<?php

namespace CF\CommentBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CFCommentBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSCommentBundle';
	}
}
