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

/* database/tracking/tables.twig */
class __TwigTemplate_bbdf61d7996200a9140f860286fbe76ecae53ed316c13990a64a558b345c5d0d extends Template
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
        // line 2
        if (($context["head_version_exists"] ?? null)) {
            // line 3
            echo "    <div id=\"tracked_tables\">
        <h3>";
echo _gettext("Tracked tables");
            // line 4
            echo "</h3>

        <form method=\"post\" action=\"";
            // line 6
            echo PhpMyAdmin\Url::getFromRoute("/database/tracking");
            echo "\" name=\"trackedForm\"
            id=\"trackedForm\" class=\"ajax\">
            ";
            // line 8
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
            echo "
            <table id=\"versions\" class=\"table table-striped table-hover w-auto\">
                <thead>
                    <tr>
                        <th></th>
                        <th>";
echo _gettext("Table");
            // line 13
            echo "</th>
                        <th>";
echo _gettext("Last version");
            // line 14
            echo "</th>
                        <th>";
echo _gettext("Created");
            // line 15
            echo "</th>
                        <th>";
echo _gettext("Updated");
            // line 16
            echo "</th>
                        <th>";
echo _gettext("Status");
            // line 17
            echo "</th>
                        <th>";
echo _gettext("Action");
            // line 18
            echo "</th>
                        <th>";
echo _gettext("Show");
            // line 19
            echo "</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["versions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 24
                echo "                        <tr>
                            <td class=\"text-center\">
                                <input type=\"checkbox\" name=\"selected_tbl[]\"
                                    class=\"checkall\" id=\"selected_tbl_";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "table_name", [], "any", false, false, false, 27), "html", null, true);
                echo "\"
                                    value=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "table_name", [], "any", false, false, false, 28), "html", null, true);
                echo "\">
                            </td>
                            <th>
                                <label for=\"selected_tbl_";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "table_name", [], "any", false, false, false, 31), "html", null, true);
                echo "\">
                                    ";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "table_name", [], "any", false, false, false, 32), "html", null, true);
                echo "
                                </label>
                            </th>
                            <td class=\"text-end\">
                                ";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "version", [], "any", false, false, false, 36), "html", null, true);
                echo "
                            </td>
                            <td>
                                ";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "date_created", [], "any", false, false, false, 39), "html", null, true);
                echo "
                            </td>
                            <td>
                                ";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "date_updated", [], "any", false, false, false, 42), "html", null, true);
                echo "
                            </td>
                            <td>
                              <div class=\"wrapper toggleAjax hide\">
                                <div class=\"toggleButton\">
                                  <div title=\"";
echo _gettext("Click to toggle");
                // line 47
                echo "\" class=\"toggle-container ";
                echo (((twig_get_attribute($this->env, $this->source, $context["version"], "tracking_active", [], "any", false, false, false, 47) == 1)) ? ("on") : ("off"));
                echo "\">
                                    <img src=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath((("toggle-" . ($context["text_dir"] ?? null)) . ".png")), "html", null, true);
                echo "\">
                                    <table>
                                      <tbody>
                                      <tr>
                                        <td class=\"toggleOn\">
                                          <span class=\"hide\">";
                // line 54
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ["db" => twig_get_attribute($this->env, $this->source,                 // line 55
$context["version"], "db_name", [], "any", false, false, false, 55), "table" => twig_get_attribute($this->env, $this->source,                 // line 56
$context["version"], "table_name", [], "any", false, false, false, 56), "version" => twig_get_attribute($this->env, $this->source,                 // line 57
$context["version"], "version", [], "any", false, false, false, 57), "toggle_activation" => "activate_now"]);
                // line 60
                echo "</span>
                                          <div>";
echo _gettext("active");
                // line 61
                echo "</div>
                                        </td>
                                        <td><div>&nbsp;</div></td>
                                        <td class=\"toggleOff\">
                                          <span class=\"hide\">";
                // line 66
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking", ["db" => twig_get_attribute($this->env, $this->source,                 // line 67
$context["version"], "db_name", [], "any", false, false, false, 67), "table" => twig_get_attribute($this->env, $this->source,                 // line 68
$context["version"], "table_name", [], "any", false, false, false, 68), "version" => twig_get_attribute($this->env, $this->source,                 // line 69
$context["version"], "version", [], "any", false, false, false, 69), "toggle_activation" => "deactivate_now"]);
                // line 72
                echo "</span>
                                          <div>";
