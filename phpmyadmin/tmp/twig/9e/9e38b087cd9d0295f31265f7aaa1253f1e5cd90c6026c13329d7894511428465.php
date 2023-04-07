<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* create_tracking_version.twig */
class __TwigTemplate_2493977bcd2d2c6948cabdec851dccffe19cc885379ccc8dae970923ef69e691 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"card mt-3\">
    <form method=\"post\" action=\"";
        // line 2
        echo PhpMyAdmin\Url::getFromRoute(($context["route"] ?? null), ($context["url_params"] ?? null));
        echo "\">
        ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["selected"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["selected_table"]) {
            // line 5
            echo "            <input type=\"hidden\" name=\"selected[]\" value=\"";
            echo twig_escape_filter($this->env, $context["selected_table"], "html", null, true);
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selected_table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "
        <div class=\"card-header\">
                ";
        // line 9
        if ((twig_length_filter($this->env, ($context["selected"] ?? null)) == 1)) {
            // line 10
            echo "                    ";
            echo twig_escape_filter($this->env, twig_sprintf(_gettext("Create version %1\$s of %2\$s"), (            // line 11
($context["last_version"] ?? null) + 1), ((            // line 12
($context["db"] ?? null) . ".") . (($__internal_compile_0 = ($context["selected"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null))), "html", null, true);
            // line 13
            echo "
                ";
        } else {
            // line 15
            echo "                    ";
            echo twig_escape_filter($this->env, twig_sprintf(_gettext("Create version %1\$s"), (($context["last_version"] ?? null) + 1)), "html", null, true);
            echo "
                ";
        }
        // line 17
        echo "        </div>

        <div class=\"card-body\">
            <input type=\"hidden\" name=\"version\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (($context["last_version"] ?? null) + 1), "html", null, true);
        echo "\">
            <p>";
echo _gettext("Track these data definition statements:");
        // line 21
        echo "</p>

            ";
        // line 23
        if (((($context["type"] ?? null) == "both") || (($context["type"] ?? null) == "table"))) {
            // line 24
            echo "                <input type=\"checkbox\" name=\"alter_table\" value=\"true\"";
            // line 25
            echo ((twig_in_filter("ALTER TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                ALTER TABLE<br>
                <input type=\"checkbox\" name=\"rename_table\" value=\"true\"";
            // line 28
            echo ((twig_in_filter("RENAME TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                RENAME TABLE<br>
                <input type=\"checkbox\" name=\"create_table\" value=\"true\"";
            // line 31
            echo ((twig_in_filter("CREATE TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                CREATE TABLE<br>
                <input type=\"checkbox\" name=\"drop_table\" value=\"true\"";
            // line 34
            echo ((twig_in_filter("DROP TABLE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                DROP TABLE<br>
            ";
        }
        // line 37
        echo "            ";
        if ((($context["type"] ?? null) == "both")) {
            // line 38
            echo "                <br>
            ";
        }
        // line 40
        echo "            ";
        if (((($context["type"] ?? null) == "both") || (($context["type"] ?? null) == "view"))) {
            // line 41
            echo "                <input type=\"checkbox\" name=\"alter_view\" value=\"true\"";
            // line 42
            echo ((twig_in_filter("ALTER VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                ALTER VIEW<br>
                <input type=\"checkbox\" name=\"create_view\" value=\"true\"";
            // line 45
            echo ((twig_in_filter("CREATE VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                CREATE VIEW<br>
                <input type=\"checkbox\" name=\"drop_view\" value=\"true\"";
            // line 48
            echo ((twig_in_filter("DROP VIEW", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
            echo ">
                DROP VIEW<br>
            ";
        }
        // line 51
        echo "            <br>

            <input type=\"checkbox\" name=\"create_index\" value=\"true\"";
        // line 54
        echo ((twig_in_filter("CREATE INDEX", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            CREATE INDEX<br>
            <input type=\"checkbox\" name=\"drop_index\" value=\"true\"";
        // line 57
        echo ((twig_in_filter("DROP INDEX", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            DROP INDEX<br>

            <p>";
echo _gettext("Track these data manipulation statements:");
        // line 60
        echo "</p>
            <input type=\"checkbox\" name=\"insert\" value=\"true\"";
        // line 62
        echo ((twig_in_filter("INSERT", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            INSERT<br>
            <input type=\"checkbox\" name=\"update\" value=\"true\"";
        // line 65
        echo ((twig_in_filter("UPDATE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            UPDATE<br>
            <input type=\"checkbox\" name=\"delete\" value=\"true\"";
        // line 68
        echo ((twig_in_filter("DELETE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            DELETE<br>
            <input type=\"checkbox\" name=\"truncate\" value=\"true\"";
        // line 71
        echo ((twig_in_filter("TRUNCATE", ($context["default_statements"] ?? null))) ? (" checked=\"checked\"") : (""));
        echo ">
            TRUNCATE<br>
        </div>

        <div class=\"card-footer\">
            <input type=\"hidden\" name=\"submit_create_version\" value=\"1\">
            <input class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Create version");
        // line 77
        echo "\">
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "create_tracking_version.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 77,  183 => 71,  178 => 68,  173 => 65,  168 => 62,  165 => 60,  158 => 57,  153 => 54,  149 => 51,  143 => 48,  138 => 45,  133 => 42,  131 => 41,  128 => 40,  124 => 38,  121 => 37,  115 => 34,  110 => 31,  105 => 28,  100 => 25,  98 => 24,  96 => 23,  92 => 21,  87 => 20,  82 => 17,  76 => 15,  72 => 13,  70 => 12,  69 => 11,  67 => 10,  65 => 9,  61 => 7,  52 => 5,  48 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "create_tracking_version.twig", "D:\\OSPanel\\domains\\phpmyadmin\\templates\\create_tracking_version.twig");
    }
}
