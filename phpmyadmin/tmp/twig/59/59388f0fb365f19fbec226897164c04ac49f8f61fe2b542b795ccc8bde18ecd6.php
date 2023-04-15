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

/* database/central_columns/main.twig */
class __TwigTemplate_e0cda3591991c1f5c0835775974590d76e517dffbee71520fd3274784a6de6ee extends Template
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
        echo "<div id=\"add_col_div\" class=\"topmargin\">
    <a href=\"#\">
        <span>";
        // line 4
        echo (((($context["total_rows"] ?? null) > 0)) ? ("+") : ("-"));
        echo "</span>";
echo _gettext("Add new column");
        // line 5
        echo "    </a>
    <form id=\"add_new\" class=\"new_central_col";
        // line 6
        echo (((($context["total_rows"] ?? null) != 0)) ? (" hide") : (""));
        echo "\"
        method=\"post\" action=\"";
        // line 7
        echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
        echo "\">
        ";
        // line 8
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
        <input type=\"hidden\" name=\"add_new_column\" value=\"add_new_column\">
        <div class=\"table-responsive\">
            <table class=\"table w-auto\">
                <thead>
                    <tr>
                        <th></th>
                        <th class=\"\" title=\"\" data-column=\"name\">
                            ";
echo _gettext("Name");
        // line 17
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"type\">
                            ";
echo _gettext("Type");
        // line 21
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"length\">
                            ";
echo _gettext("Length/Value");
        // line 25
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"default\">
                            ";
echo _gettext("Default");
        // line 29
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"collation\">
                            ";
echo _gettext("Collation");
        // line 33
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"attribute\">
                            ";
echo _gettext("Attribute");
        // line 37
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"isnull\">
                            ";
echo _gettext("Null");
        // line 41
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"\" title=\"\" data-column=\"extra\">
                            ";
echo _gettext("A_I");
        // line 45
        echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td name=\"col_name\" class=\"text-nowrap\">
                            ";
        // line 54
        $this->loadTemplate("columns_definitions/column_name.twig", "database/central_columns/main.twig", 54)->display(twig_to_array(["column_number" => 0, "ci" => 0, "ci_offset" => 0, "column_meta" => [], "has_central_columns_feature" => false, "max_rows" =>         // line 60
($context["max_rows"] ?? null)]));
        // line 62
        echo "                        </td>
                        <td name=\"col_type\" class=\"text-nowrap\">
                          <select class=\"column_type\" name=\"field_type[0]\" id=\"field_0_1\">
                            ";
        // line 65
        echo PhpMyAdmin\Util::getSupportedDatatypes(true);
        echo "
                          </select>
                        </td>
                        <td class=\"text-nowrap\" name=\"col_length\">
                          <input id=\"field_0_2\" type=\"text\" name=\"field_length[0]\" size=\"8\" value=\"\" class=\"textfield\">
                          <p class=\"enum_notice\" id=\"enum_notice_0_2\">
                            <a href=\"#\" class=\"open_enum_editor\">";
echo _gettext("Edit ENUM/SET values");
        // line 71
        echo "</a>
                          </p>
                        </td>
                        <td class=\"text-nowrap\" name=\"col_default\">
                          <select name=\"field_default_type[0]\" id=\"field_0_3\" class=\"default_type\">
                            <option value=\"NONE\">";
echo _pgettext("for default", "None");
        // line 76
        echo "</option>
                            <option value=\"USER_DEFINED\">";