echo _gettext("not active");
                // line 73
                echo "</div>
                                        </td>
                                      </tr>
                                      </tbody>
                                    </table>
                                    <span class=\"hide callback\"></span>
                                    <span class=\"hide text_direction\">";
                // line 79
                echo twig_escape_filter($this->env, ($context["text_dir"] ?? null), "html", null, true);
                echo "</span>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                                <a class=\"delete_tracking_anchor ajax\" href=\"";
                // line 85
                echo PhpMyAdmin\Url::getFromRoute("/database/tracking");
                echo "\" data-post=\"";
                // line 86
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 87
($context["db"] ?? null), "goto" => PhpMyAdmin\Url::getFromRoute("/table/tracking"), "back" => PhpMyAdmin\Url::getFromRoute("/database/tracking"), "table" => twig_get_attribute($this->env, $this->source,                 // line 90
$context["version"], "table_name", [], "any", false, false, false, 90), "delete_tracking" => true], "", false);
                // line 92
                echo "\">
                                    ";
                // line 93
                echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete tracking"));
                echo "
                                </a>
                            </td>
                            <td>
                                <a href=\"";
                // line 97
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 98
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 99
($context["db"] ?? null), "goto" => PhpMyAdmin\Url::getFromRoute("/table/tracking"), "back" => PhpMyAdmin\Url::getFromRoute("/database/tracking"), "table" => twig_get_attribute($this->env, $this->source,                 // line 102
$context["version"], "table_name", [], "any", false, false, false, 102)], "", false);
                // line 103
                echo "\">
                                    ";
                // line 104
                echo PhpMyAdmin\Html\Generator::getIcon("b_versions", _gettext("Versions"));
                echo "
                                </a>
                                <a href=\"";
                // line 106
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 107
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 108
($context["db"] ?? null), "goto" => PhpMyAdmin\Url::getFromRoute("/table/tracking"), "back" => PhpMyAdmin\Url::getFromRoute("/database/tracking"), "table" => twig_get_attribute($this->env, $this->source,                 // line 111
$context["version"], "table_name", [], "any", false, false, false, 111), "report" => true, "version" => twig_get_attribute($this->env, $this->source,                 // line 113
$context["version"], "version", [], "any", false, false, false, 113)], "", false);
                // line 114
                echo "\">
                                    ";
                // line 115
                echo PhpMyAdmin\Html\Generator::getIcon("b_report", _gettext("Tracking report"));
                echo "
                                </a>
                                <a href=\"";
                // line 117
                echo PhpMyAdmin\Url::getFromRoute("/table/tracking");
                echo "\" data-post=\"";
                // line 118
                echo PhpMyAdmin\Url::getCommon(["db" =>                 // line 119
($context["db"] ?? null), "goto" => PhpMyAdmin\Url::getFromRoute("/table/tracking"), "back" => PhpMyAdmin\Url::getFromRoute("/database/tracking"), "table" => twig_get_attribute($this->env, $this->source,                 // line 122
$context["version"], "table_name", [], "any", false, false, false, 122), "snapshot" => true, "version" => twig_get_attribute($this->env, $this->source,                 // line 124
$context["version"], "version", [], "any", false, false, false, 124)], "", false);
                // line 125
                echo "\">
                                    ";
                // line 126
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
            // line 131
            echo "                </tbody>
            </table>
            ";
            // line 133
            $this->loadTemplate("select_all.twig", "database/tracking/tables.twig", 133)->display(twig_to_array(["text_dir" =>             // line 134
($context["text_dir"] ?? null), "form_name" => "trackedForm"]));
            // line 137
            echo "            <button class=\"btn btn-link mult_submit\" type=\"submit\" name=\"submit_mult\" value=\"delete_tracking\"
                    title=\"";
echo _gettext("Delete tracking");
            // line 138
            echo "\">
                ";
            // line 139
            echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete tracking"));
            echo "
            </button>
        </form>
    </div>
