<?php

/* finalization\index\layout.tpl */
class __TwigTemplate_dfeb4f94ca83463791ef3a0b67d2dc67 extends Twig_Template
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
        $this->env->loadTemplate("header.tpl")->display($context);
        // line 2
        echo "<div class=\"order-wrap\">
\t<section id=\"content\" class=\"content layout-boxes\">
\t\t";
        // line 4
        if (isset($context["pagescheme"])) { $_pagescheme_ = $context["pagescheme"]; } else { $_pagescheme_ = null; }
        echo $this->getAttribute($_pagescheme_, "content");
        echo "
\t</section>
</div>
";
        // line 7
        if (isset($context["pagescheme"])) { $_pagescheme_ = $context["pagescheme"]; } else { $_pagescheme_ = null; }
        echo $this->getAttribute($_pagescheme_, "js");
        echo "
";
        // line 8
        $this->env->loadTemplate("footer.tpl")->display($context);
    }

    public function getTemplateName()
    {
        return "finalization\\index\\layout.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  19 => 2,  38 => 8,  21 => 3,  30 => 7,  25 => 3,  147 => 33,  116 => 30,  109 => 29,  101 => 26,  82 => 21,  74 => 18,  62 => 13,  39 => 11,  24 => 4,  32 => 10,  20 => 2,  173 => 39,  158 => 36,  153 => 35,  143 => 32,  137 => 30,  131 => 29,  128 => 28,  124 => 31,  111 => 24,  106 => 23,  98 => 22,  93 => 21,  90 => 20,  83 => 19,  80 => 18,  68 => 14,  58 => 11,  46 => 8,  43 => 7,  34 => 5,  29 => 4,  26 => 3,  22 => 2,  17 => 1,  488 => 194,  477 => 189,  473 => 188,  463 => 182,  457 => 181,  448 => 177,  438 => 172,  430 => 169,  420 => 164,  412 => 161,  404 => 158,  394 => 153,  384 => 148,  376 => 145,  368 => 141,  354 => 140,  346 => 135,  335 => 130,  331 => 129,  321 => 123,  315 => 122,  306 => 118,  296 => 113,  288 => 110,  278 => 105,  270 => 102,  262 => 99,  252 => 94,  244 => 91,  236 => 89,  228 => 86,  220 => 83,  211 => 79,  204 => 76,  190 => 75,  182 => 70,  170 => 64,  166 => 63,  156 => 57,  150 => 34,  141 => 52,  133 => 32,  125 => 46,  117 => 42,  103 => 41,  95 => 22,  84 => 28,  79 => 25,  76 => 24,  73 => 15,  70 => 22,  67 => 21,  65 => 13,  61 => 18,  59 => 17,  52 => 9,  48 => 12,  44 => 11,  40 => 10,  31 => 6,  28 => 3,  23 => 4,);
    }
}