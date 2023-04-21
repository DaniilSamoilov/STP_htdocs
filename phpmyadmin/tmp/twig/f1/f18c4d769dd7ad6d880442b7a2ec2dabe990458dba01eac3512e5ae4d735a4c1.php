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

/* table/tracking/main.twig */
class __TwigTemplate_1be695cdda8ce007ce227859e4d00d251561fbcb515a2c35841c6651b3fd2e0a extends Template
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
        if ((($context["selectable_tables_num_rows"] ?? null) > 0)) {
            // line 2
            echo "    <form method=\"post\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ($context["url_params"] ?? null));
            echo "\">
        ";
            // line 3
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
            echo "
        <select name=\"table\" class=\"autosubmit\">
            ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["selectable_tables_entries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 6
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "table_name", [], "any", false, false, false, 6), "html", null, true);
                echo "\"";
                // line 7
                echo (((twig_get_attribute($this->env, $this->source, $context["entry"], "table_name", [], "any", false, false, false, 7) == ($context["selected_table"] ?? null))) ? (" selected") : (""));
                echo ">
                    ";
                // line 8
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "db_name", [], "any", false, false, false, 8), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "table_name", [], "any", false, false, false, 8), "html", null, true);
                echo "
                    ";
                // line 9
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "is_tracked", [], "any", false, false, false, 9)) {
                    // line 10
                    echo "                        (";
echo _gettext("active");
                    echo ")
                    ";
                } else {
                    // line 12
                    echo "                        (";
echo _gettext("not active");
                    echo ")
                    ";
                }
                // line 14
                echo "                </option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </select>
        <input type=\"hidden\" name=\"show_versions_submit\" value=\"1\">
    </form>
";
        }
        // line 20
        echo "<br>
";
        // line 21
        if ((($context["last_version"] ?? null) > 0)) {
            // line 22
            echo "    <form method=\"post\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
            echo "\" name=\"versionsForm\" id=\"versionsForm\" class=\"ajax\">
        ";
            // line 23
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
            echo "
        <table id=\"versions\" class=\"table table-striped table-hover table-sm w-auto\">
            <thead>
                <tr>
                    <th></th>
                    <th>";
echo _gettext("Version");
            // line 28
            echo "</th>
                    <th>";
echo _gettext("Created");
            // line 29
            echo "</th>
                    <th>";
echo _gettext("Updated");
            // line 30
            echo "</th>
                    <th>";
echo _gettext("Status");
            // line 31
            echo "</th>
                    <th>";
echo _gettext("Action");
            // line 32
            echo "</th>
                    <th>";
echo _gettext("Show");
            // line 33
            echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["versions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 38
                echo "                    <tr>
                        <td class=\"text-center\">
                            <input type=\"checkbox\" name=\"selected_versions[]\"
                                class=\"checkall\" id=\"selected_versions_";
                // line 41
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["version"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["version"] ?? null) : null));
                echo "\"
                                value=\"";
                // line 42
                echo twig_escape_filter($this->env, (($__internal_compile_1 = $context["version"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["version"] ?? null) : null));
                echo "\">
                        </td>
                        <td class=\"float-end\">
                            <label for=\"selected_versions_";
                // line 45
                echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["version"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["version"] ?? null) : null));
                echo "\">
                                <b>";
                // line 46
                echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["version"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["version"] ?? null) : null));
                echo "</b>
                            </label>
                        </td>
                        <td>";
                // line 49
                echo twig_escape_filter($this->env, (($__internal_compile_4 = $context["version"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["date_created"] ?? null) : null));
                echo "</td>
                        <td>";
                // line 50
                echo twig_escape_filter($this->env, (($__internal_compile_5 = $context["version"]) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["date_updated"] ?? null) : null));
                echo "</td>
                        ";
                // line 51
                if (((($__internal_compile_6 = $context["version"]) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["tracking_active"] ?? null) : null) == 1)) {
                    // line 52
                    echo "                            ";
                    $context["last_version_status"] = 1;
                    // line 53
                    echo "                            <td>";
echo _gettext("active");
                    echo "</td>
                        ";
                } else {
                    // line 55
                    echo "                            ";
                    $context["last_version_status"] = 0;
                    // line 56
                    echo "                            <td>";
echo _gettext("not active");
                    echo "</td>
                        ";
                }
                // line 58
                echo "                        <td>
                            <a class=\"delete_version_anchor ajax\" href=\"";
                // line 59
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 60
                echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["version" => (($__internal_compile_7 =                 // line 61
$context["version"]) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["version"] ?? null) : null), "submit_delete_version" => true]), "", false);
                // line 63
                echo "\">
                                ";
                // line 64
                echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete version"));
                echo "
                            </a>
                        </td>
                        <td>
                            <a href=\"";
                // line 68
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 69
                echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["version" => (($__internal_compile_8 =                 // line 70
$context["version"]) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["version"] ?? null) : null), "report" => "true"]), "", false);
                // line 72
                echo "\">
                                ";
                // line 73
                echo PhpMyAdmin\Html\Generator::getIcon("b_report", _gettext("Tracking report"));
                echo "
                            </a>
                            <a href=\"";
                // line 75
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 76
                echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["version" => (($__internal_compile_9 =                 // line 77
$context["version"]) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["version"] ?? null) : null), "snapshot" => "true"]), "", false);
                // line 79
                echo "\">
                                ";
                // line 80
                echo PhpMyAdmin\Html\Generator::getIcon("b_props", _gettext("Structure snapshot"));
                echo "
                            </a>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 85
            echo "            </tbody>
        </table>
        ";
            // line 87
            $this->loadTemplate("select_all.twig", "table/tracking/main.twig", 87)->display(twig_to_array(["text_dir" =>             // line 88
($context["text_dir"] ?? null), "form_name" => "versionsForm"]));
            // line 91
            echo "        <button class=\"btn btn-link mult_submit\" type=\"submit\" name=\"submit_mult\" value=\"delete_version\" title=\"";
