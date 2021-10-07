<?php
/**
 * AMP Animation Script
 *
 * The Animation Script runs after testing for the animation page.
 */
?>
<amp-animation id="anim1" layout="nodisplay" trigger="visibility">
<script type="application/json">
{
"duration": "1s",
"iterations": "4",
"fill": "both",
"direction": "alternate",
"animation": "anim-rain",
"--max-delay": "5s"
  }
</script>
</amp-animation>

<amp-animation id="anim-rain" layout="nodisplay">
<script type="application/json">
{
"selector": ".drop",
"--delay": "rand(0.1s, var(--max-delay))",
"delay": "var(--delay)",
"direction": "normal",
"subtargets": [
  {
    "index": 0,
    "direction": "reverse"
  },
  {
    "selector": ".antigrav",
    "direction": "reverse",
    "--delay": "0s"
  }
],
"keyframes": {"transform": "translateY(120vh)"}
}
</script>
</amp-animation>
