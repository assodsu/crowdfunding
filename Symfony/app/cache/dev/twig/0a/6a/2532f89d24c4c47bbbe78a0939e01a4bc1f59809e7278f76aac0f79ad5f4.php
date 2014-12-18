<?php

/* CFMainBundle:Default:index.html.twig */
class __TwigTemplate_0a6a2532f89d24c4c47bbbe78a0939e01a4bc1f59809e7278f76aac0f79ad5f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>

\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<title>COCEPTIO - Accueil</title>
\t\t<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" type='text/css' rel=\"stylesheet\"/>
\t\t<link  type='text/css' rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/theme.css"), "html", null, true);
        echo "\" />
\t</head>
\t<svg width=\"0\" height=\"0\" display\"none\">
\t\t<clipPath id=\"imgPolygon\">
\t\t\t<polygon points=\"0 200,200 200,300 0,100 0\">
\t\t\t</polygon>
\t\t</clipPath>
\t\t<clipPath id=\"menuPolygon\">
\t\t\t<polygon points=\"0 200,150 200,250 0,0 0\">
\t\t\t</polygon>
\t\t</clipPath>
\t</svg>
\t<body>
\t\t<div class=\"site-wrapper\"><!-- div globale -->
\t\t
\t\t\t<div class =\"cover-container\"><!-- div de container pour le header -->
\t\t\t\t<h1>COCEPTIO</h1>
\t\t\t\t<h2>concevoir | ensemble</h2>
\t\t\t</div>
\t\t\t
\t\t\t<div id='carousel-container'>
\t\t\t\t<div id='menu_carousel'>
\t\t\t\t\t<a href='#'>projets à la une</a>
\t\t\t\t\t<a href='#'>touche à sa fin</a>
\t\t\t\t\t<a href='#'>nouveaux</a>
\t\t\t\t\t<a href='#'>tous les</br>projets</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"carousel\" id=\"carousel-horizontal\"><!-- images utilisees pour le caroussel -->
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/1.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/2.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/3.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/4.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/5.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/6.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/3.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t\t<li><img src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/4.jpg"), "html", null, true);
        echo "\"/></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<nav class=\"navbar navbar-default\" role=\"navigation\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\">\t\t\t\t\t
\t\t\t\t\t\t<form class=\"navbar-form active\" role=\"search\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"trash\" class=\"form-control\" placeholder=\"Tapez une recherche ou glissez vos boutons de centres d'intérêts...\"/>
\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t\t\t\t\t\t\t<button type=\"reset\" class=\"btn btn-default\">
\t\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-remove\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">Close</span>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-default\">
\t\t\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-search\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"sr-only\">Search</span>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div><!-- /.navbar-collapse -->
\t\t\t\t</div><!-- /.container-fluid -->
\t\t\t</nav>
\t\t\t<div class=\"dragdrop-button-container\">
\t\t\t\t<ul id=\"gallery\">
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Sport\"><span class=\"\"></span> Sport</li>
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Loisirs\"><span class=\"glyphicon glyphicon-send\"></span> Loisirs</li>
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Tourisme\"><span class=\"glyphicon glyphicon-camera\"></span> Tourisme</li>
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Associatif\"><span class=\"glyphicon glyphicon-heart-empty\"></span> Associatif</li>
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Culture\"><span class=\"glyphicon glyphicon-music\"></span> Culture</li>
\t\t\t\t\t<li class=\"btn btn-primary btn-lg\" value=\"Ville\"><span class=\"glyphicon glyphicon-tower\"></span> Ville</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t
\t\t\t<div class=\"footer\"><!-- footer -->
\t\t\t\t<div>
\t\t\t\t<p>made with <span class=\"glyphicon glyphicon-heart\"></span> by the project team</p>
\t\t\t\t</div>
\t\t\t</div>

\t\t</div><!-- end wrapper -->
\t</body>
\t<script type=\"text/javascript\" src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/carousel.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dragdrop.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t\$('#carousel-horizontal').scrollingCarousel( {
\t\t\t\tscrollerAlignment : 'horizontal',
\t\t\t\tautoScroll: true,
\t\t\t\tautoScrollSpeed: 40000
\t\t\t});
\t\t});
\t</script>
</html>";
    }

    public function getTemplateName()
    {
        return "CFMainBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 94,  152 => 93,  148 => 92,  144 => 91,  140 => 90,  91 => 44,  87 => 43,  83 => 42,  79 => 41,  75 => 40,  71 => 39,  67 => 38,  63 => 37,  31 => 8,  27 => 7,  19 => 1,);
    }
}
