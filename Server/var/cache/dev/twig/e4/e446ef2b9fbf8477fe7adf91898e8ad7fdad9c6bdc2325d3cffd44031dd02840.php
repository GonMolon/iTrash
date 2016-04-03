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
        $__internal_14b22ea16853bbad347d9b0fe5895c47eaa6077cb7f50490db4067628732df7c = $this->env->getExtension("native_profiler");
        $__internal_14b22ea16853bbad347d9b0fe5895c47eaa6077cb7f50490db4067628732df7c->enter($__internal_14b22ea16853bbad347d9b0fe5895c47eaa6077cb7f50490db4067628732df7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_14b22ea16853bbad347d9b0fe5895c47eaa6077cb7f50490db4067628732df7c->leave($__internal_14b22ea16853bbad347d9b0fe5895c47eaa6077cb7f50490db4067628732df7c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_9f79857061c058bb2c337e6c63ccf0bf53fffe36da1e86ed2e67f34329dc8fad = $this->env->getExtension("native_profiler");
        $__internal_9f79857061c058bb2c337e6c63ccf0bf53fffe36da1e86ed2e67f34329dc8fad->enter($__internal_9f79857061c058bb2c337e6c63ccf0bf53fffe36da1e86ed2e67f34329dc8fad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_9f79857061c058bb2c337e6c63ccf0bf53fffe36da1e86ed2e67f34329dc8fad->leave($__internal_9f79857061c058bb2c337e6c63ccf0bf53fffe36da1e86ed2e67f34329dc8fad_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_3f50481d9bc40c46d246a96fa98720a1603a182cbd80cbe7f17dbefe10051936 = $this->env->getExtension("native_profiler");
        $__internal_3f50481d9bc40c46d246a96fa98720a1603a182cbd80cbe7f17dbefe10051936->enter($__internal_3f50481d9bc40c46d246a96fa98720a1603a182cbd80cbe7f17dbefe10051936_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_3f50481d9bc40c46d246a96fa98720a1603a182cbd80cbe7f17dbefe10051936->leave($__internal_3f50481d9bc40c46d246a96fa98720a1603a182cbd80cbe7f17dbefe10051936_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_1fcf3006657e9c9b30b465ec9ddaf6b3634b970352c924c57e79e50ff0f44179 = $this->env->getExtension("native_profiler");
        $__internal_1fcf3006657e9c9b30b465ec9ddaf6b3634b970352c924c57e79e50ff0f44179->enter($__internal_1fcf3006657e9c9b30b465ec9ddaf6b3634b970352c924c57e79e50ff0f44179_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_1fcf3006657e9c9b30b465ec9ddaf6b3634b970352c924c57e79e50ff0f44179->leave($__internal_1fcf3006657e9c9b30b465ec9ddaf6b3634b970352c924c57e79e50ff0f44179_prof);

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