echo _gettext("As defined:");
        // line 77
        echo "</option>
                            <option value=\"NULL\">NULL</option>
                            <option value=\"CURRENT_TIMESTAMP\">CURRENT_TIMESTAMP</option>
                          </select>
                          ";
        // line 81
        if ((($context["char_editing"] ?? null) == "textarea")) {
            // line 82
            echo "                            <textarea name=\"field_default_value[0]\" cols=\"15\" class=\"textfield default_value\"></textarea>
                          ";
        } else {
            // line 84
            echo "                            <input type=\"text\" name=\"field_default_value[0]\" size=\"12\" value=\"\" class=\"textfield default_value\">
                          ";
        }
        // line 86
        echo "                        </td>
                        <td name=\"collation\" class=\"text-nowrap\">
                          <select lang=\"en\" dir=\"ltr\" name=\"field_collation[0]\" id=\"field_0_4\">
                            <option value=\"\"></option>
                            ";
        // line 90
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 91
            echo "                              <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 91), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 91), "html", null, true);
            echo "\">
                                ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 92));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 93
                echo "                                  <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 93), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 93), "html", null, true);
                echo "\">";
                // line 94
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 94), "html", null, true);
                // line 95
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "                              </optgroup>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "                          </select>
                        </td>
                        <td class=\"text-nowrap\" name=\"col_attribute\">
                            ";
        // line 102
        $this->loadTemplate("columns_definitions/column_attribute.twig", "database/central_columns/main.twig", 102)->display(twig_to_array(["column_number" => 0, "ci" => 5, "ci_offset" => 0, "extracted_columnspec" => [], "column_meta" => [], "submit_attribute" => false, "attribute_types" =>         // line 109
($context["attribute_types"] ?? null)]));
        // line 111
        echo "                        </td>
                        <td class=\"text-nowrap\" name=\"col_isNull\">
                          <input name=\"field_null[0]\" id=\"field_0_6\" type=\"checkbox\" value=\"YES\" class=\"allow_null\">
                        </td>
                        <td class=\"text-nowrap\" name=\"col_extra\">
                          <input name=\"col_extra[0]\" id=\"field_0_7\" type=\"checkbox\" value=\"auto_increment\">
                        </td>
                        <td>
                            <input id=\"add_column_save\" class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Save");
        // line 119
        echo "\">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
";
        // line 127
        if ((($context["total_rows"] ?? null) <= 0)) {
            // line 128
            echo "  <div class=\"alert alert-info\" role=\"alert\">
    ";
echo _gettext("The central list of columns for the current database is empty");
            // line 130
            echo "  </div>
";
        } else {
            // line 132
            echo "    <table class=\"table table-borderless table-sm w-auto d-inline-block navigation\">
        <tr>
            <td class=\"navigation_separator\"></td>
            ";
            // line 135
            if (((($context["pos"] ?? null) - ($context["max_rows"] ?? null)) >= 0)) {
                // line 136
                echo "                <td>
                    <form action=\"";
                // line 137
                echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
                echo "\" method=\"post\">
                        ";
                // line 138
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"pos\" value=\"";
                // line 139
                echo twig_escape_filter($this->env, (($context["pos"] ?? null) - ($context["max_rows"] ?? null)), "html", null, true);
                echo "\">
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 140
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        <input class=\"btn btn-secondary ajax\" type=\"submit\" name=\"navig\" value=\"&lt\">
                    </form>
                </td>
            ";
            }
            // line 145
            echo "            ";
            if ((($context["tn_nbTotalPage"] ?? null) > 1)) {
                // line 146
                echo "                <td>
                    <form action=\"";
                // line 147
                echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
                echo "\" method=\"post\">
                        ";
                // line 148
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 149
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        ";
                // line 150
                echo ($context["tn_page_selector"] ?? null);
                echo "
                    </form>
                </td>
            ";
            }
            // line 154
            echo "            ";
            if (((($context["pos"] ?? null) + ($context["max_rows"] ?? null)) < ($context["total_rows"] ?? null))) {
                // line 155
                echo "                <td>
                    <form action=\"";
                // line 156
                echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
                echo "\" method=\"post\">
                        ";
                // line 157
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                        <input type=\"hidden\" name=\"pos\" value=\"";
                // line 158
                echo twig_escape_filter($this->env, (($context["pos"] ?? null) + ($context["max_rows"] ?? null)), "html", null, true);
                echo "\">
                        <input type=\"hidden\" name=\"total_rows\" value=\"";
                // line 159
                echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
                echo "\">
                        <input class=\"btn btn-secondary ajax\" type=\"submit\" name=\"navig\" value=\"&gt\">
                    </form>
                </td>
            ";
            }
            // line 164
            echo "            <td class=\"navigation_separator\"></td>
            <td>
                <span>";
echo _gettext("Filter rows");
            // line 166
            echo ":</span>
                <input type=\"text\" class=\"filter_rows\" placeholder=\"";
echo _gettext("Search this table");
            // line 167
            echo "\">
            </td>
            <td class=\"navigation_separator\"></td>
        </tr>
    </table>
";
        }
        // line 173
        echo "
