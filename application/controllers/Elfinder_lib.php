<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Elfinder_lib extends CI_Controller
{

    public function manager()
    {
        $this->load->helper('url');
        $data['connector'] = site_url() . '/Elfinder_lib/connector';
        $this->load->view('elfinder', $data);
    }

    public function connector()
    {
        $this->load->helper('url');
        $opts = array(
            'roots' => array(
                array(
                    'driver'        => 'LocalFileSystem',
                    'path'          => FCPATH . '/files',
                    'URL'           => base_url('files'),
                    'uploadDeny'    => array('all'),                  // All Mimetypes not allowed to upload
                    'uploadAllow'   => array('image', 'text/plain', 'application/pdf'), // Mimetype `image` and `text/plain` allowed to upload
                    'uploadOrder'   => array('deny', 'allow'),        // allowed Mimetype `image` and `text/plain` only
                    'accessControl' => array($this, 'elfinderAccess'), // disable and hide dot starting files (OPTIONAL)
                    // more elFinder options here
                )
            ),
        );
        $connector = new elFinderConnector(new elFinder($opts));
        $connector->run();
    }

    public function elfinderAccess($attr, $path, $data, $volume, $isDir, $relpath)
    {
        $basename = basename($path);
        return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
            && strlen($relpath) !== 1           // but with out volume root
            ? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
            :  null;                                 // else elFinder decide it itself
    }
}
