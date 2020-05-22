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

// generate labels
$labels = json_encode($info["choices"]);

// get answers
$mcData = getMultipleChoiceData($presId, $modalId);
$mcData = json_encode($mcData);

?>
<h1><?php echo $info["title"]; ?></h1>
<canvas id="chart" width="400" height="400"></canvas>

<script>
    var ctx = $('#chart');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo $labels; ?>,
            datasets: [{
                label: 'Nummer der Votings',
                data: <?php echo $mcData; ?>,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.3)',
                    'rgba(0, 255, 0, 0.3)',
                    'rgba(0, 0, 255, 0.3)',
                    'rgba(192,192,192,0.3)',
                    'rgba(255,255,0,0.3)',
                    'rgba(255,0,255,0.3)',
                    'rgba(255, 0, 0, 0.3)',
                    'rgba(0, 255, 0, 0.3)',
                    'rgba(0, 0, 255, 0.3)',
                    'rgba(192,192,192,0.3)',
                    'rgba(255,255,0,0.3)',
                    'rgba(255,0,255,0.3)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                labels: {
                    fontColor: 'rgb(255, 255, 255)'
                }
            }<?php
                // on reload, don't animate
                if(isset($_GET["reload"])){
            ?>,
            animation:{
                duration: 0
            }
            <?php
                }
            ?>
        }
    });

    // auto reload
    setTimeout(function(){
        document.location = "presentation.php?id=<?php echo $presId; ?>&page=<?php echo $modalId; ?>&reload=true"
    }, 5000);
</script>