<table class=\"table table-borderless table-sm w-auto d-inline-block\">
    <tr>
        <td class=\"navigation_separator largescreenonly\"></td>
        <td class=\"central_columns_navigation\">
            ";
        // line 178
        echo PhpMyAdmin\Html\Generator::getIcon("centralColumns_add", _gettext("Add column"));
        echo "
            <form id=\"add_column\" action=\"";
        // line 179
        echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
        echo "\" method=\"post\">
                ";
        // line 180
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
                <input type=\"hidden\" name=\"add_column\" value=\"add\">
                <input type=\"hidden\" name=\"pos\" value=\"";
        // line 182
        echo twig_escape_filter($this->env, ($context["pos"] ?? null), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"total_rows\" value=\"";
        // line 183
        echo twig_escape_filter($this->env, ($context["total_rows"] ?? null), "html", null, true);
        echo "\">
                ";
        // line 185
        echo "                <select name=\"table-select\" id=\"table-select\">
                    <option value=\"\" disabled=\"disabled\" selected=\"selected\">
                        ";
echo _gettext("Select a table");
        // line 188
        echo "                    </option>
                    ";
        // line 189
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 190
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["table"]);
            echo "\">";
            echo twig_escape_filter($this->env, $context["table"]);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "                </select>
                <select name=\"column-select\" id=\"column-select\">
                    <option value=\"\" selected=\"selected\">";
echo _gettext("Select a column.");
        // line 194
        echo "</option>
                </select>
                <input class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Add");
        // line 196
        echo "\">
            </form>
        </td>
        <td class=\"navigation_separator largescreenonly\"></td>
    </tr>
</table>
";
        // line 202
        if ((($context["total_rows"] ?? null) > 0)) {
            // line 203
            echo "    <form method=\"post\" id=\"del_form\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/database/central-columns");
            echo "\">
        ";
            // line 204
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
            echo "
        <input id=\"del_col_name\" type=\"hidden\" name=\"col_name\" value=\"\">
        <input type=\"hidden\" name=\"pos\" value=\"";
            // line 206
            echo twig_escape_filter($this->env, ($context["pos"] ?? null), "html", null, true);
            echo "\">
        <input type=\"hidden\" name=\"delete_save\" value=\"delete\">
    </form>
    <div id=\"tableslistcontainer\">
        <form name=\"tableslistcontainer\">
            <table id=\"table_columns\" class=\"table table-striped table-hover tablesorter w-auto\">
                ";
            // line 212
            $context["class"] = "column_heading";
            // line 213
            echo "                ";
            $context["title"] = _gettext("Click to sort.");
            // line 214
            echo "                <thead>
                    <tr>
                        <th class=\"";
            // line 216
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\"></th>
                        <th class=\"hide\"></th>
                        <th class=\"column_action\" colspan=\"2\">";
echo _gettext("Action");
            // line 218
            echo "</th>
                        <th class=\"";
            // line 219
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"name\">
                            ";
echo _gettext("Name");
            // line 221
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 223
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"type\">
                            ";
echo _gettext("Type");
            // line 225
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 227
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"length\">
                            ";
echo _gettext("Length/Value");
            // line 229
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 231
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"default\">
                            ";
echo _gettext("Default");
            // line 233
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 235
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"collation\">
                            ";
echo _gettext("Collation");
            // line 237
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 239
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"attribute\">
                            ";
echo _gettext("Attribute");
            // line 241
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 243
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"isnull\">
                            ";
echo _gettext("Null");
            // line 245
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                        <th class=\"";
            // line 247
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\" data-column=\"extra\">
                            ";