";
        }
        // line 144
        if (($context["untracked_tables_exists"] ?? null)) {
            // line 145
            echo "    <h3>";
echo _gettext("Untracked tables");
            echo "</h3>
    <form method=\"post\" action=\"";
            // line 146
            echo PhpMyAdmin\Url::getFromRoute("/database/tracking");
            echo "\" name=\"untrackedForm\"
        id=\"untrackedForm\" class=\"ajax\">
        ";
            // line 148
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
            echo "
        <table id=\"noversions\" class=\"table table-striped table-hover w-auto\">
            <thead>
                <tr>
                    <th></th>
                    <th>";
echo _gettext("Table");
            // line 153
            echo "</th>
                    <th>";
echo _gettext("Action");
            // line 154
            echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 158
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["untracked_tables"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["table_name"]) {
                // line 159
                echo "                  ";
                if ((PhpMyAdmin\Tracker::getVersion(($context["db"] ?? null), $context["table_name"]) ==  -1)) {
                    // line 160
                    echo "                    <tr>
                        <td class=\"text-center\">
                            <input type=\"checkbox\" name=\"selected_tbl[]\"
                                class=\"checkall\" id=\"selected_tbl_";
                    // line 163
                    echo twig_escape_filter($this->env, $context["table_name"], "html", null, true);
                    echo "\"
                                value=\"";
                    // line 164
                    echo twig_escape_filter($this->env, $context["table_name"], "html", null, true);
                    echo "\">
                        </td>
                        <th>
                            <label for=\"selected_tbl_";
                    // line 167
                    echo twig_escape_filter($this->env, $context["table_name"], "html", null, true);
                    echo "\">
                                ";
                    // line 168
                    echo twig_escape_filter($this->env, $context["table_name"], "html", null, true);
                    echo "
                            </label>
                        </th>
                        <td>
                            <a href=\"";
                    // line 172
                    echo PhpMyAdmin\Url::getFromRoute("/table/tracking", twig_array_merge(($context["url_params"] ?? null), ["db" =>                     // line 173
($context["db"] ?? null), "table" =>                     // line 174
$context["table_name"]]));
                    // line 175
                    echo "\">
                                ";
                    // line 176
                    echo PhpMyAdmin\Html\Generator::getIcon("eye", _gettext("Track table"));
                    echo "
                            </a>
                        </td>
                    </tr>
                  ";
                }
                // line 181
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "            </tbody>
        </table>
        ";
            // line 184
            $this->loadTemplate("select_all.twig", "database/tracking/tables.twig", 184)->display(twig_to_array(["text_dir" =>             // line 185
($context["text_dir"] ?? null), "form_name" => "untrackedForm"]));
            // line 188
            echo "        <button class=\"btn btn-link mult_submit\" type=\"submit\" name=\"submit_mult\" value=\"track\" title=\"";
echo _gettext("Track table");
            echo "\">
            ";
            // line 189
            echo PhpMyAdmin\Html\Generator::getIcon("eye", _gettext("Track table"));
            echo "
        </button>
    </form>
";
        }
    }

    public function getTemplateName()
    {
        return "database/tracking/tables.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 189,  380 => 188,  378 => 185,  377 => 184,  373 => 182,  367 => 181,  359 => 176,  356 => 175,  354 => 174,  353 => 173,  352 => 172,  345 => 168,  341 => 167,  335 => 164,  331 => 163,  326 => 160,  323 => 159,  319 => 158,  313 => 154,  309 => 153,  300 => 148,  295 => 146,  290 => 145,  288 => 144,  280 => 139,  277 => 138,  273 => 137,  271 => 134,  270 => 133,  266 => 131,  255 => 126,  252 => 125,  250 => 124,  249 => 122,  248 => 119,  247 => 118,  244 => 117,  239 => 115,  236 => 114,  234 => 113,  233 => 111,  232 => 108,  231 => 107,  228 => 106,  223 => 104,  220 => 103,  218 => 102,  217 => 99,  216 => 98,  213 => 97,  206 => 93,  203 => 92,  201 => 90,  200 => 87,  199 => 86,  196 => 85,  187 => 79,  179 => 73,  175 => 72,  173 => 69,  172 => 68,  171 => 67,  170 => 66,  164 => 61,  160 => 60,  158 => 57,  157 => 56,  156 => 55,  155 => 54,  147 => 48,  142 => 47,  133 => 42,  127 => 39,  121 => 36,  114 => 32,  110 => 31,  104 => 28,  100 => 27,  95 => 24,  91 => 23,  85 => 19,  81 => 18,  77 => 17,  73 => 16,  69 => 15,  65 => 14,  61 => 13,  52 => 8,  47 => 6,  43 => 4,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/tracking/tables.twig", "D:\\OSPanel\\domains\\phpmyadmin\\templates\\database\\tracking\\tables.twig");
    }
}
