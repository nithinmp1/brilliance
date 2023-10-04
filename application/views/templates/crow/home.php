<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$arrCategories = array();
foreach ($all_categories as $categorie) {
    if (isset($_GET['category']) && is_numeric($_GET['category']) && $_GET['category'] == $categorie['sub_for']) {
        $arrCategories[] = $categorie;
    }
    if (!isset($_GET['category']) || $_GET['category'] == '') {
        if ($categorie['sub_for'] == 0) {
            $arrCategories[] = $categorie;
        }
    }
}
?>
    
<div class="container" id="content">
    <div class="body">
    <div class="grid">
        <div id="quiz" class="centered grid__col--8 projection-div">
            <i id="mute-button" class="fa fa-volume-off audio" aria-hidden="true" ></i>
            <audio controls autoplay hidden id="background-music">
            <source src="upload/audio/bella-ciao-guitar-ahmadmousavipour-11996.mp3" type="audio/ogg">
            Your browser does not support the audio element.
            </audio>
            <div class="centered">
                <div class="row qiues-title">
                    <h1 >
                        <?=$quiz['title']?>
                    </h1>

                </div>
                <div class="quiz-box">
                    <div class="question-div">
                        <p id="progress" >Question 1 of 5</p>
                        <p id="question" class="headline-secondary--grouped"></p>
                        <h3 id="score"></h3>
                    </div>
                    <div class="options-div">
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="guess0">
                                        <label class="form-check-label" for="guess0">
                                            <p id="choice0"></p>
                                        </label>
                                    </input>
                                </div>        
                            </li>

                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="guess1">
                                    <label class="form-check-label" for="guess1">
                                        <p id="choice1"></p>
                                    </label>
                                </div>        
                            </li>

                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="guess2">
                                    <label class="form-check-label" for="guess2">
                                        <p id="choice2"></p>
                                    </label>
                                </div>        
                            </li>

                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="guess3">
                                    <label class="form-check-label" for="guess3">
                                        <p id="choice3"></p>
                                    </label>
                                </div>        
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row qiues-title">
                    
                </div>
            </div>
        </div>
    </div>
        <?php include 'bodyFooter.php' ?>
    </div>
</div>

<?php
$this->load->view('templates/crow/quiz-js', $footer);
?>