echo _gettext("A_I");
            // line 249
            echo "                            <div class=\"sorticon\"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 254
            $context["row_num"] = 0;
            // line 255
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 256
                echo "                        ";
                // line 257
                echo "                        <tr data-rownum=\"";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, ("f_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\">
                            ";
                // line 258
                echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
                echo "
                            <input type=\"hidden\" name=\"edit_save\" value=\"save\">
                            <td class=\"text-nowrap\">
                                <input type=\"checkbox\" class=\"checkall\" name=\"selected_fld[]\"
                                value=\"";
                // line 262
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["row"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["col_name"] ?? null) : null), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, ("checkbox_row_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\">
                            </td>
                            <td id=\"";
                // line 264
                echo twig_escape_filter($this->env, ("edit_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\" class=\"edit text-center\">
                                <a href=\"#\"> ";
                // line 265
                echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit"));
                echo "</a>
                            </td>
                            <td class=\"del_row\" data-rownum = \"";
                // line 267
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\">
                                <a hrf=\"#\">";
                // line 268
                echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete"));
                echo "</a>
                                <input type=\"submit\" data-rownum = \"";
                // line 269
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" class=\"btn btn-secondary edit_cancel_form\" value=\"";
                echo twig_escape_filter($this->env, _gettext("Cancel"), "html", null, true);
                echo "\">
                            </td>
                            <td id=\"";
                // line 271
                echo twig_escape_filter($this->env, ("save_" . ($context["row_num"] ?? null)), "html", null, true);
                echo "\" class=\"hide\">
                                <input type=\"submit\" data-rownum=\"";
                // line 272
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "\" class=\"btn btn-primary edit_save_form\" value=\"";
                echo twig_escape_filter($this->env, _gettext("Save"), "html", null, true);
                echo "\">
                            </td>
                            <td name=\"col_name\" class=\"text-nowrap\">
                                <span>";
                // line 275
                echo twig_escape_filter($this->env, (($__internal_compile_1 = $context["row"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["col_name"] ?? null) : null), "html", null, true);
                echo "</span>
                                <input name=\"orig_col_name\" type=\"hidden\" value=\"";
                // line 276
                echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["row"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["col_name"] ?? null) : null), "html", null, true);
                echo "\">
                                ";
                // line 277
                $this->loadTemplate("columns_definitions/column_name.twig", "database/central_columns/main.twig", 277)->display(twig_to_array(["column_number" =>                 // line 278
($context["row_num"] ?? null), "ci" => 0, "ci_offset" => 0, "column_meta" => ["Field" => (($__internal_compile_3 =                 // line 282
$context["row"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["col_name"] ?? null) : null)], "has_central_columns_feature" => false, "max_rows" =>                 // line 285
($context["max_rows"] ?? null)]));
                // line 287
                echo "                            </td>
                            <td name=\"col_type\" class=\"text-nowrap\">
                              <span>";
                // line 289
                echo twig_escape_filter($this->env, (($__internal_compile_4 = $context["row"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["col_type"] ?? null) : null), "html", null, true);
                echo "</span>
                              <select class=\"column_type\" name=\"field_type[";
                // line 290
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_1\">
                                ";
                // line 291
                echo PhpMyAdmin\Util::getSupportedDatatypes(true, (($__internal_compile_5 = ($context["types_upper"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[($context["row_num"] ?? null)] ?? null) : null));
                echo "
                              </select>
                            </td>
                            <td class=\"text-nowrap\" name=\"col_length\">
                              <span>";
                // line 295
                (((($__internal_compile_6 = $context["row"]) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["col_length"] ?? null) : null)) ? (print (twig_escape_filter($this->env, (($__internal_compile_7 = $context["row"]) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["col_length"] ?? null) : null), "html", null, true))) : (print ("")));
                echo "</span>
                              <input id=\"field_";
                // line 296
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_2\" type=\"text\" name=\"field_length[";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" size=\"8\" value=\"";
                echo twig_escape_filter($this->env, (($__internal_compile_8 = $context["row"]) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["col_length"] ?? null) : null), "html", null, true);
                echo "\" class=\"textfield\">
                              <p class=\"enum_notice\" id=\"enum_notice_";
                // line 297
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_2\">
                                <a href=\"#\" class=\"open_enum_editor\">";
echo _gettext("Edit ENUM/SET values");
                // line 298
                echo "</a>
                              </p>
                            </td>
                            <td class=\"text-nowrap\" name=\"col_default\">
                              ";
                // line 302
                if (twig_get_attribute($this->env, $this->source, $context["row"], "col_default", [], "array", true, true, false, 302)) {
                    // line 303
                    echo "                                <span>";
                    echo twig_escape_filter($this->env, (($__internal_compile_9 = $context["row"]) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["col_default"] ?? null) : null), "html", null, true);
                    echo "</span>
                              ";
                } else {
                    // line 305
                    echo "                                <span>";
echo _gettext("None");
                    echo "</span>
                              ";
                }
                // line 307
                echo "                              <select name=\"field_default_type[";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_3\" class=\"default_type\">
                                <option value=\"NONE\"";
                // line 308
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["rows_meta"] ?? null), ($context["row_num"] ?? null), [], "array", false, true, false, 308), "DefaultType", [], "array", true, true, false, 308) && ((($__internal_compile_10 = (($__internal_compile_11 = ($context["rows_meta"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[($context["row_num"] ?? null)] ?? null) : null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["DefaultType"] ?? null) : null) == "NONE"))) ? (" selected") : (""));
                echo ">
                                  ";
