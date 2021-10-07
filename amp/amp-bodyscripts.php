<?php
/*
 * AMP Body Script Functions
 *
 * The AMP Body Scripts run in the document <body>. They must be included
 * before the navbar/additional body content.
 */
?>

<amp-analytics type="googleanalytics">
  <script type="application/json">
  {
    "vars": {
      "account": "UA-<?php echo get_option('unamunogoogleax'); ?>"
    },
    "triggers": {
      "trackPageview": {
        "on": "visible",
        "request": "pageview"
      },
      "trackEvent": {
        "selector": "#event-test",
        "on": "click",
        "request": "event",
        "vars": {
          "eventCategory": "ui-components",
          "eventAction": "click"
        }
      }
    }
  }
  </script>
</amp-analytics> <!-- Google Analytics end -->
