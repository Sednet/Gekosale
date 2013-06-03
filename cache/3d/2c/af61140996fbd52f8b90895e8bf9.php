<?php

/* producer\edit\edit.tpl */
class __TwigTemplate_3d2caf61140996fbd52f8b90895e8bf9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.tpl");

        $this->blocks = array(
            'javascript' => array($this, 'block_javascript'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.tpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_javascript($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
<script type=\"text/javascript\" src=\"";
        // line 4
        if (isset($context["DESIGNPATH"])) { $_DESIGNPATH_ = $context["DESIGNPATH"]; } else { $_DESIGNPATH_ = null; }
        echo $_DESIGNPATH_;
        echo "_js_libs/ckeditor/ckeditor.js?v=";
        if (isset($context["appVersion"])) { $_appVersion_ = $context["appVersion"]; } else { $_appVersion_ = null; }
        echo $_appVersion_;
        echo "\"></script>
";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<h2><img src=\"";
        if (isset($context["DESIGNPATH"])) { $_DESIGNPATH_ = $context["DESIGNPATH"]; } else { $_DESIGNPATH_ = null; }
        echo $_DESIGNPATH_;
        echo "_images_panel/icons/modules/producer-edit.png\" alt=\"\"/>";
        echo Gekosale\Translation::get("TXT_EDIT_PRODUCER");
        echo "</h2>
<ul class=\"possibilities\">
\t<li><a href=\"";
        // line 9
        if (isset($context["URL"])) { $_URL_ = $context["URL"]; } else { $_URL_ = null; }
        echo $_URL_;
        echo "producer\" class=\"button return\" title=\"";
        echo Gekosale\Translation::get("TXT_RETURN_TO_PREVIOUS_SCREEN");
        echo "\"><span><img src=\"";
        if (isset($context["DESIGNPATH"])) { $_DESIGNPATH_ = $context["DESIGNPATH"]; } else { $_DESIGNPATH_ = null; }
        echo $_DESIGNPATH_;
        echo "_images_panel/icons/buttons/arrow-left-gray.png\" title=\"";
        echo Gekosale\Translation::get("TXT_PRODUCERS_LIST");
        echo "\" alt=\"";
        echo Gekosale\Translation::get("TXT_PRODUCERS_LIST");
        echo "\"/></span></a></li>
\t<!-- <li><a href=\"#producer\" rel=\"reset\" class=\"button\" title=\"";
        // line 10
        echo Gekosale\Translation::get("TXT_START_AGAIN");
        echo "\"><span><img src=\"";
        if (isset($context["DESIGNPATH"])) { $_DESIGNPATH_ = $context["DESIGNPATH"]; } else { $_DESIGNPATH_ = null; }
        echo $_DESIGNPATH_;
        echo "_images_panel/icons/buttons/clean.png\" alt=\"\"/>";
        echo Gekosale\Translation::get("TXT_START_AGAIN");
        echo "</span></a></li> -->
\t<li><a href=\"#producer\" rel=\"submit\" class=\"button\" title=\"";
        // line 11
        echo Gekosale\Translation::get("TXT_SAVE");
        echo "\"><span><img src=\"";
        if (isset($context["DESIGNPATH"])) { $_DESIGNPATH_ = $context["DESIGNPATH"]; } else { $_DESIGNPATH_ = null; }
        echo $_DESIGNPATH_;
        echo "_images_panel/icons/buttons/check.png\" alt=\"\"/>";
        echo Gekosale\Translation::get("TXT_SAVE");
        echo "</span></a></li>
</ul>
";
        // line 13
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo $_form_;
        echo "
<script type=\"text/javascript\">
\$(document).ready(function() {
\t\$.each(GCore.aoLanguages,function(l,language){
\t\tvar name = \"#required_data__language_data__\"+language.id+\"__name\";
\t\tvar seo = \"#required_data__language_data__\"+language.id+\"__seo\";
\t\tif(\$(seo).val() == ''){
\t\t\txajax_doAJAXCreateSeo({
\t\t\t\tname: \$(name).val()
\t\t\t}, GCallback(function(eEvent) {
\t\t\t\t\$(seo).val(eEvent.seo);
\t\t\t}));
\t\t}
\t\tvar sRefreshLink =  \$('<img title=\"";
        // line 26
        echo Gekosale\Translation::get("TXT_REFRESH_SEO");
        echo "\" src=\"' + GCore.DESIGN_PATH + '_images_panel/icons/datagrid/refresh.png\" />').css({
\t\t\tcursor: 'pointer',
\t\t\t'margin-top': '3px',
\t\t\t'margin-left': '3px',
\t\t});
\t\t\$(seo).parent().parent().append(sRefreshLink);

\t\tsRefreshLink.click(function(){
\t\t\txajax_doAJAXCreateSeo({
\t\t\t\tname: \$(name).val()
\t\t\t}, GCallback(function(eEvent) {
\t\t\t\t\$(seo).val(eEvent.seo);
\t\t\t}));
\t\t});
  \t});
});

</script>
";
    }

    public function getTemplateName()
    {
        return "producer\\edit\\edit.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 26,  89 => 13,  79 => 11,  70 => 10,  56 => 9,  47 => 7,  44 => 6,  34 => 4,  30 => 3,  27 => 2,);
    }
}
