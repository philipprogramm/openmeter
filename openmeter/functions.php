<?php
/**
 * @copyright Copyright (c) 2020 Philipp Stappert <mail@philipprogramm.de>
 *
 * @author Philipp Stappert <mail@philipprogramm.de>
 *
 * @license MIT License
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

/**
 * function to return all modals by presentation id
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $presId presentation id
 * 
 * @return array A array of all modals to create
 */
function getModals(string $presId){
    // get all modal folders
    $allModalFolders = new DirectoryIterator('data/' . $presId);

    // get types and content and add it to returner array
    $allModals = array();
    
    foreach ($allModalFolders as $modalFolder){
        // exclude dots
        if($modalFolder->isDot()) continue;
        
        // get modal json
        $modalSettings = file_get_contents('data/' . $presId . '/' . $modalFolder . '/modal.json');
        $modalSettings = json_decode($modalSettings, true);

        // add to all modals array
        array_push($allModals, $modalSettings);
    }

    // return array
    return($allModals);
}

/**
 * get modal by id
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $presId presentation id
 * @param int $modalId modal Id
 * 
 * @return array a array with modal information
 */
function getModalSettings(string $presId, int $modalId){
    $modalSettings = file_get_contents('data/' . $presId . '/' . $modalId . '/modal.json');
    $modalSettings = json_decode($modalSettings, true);
    
    return($modalSettings);
}

/**
 * function to include the modal
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param array $modalSettings Modal Settings from getModals()
 * @param int $modalId Modal ID (i)
 */
function getModalHtml(array $modalSettingsI, int $modalI){
    // prepare variables
    $modalId = $modalI;
    $modalSettings = $modalSettingsI;

    // include modal
    include('content/' . $modalSettings["type"] . '.php');
}

/**
 * function to get presentation informations
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $presId Presentation ID
 * 
 * @return array persentation information array
 */
function getPresentationInformations(string $presId){
    $info = json_decode(file_get_contents("data/" . $presId . ".json"),true);
    return($info);
}

/**
 * get actual modal position of specific presentation
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $presId Presentation ID
 * 
 * @return int actual modal position
 */
function getActModal(string $presId){
    $info = getPresentationInformations($presId);
    return(intval($info["act_modal_position"]));
}

/**
 * gets the modal viewer
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @param string $presId presentation id
 * @param int $modalId modal id
 * 
 * @return string viewer html
 */
function getModalHtmlViewer(string $presId, int $modalI){
    // get modal information
    $info = getModalSettings($presId, $modalI);

    // prepare variables
    $modalId = $modalI;

    // include modal
    include('viewer/' . $info["type"] . '.php');
}