echo _gettext("Delete version");
            echo "\">
            ";
            // line 92
            echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete version"));
            echo "
        </button>
    </form>
    ";
            // line 95
            $context["last_version_element"] = twig_first($this->env, ($context["versions"] ?? null));
            // line 96
            echo "    <div>
        <form method=\"post\" action=\"";
            // line 97
            echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ($context["url_params"] ?? null));
            echo "\">
            ";
            // line 98
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
            echo "
            <fieldset class=\"pma-fieldset\">
                <legend>
                    ";
            // line 101
            if (((($__internal_compile_10 = ($context["last_version_element"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["tracking_active"] ?? null) : null) == 0)) {
                // line 102
                echo "                        ";
                $context["legend"] = _gettext("Activate tracking for %s");
                // line 103
                echo "                        ";
                $context["value"] = "activate_now";
                // line 104
                echo "                        ";
                $context["button"] = _gettext("Activate now");
                // line 105
                echo "                    ";
            } else {
                // line 106
                echo "                        ";
                $context["legend"] = _gettext("Deactivate tracking for %s");
                // line 107
                echo "                        ";
                $context["value"] = "deactivate_now";
                // line 108
                echo "                        ";
                $context["button"] = _gettext("Deactivate now");
                // line 109
                echo "                    ";
            }
            // line 110
            echo "
                    ";
            // line 111
            echo twig_escape_filter($this->env, twig_sprintf(($context["legend"] ?? null), ((($context["db"] ?? null) . ".") . ($context["table"] ?? null))), "html", null, true);
            echo "
                </legend>
                <input type=\"hidden\" name=\"version\" value=\"";
            // line 113
            echo twig_escape_filter($this->env, ($context["last_version"] ?? null), "html", null, true);
            echo "\">
                <input type=\"hidden\" name=\"toggle_activation\" value=\"";
            // line 114
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\">
                <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
            // line 115
            echo twig_escape_filter($this->env, ($context["button"] ?? null), "html", null, true);
            echo "\">
            </fieldset>
        </form>
    </div>
";
        }
        // line 120
        $this->loadTemplate("create_tracking_version.twig", "table/tracking/main.twig", 120)->display(twig_to_array(["route" => "/table/tracking", "url_params" =>         // line 122
($context["url_params"] ?? null), "last_version" =>         // line 123
($context["last_version"] ?? null), "db" =>         // line 124
($context["db"] ?? null), "selected" => [0 =>         // line 125
($context["table"] ?? null)], "type" =>         // line 126
($context["type"] ?? null), "default_statements" =>         // line 127
($context["default_statements"] ?? null)]));
    }

    public function getTemplateName()
    {
        return "table/tracking/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  338 => 127,  337 => 126,  336 => 125,  335 => 124,  334 => 123,  333 => 122,  332 => 120,  324 => 115,  320 => 114,  316 => 113,  311 => 111,  308 => 110,  305 => 109,  302 => 108,  299 => 107,  296 => 106,  293 => 105,  290 => 104,  287 => 103,  284 => 102,  282 => 101,  276 => 98,  272 => 97,  269 => 96,  267 => 95,  261 => 92,  256 => 91,  254 => 88,  253 => 87,  249 => 85,  238 => 80,  235 => 79,  233 => 77,  232 => 76,  229 => 75,  224 => 73,  221 => 72,  219 => 70,  218 => 69,  215 => 68,  208 => 64,  205 => 63,  203 => 61,  202 => 60,  199 => 59,  196 => 58,  190 => 56,  187 => 55,  181 => 53,  178 => 52,  176 => 51,  172 => 50,  168 => 49,  162 => 46,  158 => 45,  152 => 42,  148 => 41,  143 => 38,  139 => 37,  133 => 33,  129 => 32,  125 => 31,  121 => 30,  117 => 29,  113 => 28,  104 => 23,  99 => 22,  97 => 21,  94 => 20,  88 => 16,  81 => 14,  75 => 12,  69 => 10,  67 => 9,  61 => 8,  57 => 7,  53 => 6,  49 => 5,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "table/tracking/main.twig", "D:\\OSPanel\\domains\\phpmyadmin\\templates\\table\\tracking\\main.twig");
    }
}