echo _pgettext("for default", "None");
                // line 310
                echo "                                </option>
                                <option value=\"USER_DEFINED\"";
                // line 311
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["rows_meta"] ?? null), ($context["row_num"] ?? null), [], "array", false, true, false, 311), "DefaultType", [], "array", true, true, false, 311) && ((($__internal_compile_12 = (($__internal_compile_13 = ($context["rows_meta"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[($context["row_num"] ?? null)] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["DefaultType"] ?? null) : null) == "USER_DEFINED"))) ? (" selected") : (""));
                echo ">
                                  ";
echo _gettext("As defined:");
                // line 313
                echo "                                </option>
                                <option value=\"NULL\"";
                // line 314
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["rows_meta"] ?? null), ($context["row_num"] ?? null), [], "array", false, true, false, 314), "DefaultType", [], "array", true, true, false, 314) && ((($__internal_compile_14 = (($__internal_compile_15 = ($context["rows_meta"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[($context["row_num"] ?? null)] ?? null) : null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["DefaultType"] ?? null) : null) == "NULL"))) ? (" selected") : (""));
                echo ">
                                  NULL
                                </option>
                                <option value=\"CURRENT_TIMESTAMP\"";
                // line 317
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["rows_meta"] ?? null), ($context["row_num"] ?? null), [], "array", false, true, false, 317), "DefaultType", [], "array", true, true, false, 317) && ((($__internal_compile_16 = (($__internal_compile_17 = ($context["rows_meta"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[($context["row_num"] ?? null)] ?? null) : null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["DefaultType"] ?? null) : null) == "CURRENT_TIMESTAMP"))) ? (" selected") : (""));
                echo ">
                                  CURRENT_TIMESTAMP
                                </option>
                              </select>
                              ";
                // line 321
                if ((($context["char_editing"] ?? null) == "textarea")) {
                    // line 322
                    echo "                                <textarea name=\"field_default_value[";
                    echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                    echo "]\" cols=\"15\" class=\"textfield default_value\">";
                    echo twig_escape_filter($this->env, (($__internal_compile_18 = ($context["default_values"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[($context["row_num"] ?? null)] ?? null) : null), "html", null, true);
                    echo "</textarea>
                              ";
                } else {
                    // line 324
                    echo "                                <input type=\"text\" name=\"field_default_value[";
                    echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                    echo "]\" size=\"12\" value=\"";
                    echo twig_escape_filter($this->env, (($__internal_compile_19 = ($context["default_values"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[($context["row_num"] ?? null)] ?? null) : null), "html", null, true);
                    echo "\" class=\"textfield default_value\">
                              ";
                }
                // line 326
                echo "                            </td>
                            <td name=\"collation\" class=\"text-nowrap\">
                                <span>";
                // line 328
                echo twig_escape_filter($this->env, (($__internal_compile_20 = $context["row"]) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20["col_collation"] ?? null) : null), "html", null, true);
                echo "</span>
                                <select lang=\"en\" dir=\"ltr\" name=\"field_collation[";
                // line 329
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_4\">
                                  <option value=\"\"></option>
                                  ";
                // line 331
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                    // line 332
                    echo "                                    <optgroup label=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 332), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 332), "html", null, true);
                    echo "\">
                                      ";
                    // line 333
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 333));
                    foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                        // line 334
                        echo "                                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 334), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 334), "html", null, true);
                        echo "\"";
                        // line 335
                        echo (((twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 335) == (($__internal_compile_21 = $context["row"]) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["col_collation"] ?? null) : null))) ? (" selected") : (""));
                        echo ">";
                        // line 336
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 336), "html", null, true);
                        // line 337
                        echo "</option>
                                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 339
                    echo "                                    </optgroup>
                                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 341
                echo "                                </select>
                            </td>
                            <td class=\"text-nowrap\" name=\"col_attribute\">
                                <span>";
                // line 344
                (((($__internal_compile_22 = $context["row"]) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["col_attribute"] ?? null) : null)) ? (print (twig_escape_filter($this->env, (($__internal_compile_23 = $context["row"]) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["col_attribute"] ?? null) : null), "html", null, true))) : (print ("")));
                echo "</span>
                                ";
                // line 345
                $this->loadTemplate("columns_definitions/column_attribute.twig", "database/central_columns/main.twig", 345)->display(twig_to_array(["column_number" =>                 // line 346
($context["row_num"] ?? null), "ci" => 5, "ci_offset" => 0, "extracted_columnspec" => [], "column_meta" => (($__internal_compile_24 =                 // line 350
$context["row"]) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["col_attribute"] ?? null) : null), "submit_attribute" => false, "attribute_types" =>                 // line 352
($context["attribute_types"] ?? null)]));
                // line 354
                echo "                            </td>
                            <td class=\"text-nowrap\" name=\"col_isNull\">
                                <span>";
                // line 356
                echo twig_escape_filter($this->env, (((($__internal_compile_25 = $context["row"]) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["col_isNull"] ?? null) : null)) ? (_gettext("Yes")) : (_gettext("No"))), "html", null, true);
                echo "</span>
                                <input name=\"field_null[";
                // line 357
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_6\" type=\"checkbox\" value=\"YES\" class=\"allow_null\"";
                // line 358
                echo (((( !twig_test_empty((($__internal_compile_26 = $context["row"]) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["col_isNull"] ?? null) : null)) && ((($__internal_compile_27 = $context["row"]) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["col_isNull"] ?? null) : null) != "NO")) && ((($__internal_compile_28 = $context["row"]) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["col_isNull"] ?? null) : null) != "NOT NULL"))) ? (" checked") : (""));
                echo ">
                            </td>
                            <td class=\"text-nowrap\" name=\"col_extra\">
                              <span>";
                // line 361
                echo twig_escape_filter($this->env, (($__internal_compile_29 = $context["row"]) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29["col_extra"] ?? null) : null), "html", null, true);
                echo "</span>
                              <input name=\"col_extra[";
                // line 362
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "]\" id=\"field_";
                echo twig_escape_filter($this->env, ($context["row_num"] ?? null), "html", null, true);
                echo "_7\" type=\"checkbox\" value=\"auto_increment\"";
                // line 363
                echo ((( !twig_test_empty((($__internal_compile_30 = $context["row"]) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30["col_extra"] ?? null) : null)) && ((($__internal_compile_31 = $context["row"]) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["col_extra"] ?? null) : null) == "auto_increment"))) ? (" checked") : (""));
                echo ">
                            </td>
                        </tr>
                        ";
                // line 366
                $context["row_num"] = (($context["row_num"] ?? null) + 1);
                // line 367
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 368
            echo "                </tbody>
            </table>

            ";
            // line 371
            $this->loadTemplate("select_all.twig", "database/central_columns/main.twig", 371)->display(twig_to_array(["text_dir" =>             // line 372
($context["text_dir"] ?? null), "form_name" => "tableslistcontainer"]));
            // line 375
            echo "            <button class=\"btn btn-link mult_submit change_central_columns\" type=\"submit\" name=\"edit_central_columns\"
                    value=\"edit central columns\" title=\"";
