<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_d8b634804b216089d5e74c72f80ea0c71ab654b6dad65b88051ed6fd3b9b78e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e6fe886adabd532225f7dfa083bac50eb68d31c5b7318d2336dbb7124e4cc676 = $this->env->getExtension("native_profiler");
        $__internal_e6fe886adabd532225f7dfa083bac50eb68d31c5b7318d2336dbb7124e4cc676->enter($__internal_e6fe886adabd532225f7dfa083bac50eb68d31c5b7318d2336dbb7124e4cc676_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e6fe886adabd532225f7dfa083bac50eb68d31c5b7318d2336dbb7124e4cc676->leave($__internal_e6fe886adabd532225f7dfa083bac50eb68d31c5b7318d2336dbb7124e4cc676_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_43fe3d942daa36450299b4f37772dff2a479a33834603a6d022f075346099d3b = $this->env->getExtension("native_profiler");
        $__internal_43fe3d942daa36450299b4f37772dff2a479a33834603a6d022f075346099d3b->enter($__internal_43fe3d942daa36450299b4f37772dff2a479a33834603a6d022f075346099d3b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_43fe3d942daa36450299b4f37772dff2a479a33834603a6d022f075346099d3b->leave($__internal_43fe3d942daa36450299b4f37772dff2a479a33834603a6d022f075346099d3b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_88fcd269f74fd842cc5949a357635d3be4d3dc6f64a5113b0251b000ee011626 = $this->env->getExtension("native_profiler");
        $__internal_88fcd269f74fd842cc5949a357635d3be4d3dc6f64a5113b0251b000ee011626->enter($__internal_88fcd269f74fd842cc5949a357635d3be4d3dc6f64a5113b0251b000ee011626_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_88fcd269f74fd842cc5949a357635d3be4d3dc6f64a5113b0251b000ee011626->leave($__internal_88fcd269f74fd842cc5949a357635d3be4d3dc6f64a5113b0251b000ee011626_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_15398b2803a9bd1853dbfa4450ce191aa97a071f61eef1b357f574be9d551a68 = $this->env->getExtension("native_profiler");
        $__internal_15398b2803a9bd1853dbfa4450ce191aa97a071f61eef1b357f574be9d551a68->enter($__internal_15398b2803a9bd1853dbfa4450ce191aa97a071f61eef1b357f574be9d551a68_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_15398b2803a9bd1853dbfa4450ce191aa97a071f61eef1b357f574be9d551a68->leave($__internal_15398b2803a9bd1853dbfa4450ce191aa97a071f61eef1b357f574be9d551a68_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
