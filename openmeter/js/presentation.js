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
**/

// function to switch presentation page to the next with keys (39, 34, 40)
$(document).keydown(function(e) {
    if (e.which == '39' || e.which == '34' || e.which == '40'){
        var nextPage = pageId + 1;
        document.location = "presentation.php?id=" + presId + "&page=" + nextPage;
    }
});

// function to switch presentation page to the last page with keys (37, 38, 33)
$(document).keydown(function(e) {
    if (e.which == '37' || e.which == '38' || e.which == '33'){
        var lastPage = pageId - 1;
        document.location = "presentation.php?id=" + presId + "&page=" + lastPage;
    }
});