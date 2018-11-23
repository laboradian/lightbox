<?php
/**
 * Lightbox Plugin: use lightbox
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     laboradian <laboradian@gmail.com>
 */
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC.'lib/plugins/');
require_once DOKU_PLUGIN.'action.php';

/**
 * Class action_plugin_lightbox
 */
class action_plugin_lightbox extends DokuWiki_Action_Plugin {
    /**
     * plugin should use this method to register its handlers with the DokuWiki's event controller
     *
     * @param    $controller   DokuWiki's event controller object. Also available as global $EVENT_HANDLER
     * @return   not required
     */
    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook(
            'CSS_STYLES_INCLUDED', 'BEFORE', $this, '_hookcss');

        $controller->register_hook(
            'JS_SCRIPT_LIST', 'BEFORE', $this, '_hookjs');
    }

    /**
     * Include lightbox's CSS file
     *
     * @param    $param   (mixed)   the parameters passed to register_hook when this handler was registered
     * @param    $event   (object)  event object by reference
     *
     * @return   not required
     */
    public function _hookcss(&$event, $param) {
        $event->data['files'][DOKU_PLUGIN.'lightbox/lightbox2/css/lightbox.css'] = DOKU_BASE.'lib/plugins/lightbox/';
    }

    /**
     * Include lightbox's JavaScript file
     *
     * @param    $param   (mixed)   the parameters passed to register_hook when this handler was registered
     * @param    $event   (object)  event object by reference
     *
     * @return   not required
     */
    public function _hookjs(&$event, $param) {
        $event->data[] = DOKU_PLUGIN.'lightbox/lightbox2/js/lightbox.js';
    }

    public function getInfo(){
      return array(
        'author' => 'laboradian',
        'email'  => 'laboradian@gmail.com',
        'date'   => '2018-11-23',
        'name'   => 'Lightbox plugin',
        'desc'   => 'Enable to use lightbox.js',
        'url'    => 'https://laboradian.com/',
      );
    }
}
