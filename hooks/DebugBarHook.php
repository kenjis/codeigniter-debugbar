<?php
/**
 * CodeIgniter Debug Bar
 *
 * @package     CodeIgniterDebugBar
 * @author      Anthony Tansens <atansens@gac-technology.com>
 * @license     http://opensource.org/licenses/MIT MIT
 * @since       Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class DebugBarHook
{
    public function addHeader()
    {
        $CI =& get_instance();

        if ( ! $CI->output->enable_profiler)
        {
            $CI->output->_display();
            return;
        }

        $head =<<<EOL
<!-- codeigniter-debugbar -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/github.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- end of codeigniter-debugbar -->
EOL;
        $output = $CI->output->get_output();
        $output = preg_replace('|</head>|i', $head.'</head>', $output, 1);

        $CI->output->set_output($output);
        $CI->output->_display();
    }
}