echo _gettext("Edit");
            // line 376
            echo "\">
                ";
            // line 377
            echo PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit"));
            echo "
            </button>
            <button class=\"btn btn-link mult_submit\" type=\"submit\" name=\"delete_central_columns\"
                    value=\"remove_from_central_columns\" title=\"";
echo _gettext("Delete");
            // line 380
            echo "\">
                ";
            // line 381
            echo PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Delete"));
            echo "
            </button>
        </form>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "database/central_columns/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  873 => 381,  870 => 380,  863 => 377,  860 => 376,  856 => 375,  854 => 372,  853 => 371,  848 => 368,  842 => 367,  840 => 366,  834 => 363,  829 => 362,  825 => 361,  819 => 358,  814 => 357,  810 => 356,  806 => 354,  804 => 352,  803 => 350,  802 => 346,  801 => 345,  797 => 344,  792 => 341,  785 => 339,  778 => 337,  776 => 336,  773 => 335,  767 => 334,  763 => 333,  756 => 332,  752 => 331,  745 => 329,  741 => 328,  737 => 326,  729 => 324,  721 => 322,  719 => 321,  712 => 317,  706 => 314,  703 => 313,  698 => 311,  695 => 310,  690 => 308,  683 => 307,  677 => 305,  671 => 303,  669 => 302,  663 => 298,  658 => 297,  650 => 296,  646 => 295,  639 => 291,  633 => 290,  629 => 289,  625 => 287,  623 => 285,  622 => 282,  621 => 278,  620 => 277,  616 => 276,  612 => 275,  604 => 272,  600 => 271,  593 => 269,  589 => 268,  585 => 267,  580 => 265,  576 => 264,  569 => 262,  562 => 258,  555 => 257,  553 => 256,  548 => 255,  546 => 254,  539 => 249,  532 => 247,  528 => 245,  521 => 243,  517 => 241,  510 => 239,  506 => 237,  499 => 235,  495 => 233,  488 => 231,  484 => 229,  477 => 227,  473 => 225,  466 => 223,  462 => 221,  455 => 219,  452 => 218,  446 => 216,  442 => 214,  439 => 213,  437 => 212,  428 => 206,  423 => 204,  418 => 203,  416 => 202,  408 => 196,  403 => 194,  398 => 192,  387 => 190,  383 => 189,  380 => 188,  375 => 185,  371 => 183,  367 => 182,  362 => 180,  358 => 179,  354 => 178,  347 => 173,  339 => 167,  335 => 166,  330 => 164,  322 => 159,  318 => 158,  314 => 157,  310 => 156,  307 => 155,  304 => 154,  297 => 150,  293 => 149,  289 => 148,  285 => 147,  282 => 146,  279 => 145,  271 => 140,  267 => 139,  263 => 138,  259 => 137,  256 => 136,  254 => 135,  249 => 132,  245 => 130,  241 => 128,  239 => 127,  229 => 119,  218 => 111,  216 => 109,  215 => 102,  210 => 99,  203 => 97,  196 => 95,  194 => 94,  188 => 93,  184 => 92,  177 => 91,  173 => 90,  167 => 86,  163 => 84,  159 => 82,  157 => 81,  151 => 77,  147 => 76,  139 => 71,  129 => 65,  124 => 62,  122 => 60,  121 => 54,  110 => 45,  104 => 41,  98 => 37,  92 => 33,  86 => 29,  80 => 25,  74 => 21,  68 => 17,  56 => 8,  52 => 7,  48 => 6,  45 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/central_columns/main.twig", "D:\\OSPanel\\domains\\phpmyadmin\\templates\\database\\central_columns\\main.twig");
    }
}
