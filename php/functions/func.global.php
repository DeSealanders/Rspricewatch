<?php

/**
 * Magic function called whenever an unknown class is to be loaded
 * @param $className
 */
if(!function_exists('__autoload')) {
    function __autoload($className)
    {
        // Folders to search
        $folders = getSubfolders('php/');

        // Filesname to search for classes
        $filenames = array(
            'class' => 'class.' . $className . '.php',
            'default' => $className . '.php',
        );

        // Also search for namespaced classes
        $array = explode('\\', $className);
        if(count($array) > 1) {
            $filenames['default'] = $array[count($array)-1] . '.php';
        }

        // Loop all folder & filename combinations and include if a file is found
        foreach ($folders as $filepath) {
            foreach($filenames as $filename) {
                if (file_exists($filepath . $filename)) {
                    include $filepath . $filename;
                    break;
                }
            }
        }
    }
}

/**
 * Recursively retrieve all subfolders for a specified folder
 * @param $folder the parent folder of which subfolders should be retrieved from
 * @return array a list of subfolders
 */
if(!function_exists('getSubfolders')) {
    function getSubfolders($folder) {
        $folderList = array();
        foreach(scandir($folder) as $file) {
            $folderString = $folder . $file . '/';
            if(is_dir($folderString)) {
                if($file != '.' && $file != '..') {
                    $folderList[] = $folderString;
                    $folderList = array_merge($folderList, getSubfolders($folderString));
                }
            }
        }
        return $folderList;
    }
}

/**
 * Check if live or local by ip
 * @return bool true if live, false of local
 */
if(!function_exists('isLive')) {
    function isLive()
    {
        if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
            return false;
        }
        return true;
    }
}