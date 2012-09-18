# PffTagItBundle

Huge thanks to the Mopa Bootstrap bundle for ideas on how to handle this!

## Installation

### Basic setup (include tag-it as well)

    {
        // ...
        "repositories": [
            {
                "type":"package",
                "package":{
                    "name":"aehlke/tag-it",
                    "version":"dev-master",
                    "source":{

                        "url":"git://github.com/aehlke/tag-it.git",
                        "type":"git",
                        "reference":"master"
                    }
                }
            }
        ],
        "require": {
            "pff/tag-it-bundle": "dev-master",
            "aehlke/tag-it": "dev-master"
        }
        // ...
    }

### Automatic linking to put tag-it in the right location

    {
        // ...
        "scripts": {
            "post-install-cmd": [
                "Pff\\Bundle\\TagItBundle\\Composer\\ScriptHandler::postInstallSymlinkTagIt"
            ],
            "post-update-cmd": [
                "Pff\\Bundle\\TagItBundle\\Composer\\ScriptHandler::postInstallSymlinkTagIt"
            ]
        }
        // ...
    }

### Add the form template to `config.yml`

    twig:
        form:
            resources:
                - 'PffTagItBundle:Form:fields.html.twig'

### In the template you want to use the Tag It form field in:

    {% block javascripts %}
        {{ parent() }}
        {% javascripts '@PffTagItBundle/Resources/tag-it/js/*.js' %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
    {% endblock javascripts %}
    {% block stylesheets %}
        {{ parent() }}
        {% stylesheets '@PffTagItBundle/Resources/css/jquery.tagit.css' output="css/compiled/tag-it.css" %}
            <link rel="stylesheet" type="text/css" href="{{ asset_url }}" />
        {% endstylesheets %}
    {% endblock stylesheets %}
