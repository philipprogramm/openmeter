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

// variables
var modalPos = -1;

// functions

// function to check if new modal is avaliable
function checkNewModalAvaliable(){
    $.get("backend.php?request=modalPos&id=" + presId, 
        function(data){
            if(parseInt(data) != modalPos){
                hideModal(modalPos);
                modalPos = parseInt(data);
                displayModal(modalPos);
            }
        }
    );
    
    // retrigger self
    setTimeout(checkNewModalAvaliable, 3000);
}

// function to display new modal
function displayModal(modalId){
    $('#modal' + modalId).modal('show');
}

// function to hide a modal
function hideModal(modalId){
    $('#modal' + modalId).modal('hide');
}

// multiple choice: show send button if option is clicked
$('.validateclick').click(function(){
    $('.sendbutton').removeAttr("disabled");
})

// multiple choice: save choice
$('.sendbutton').click(function(){
    var choice = $("input[name='multiplechoice" + modalPos + "']:checked").val();
    $.get("backend.php?request=saveMC&id=" + presId + "&choice=" + choice + "&modalid=" + modalPos);
})

// wordcloud: send choice if input is filled
$('.wc-send').click(function(){
    if($('#wordcloud-input' + modalPos).val() != ""){
        var word = $('#wordcloud-input' + modalPos).val();
        $.get("backend.php?request=saveWC&id=" + presId + "&word=" + word + "&modalid=" + modalPos);
        hideModal(modalPos);
    }
})

// wordcloud: send choice if input is filled and reopen modal to enter more words
$('.wc-sendmore').click(function(){
    if($('#wordcloud-input').val() != ""){
        var word = $('#wordcloud-input' + modalPos).val();
        $.get("backend.php?request=saveWC&id=" + presId + "&word=" + word + "&modalid=" + modalPos);
        $('#wordcloud-input' + modalPos).val("");
    }
})

// load script
$(document).ready(function(){
    setTimeout(checkNewModalAvaliable, 1000);
})