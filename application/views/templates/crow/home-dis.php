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
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900");
        .grid:after {
        content: "";
        display: table;
        clear: both; }

        .srt, .form__label--hidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px; }

        .panel--centered, .panel--padded--centered, [class^="btn--"] {
        text-align: center; }

        [class^="progbar__"]:after, .icn--nav-toggle:before {
        display: block;
        content: '';
        position: absolute; }

        .centered, .grid {
        float: none;
        margin-left: auto;
        margin-right: auto; }

        html {
        font-family: sans-serif;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

        body {
        margin: 0;
        padding-top: 2.5em; }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        nav,
        section,
        summary {
        display: block; }

        audio,
        canvas,
        progress,
        video {
        display: inline-block;
        vertical-align: baseline; }

        audio:not([controls]) {
        display: none;
        height: 0; }

        [hidden],
        template {
        display: none; }

        a {
        background: transparent; }

        a:active,
        a:hover {
        outline: 0; }

        abbr[title] {
        border-bottom: 1px dotted; }

        b,
        strong {
        font-weight: bold; }

        dfn {
        font-style: italic; }

        h1 {
        font-size: 2em;
        margin: 0.67em 0; }

        mark {
        background: #ff0;
        color: #000; }

        small {
        font-size: 80%; }

        sub,
        sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline; }

        sup {
        top: -0.5em; }

        sub {
        bottom: -0.25em; }

        img {
        border: 0; }

        svg:not(:root) {
        overflow: hidden; }

        figure {
        margin: 1em 40px; }

        hr {
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        height: 0; }

        pre {
        overflow: auto; }

        code,
        kbd,
        pre,
        samp {
        font-family: monospace, monospace;
        font-size: 1em; }

        button,
        input,
        optgroup,
        select,
        textarea {
        color: inherit;
        font: inherit;
        margin: 0; }

        button {
        overflow: visible; }

        button,
        select {
        text-transform: none; }

        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer; }

        button[disabled],
        html input[disabled] {
        cursor: default; }

        button::-moz-focus-inner,
        input::-moz-focus-inner {
        border: 0;
        padding: 0; }

        input {
        line-height: normal; }

        *
        input[type="checkbox"],
        input[type="radio"] {
        box-sizing: border-box;
        padding: 0; }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
        height: auto; }

        input[type="search"] {
        -webkit-appearance: textfield;
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        box-sizing: content-box; }

        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none; }

        fieldset {
        border: 1px solid #c0c0c0;
        margin: 0 2px;
        padding: 0.35em 0.625em 0.75em; }

        legend {
        border: 0;
        padding: 0; }

        textarea {
        overflow: auto; }

        optgroup {
        font-weight: bold; }

        table {
        border-collapse: collapse;
        border-spacing: 0; }

        td,
        th {
        padding: 0; }

        * {
        -moz-box-sizing: border-box;
        box-sizing: border-box; }

        body {
        color: #797e83;
        font-size: 16px;
        font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
        line-height: 1.5; }

        h3 {
        font-size: 1.125em; }

        h4 {
        margin-top: 1.375em;
        margin-bottom: 2.57143em;
        color: #d6d7d9;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 400;
        font-size: 0.875em; }
        @media (min-width: 769px) {
            h4 {
            margin-top: 2.625em; } }

        a {
        color: #656a6e;
        text-decoration: none;
        font-weight: 400; }

        p {
        margin: .8em 0;
        font-weight: 300;
        font-size: 1.125em;
        line-height: 1.5; }

        blockquote {
        font-weight: 300;
        font-style: italic;
        font-size: 1.25em; }
        @media (min-width: 769px) {
            blockquote {
            margin: 1.33333em 0;
            padding: 0 0 0 5%;
            border-left: 0.33333em solid #ebecec;
            font-size: 1.5em; } }

        ul,
        li {
        margin: 0;
        padding: 0;
        list-style-type: none; }

        img {
        margin-bottom: 1.5em;
        max-width: 100%;
        height: auto; }

        input,
        textarea {
        display: block;
        padding: 15px;
        width: 100%;
        outline: 0;
        border: 0; }

        input:focus,
        textarea:focus {
        transition: 0.3s; }

        button {
        outline: 0; }

        footer {
        border-top: 1px solid #ebecec;
        margin-top: 1.375em; }
        footer p {
            font-size: 1em;
            margin-top: 1.375em; }

        .panel, .panel--centered {
        padding-top: 1.875em; }
        @media (min-width: 769px) {
            .panel, .panel--centered {
            padding-bottom: 1.25em; } }

        .panel--padded, .panel--padded--centered {
        padding-top: 2.125em; }
        @media (min-width: 769px) {
            .panel--padded, .panel--padded--centered {
            padding-top: 5em;
            padding-bottom: 2.125em; } }

        .grid {
        width: 90%; }
        [class*="grid__col--"] > .grid {
            width: 100%; }
        @media (min-width: 1100px) {
            .grid {
            max-width: 1050px; } }

        @media (min-width: 769px) {
        .grid__col--1 {
            width: 6.5%; }
        .grid__col--2 {
            width: 15%; }
        .grid__col--3 {
            width: 23.5%; }
        .grid__col--4 {
            width: 32%; }
        .grid__col--5 {
            width: 40.5%; }
        .grid__col--6 {
            width: 49%; }
        .grid__col--7 {
            width: 57.5%; }
        .grid__col--8 {
            width: 66%; }
        .grid__col--9 {
            width: 74.5%; }
        .grid__col--10 {
            width: 83%; }
        .grid__col--11 {
            width: 91.5%; }
        .grid__col--12 {
            width: 100%; } }

        @media (min-width: 1px) and (max-width: 768px) {
        [class^="grid__col--"] {
            margin-top: 0.75em;
            margin-bottom: 0.75em; } }
        @media (min-width: 769px) {
        [class^="grid__col--"] {
            float: left;
            min-height: 1px;
            padding-left: 10px;
            padding-right: 10px; }
            [class^="grid__col--"] + [class^="grid__col--"] {
            margin-left: 2%; }
            [class^="grid__col--"]:last-of-type {
            float: right; } }

        .theme__poly .grid [class*="grid__col"] {
        font-weight: 100;
        margin-bottom: 1em;
        padding: 1.75%; }

        @media (min-width: 769px) {
        .nav__item, .nav__item--current {
            display: inline-block;
            margin: 0 0.625em; } }

        .nav__item--current a, .nav__item a {
        font-weight: 300;
        text-align: center;
        font-size: 1.125em;
        display: block;
        padding: 0.4em;
        border-bottom: 1px solid transparent; }
        @media (min-width: 1px) and (max-width: 768px) {
            .nav__item--current a, .nav__item a {
            border-bottom-color: #ebecec;
            padding-top: 0.77778em;
            padding-bottom: 0.77778em; } }

        .nav__item--current a, .nav__item a:hover {
        color: #0b0b0b;
        border-color: #52bab3; }

        h1, .headline-primary, .headline-primary--grouped {
        color: #525559;
        font-weight: 300;
        font-size: 2.625em;
        line-height: 1.09524;
        margin-top: 0; }

        h2, .headline-secondary, .headline-secondary--grouped {
            color: #999da1;
            letter-spacing: 1px;
            font-weight: 300;
            font-size: 1.5em;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: bold;
        }

        .form__btn, [class^="btn--"] {
        padding: 10px 20px;
        border: 0;
        border-radius: 0.4em;
        color: #fff;
        text-transform: uppercase;
        font-size: 0.875em;
        font-weight: 400;
        transition: opacity 0.3s;
        display: block; }
        .form__btn:hover, [class^="btn--"]:hover {
            opacity: .75; }
        .form__btn:active, [class^="btn--"]:active {
            opacity: initial; }

        .menu__link, .menu__link--end {
        display: block;
        padding-top: 1em;
        padding-bottom: 1em;
        color: #fff;
        text-align: center;
        text-shadow: 0 1px rgba(11, 11, 11, 0.2);
        font-size: 1.125em; }

        .icn--nav-toggle, .icn--close {
        line-height: 0;
        cursor: pointer; }

        .img--wrap {
        border: 1px solid #d6d7d9;
        padding: 0.75em; }
        .img--avatar {
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50%; }
        @media (min-width: 769px) {
            .img--avatar {
            margin-top: 1.5em; } }
        @media (min-width: 769px) {
        .img--hero {
            margin-bottom: 2.625em; } }

        .headline-primary {
        margin-bottom: 1.66667em; }
        .headline-primary--grouped {
            margin-bottom: 0; }
        .headline-secondary {
        margin-bottom: 0.91667em; }
        .headline-secondary--grouped {
            margin-top: 0.41667em;
            margin-bottom: 2.25em; }

        .form__label {
        display: block;
        margin-bottom: 0.625em; }
        .form__input {
        font-size: 1.125em;
        margin-bottom: 1.11111em;
        border-bottom: 6px solid #d6d7d9;
        border-radius: 0.4em;
        background: #ebecec;
        color: black;
        font-weight: 300; }
        .form__input:focus {
            border-color: #52bab3; }
        .form__btn {
        background: #52bab3; }

        .btn--default {
        background-color: #52bab3; }
        .btn--success {
        background-color: #5ece7f; }
        .btn--error {
        background-color: #e67478; }
        .btn--warning {
        background-color: #ff784f; }
        .btn--info {
        background-color: #9279c3; }

        [class^="btn--"] {
        margin-bottom: 1.42857em; }
        @media (min-width: 1px) and (max-width: 768px) {
            [class^="btn--"] {
            width: 100%; } }
        @media (min-width: 769px) {
            [class^="btn--"] {
            width: auto;
            display: inline-block; }
            [class^="btn--"] + [class^="btn--"] {
                margin-left: 20px; } }

        .navbar {
        position: relative; }
        @media (min-width: 769px) {
            .navbar {
            margin-top: 3.375em;
            margin-bottom: 0; } }

        .nav {
        margin-top: 1.25em;
        margin-bottom: 1.875em; }
        .nav__item a {
            color: #797e83; }

        .offcanvas {
        position: relative;
        padding: 0.625em;
        letter-spacing: 1px;
        background: #39add1;
        background: linear-gradient(45deg, rgba(94, 206, 127, 0.8) 0%, #39add1 100%); }

        .menu {
        margin-top: 1.25em; }
        .menu__link {
            border-bottom: solid 1px rgba(255, 255, 255, 0.3); }

        .progbar {
        height: 4px;
        border-radius: 2px;
        background: #d6d7d9;
        position: relative;
        margin-bottom: 2.875em; }
        .progbar__status--default {
            background-color: #52bab3; }
            .progbar__status--default:after {
            background-color: #6fc6c0; }
        .progbar__status--success {
            background-color: #5ece7f; }
            .progbar__status--success:after {
            background-color: #7dd898; }
        .progbar__status--error {
            background-color: #e67478; }
            .progbar__status--error:after {
            background-color: #ec979a; }
        .progbar__status--warning {
            background-color: #ff784f; }
            .progbar__status--warning:after {
            background-color: #ff9778; }
        .progbar__status--info {
            background-color: #9279c3; }
            .progbar__status--info:after {
            background-color: #a995d0; }

        [class^="progbar__"] {
        display: block;
        width: 50%;
        height: 100%;
        border-radius: inherit;
        position: relative; }
        [class^="progbar__"]:after {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            right: -10px;
            top: -8px; }

        .site-logo {
        background-image: url("../img/logo.svg");
        background-repeat: no-repeat;
        width: 115px;
        height: 45px;
        display: inline-block; }

        .icn--nav-toggle {
        width: 25px;
        height: 17px;
        border-top: solid 3px #797e83;
        border-bottom: solid 3px #797e83;
        position: relative; }
        .icn--nav-toggle:before {
            width: 25px;
            height: 3px;
            background: #999da1;
            top: 4px; }
        .icn--close {
        background-image: url("../img/icn-close.svg");
        background-repeat: no-repeat;
        width: 20px;
        height: 20px;
        display: block;
        position: absolute;
        right: 4%;
        top: 4%; }

        @media (min-width: 1px) and (max-width: 768px) {
        .is-displayed-mobile {
            display: block; }
            .is-hidden-mobile {
            display: none; } }
        @media (min-width: 769px) {
        .is-displayed-mobile {
            display: none; } }

        @media (min-width: 1px) and (max-width: 768px) {
        .is-collapsed-mobile {
            visibility: collapse;
            padding: 0;
            height: 0;
            margin: 0;
            line-height: 0; } }

        .theme__poly .grid__col--12 {
        background-color: #DEF4E5; }

        .theme__poly .grid__col--8 {
        background-color: #DCE0F2; }

        .theme__poly .grid__col--7 {
        background-color: #DCF0EF; }

        .theme__poly .grid__col--6 {
        background-color: #FFE3DB; }

        .theme__poly .grid__col--4 {
        background-color: #F8EDD0; }

        .theme__poly .grid__col--5 {
        background-color: #EAEBEC; }

        .theme__poly .grid__col--2 {
        background-color: #C5E2CE; }

        .theme__poly .grid__col--3 {
        background-color: #D6EEF5; }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }

        /* Apply the animation to an element with the "shake" class */
        .shake {
            animation: shake 0.5s ease-in-out;
            border: 2px solid #3498db; /* You can change the color code to your desired color */
            padding: 10px; /* Optional: Add padding for better appearance */
        }
    </style>
<div class="container">
    <div class="body">
    <div class="grid">
        <div id="quiz" class="centered grid__col--8">
            <h1><?=$quiz['title']?></h1>
            <h2 id="question" class="headline-secondary--grouped"></h2>
            <h3 id="score"></h3>
            <p id="choice0"></p>
            <button id="guess0" class="btn--default">Select Answer</button>
            <p id="choice1"></p>
            <button id="guess1" class="btn--default">Select Answer</button>
            <p id="choice2"></p>
            <button id="guess2" class="btn--default">Select Answer</button>
            <p id="choice3"></p>
            <button id="guess3" class="btn--default">Select Answer</button>
            
        </div>
    </div>
        <?php include 'bodyFooter.php' ?>
    </div>
</div>
    <p id="progress">Question 1 of 5</p>
    <script>
        function Quiz(questions) {
            this.score = 0;
            this.questions = questions;
            this.currentQuestionIndex = 0;
            }

        Quiz.prototype.guess = function(answer) {
            if(this.getCurrentQuestion().isCorrectAnswer(answer)) {
                this.score++;
            }
            this.currentQuestionIndex++;
        };

        Quiz.prototype.getCurrentQuestion = function() {
            return this.questions[this.currentQuestionIndex];
        };

        Quiz.prototype.hasEnded = function() {
            return this.currentQuestionIndex >= this.questions.length;
        };
        function Question(text, choices, answer) {
            this.text = text;
            this.choices = choices;
            this.answer = answer;
        }

        Question.prototype.isCorrectAnswer = function (choice) {
            return this.answer === choice;
        };
        var QuizUI = {
            displayNext: function () {
                if (quiz.hasEnded()) {
                    this.displayScore();
                } else {
                    this.displayQuestion();
                    this.displayChoices();
                    this.displayProgress();
                }
            },
            displayQuestion: function() {
                this.populateIdWithHTML("question", quiz.getCurrentQuestion().text);
            },
            displayChoices: function() {
                var choices = quiz.getCurrentQuestion().choices;

                for(var i = 0; i < choices.length; i++) {
                    this.populateIdWithHTML("choice" + i, choices[i]);
                    this.guessHandler("guess" + i, choices[i]);
                }
            },
            displayScore: function() {
                var gameOverHTML = '<div class="container" style="text-align: center;"><h1 >Game Over</h1>';
                gameOverHTML +='<div class="row">';
                gameOverHTML +='<div class="col-md-6" style="display: flex;justify-content: center;align-items: center;">';
                gameOverHTML +='<div class="form-group">';
                gameOverHTML +='<label for="mobileNumber" id="label">Enter Your Mobile Number</label>';
                gameOverHTML +='<input type="text" class="form-control" id="mobileNumber" placeholder="Enter text">';
                gameOverHTML +='<input style="display :none" type="text" class="form-control" id="otp" placeholder="Enter OTP">';
                gameOverHTML +='<input type="submit" id="submit" class="form-control" value="Get OTP">';
                gameOverHTML +='<input type="submit" style="display :none" id="otpButton" class="form-control" value="Validate OTP">';
                gameOverHTML +='<label id="timerLabel" style="display :none">Remaining <span  id="timer">30</span> seconds </label>';
                gameOverHTML +='<label id="resend" style="display :none">Resend</label>';
                gameOverHTML +='</div>';
                gameOverHTML +='</div>';
                gameOverHTML +='</div>';
                gameOverHTML +='</div>';
                this.populateIdWithHTML("quiz", gameOverHTML);
                

                const button = document.getElementById('submit');
                const mobileNumber = document.getElementById('mobileNumber');
                const label = document.getElementById('label');
                const otp = document.getElementById('otp');
                const otpButton = document.getElementById('otpButton');
                const timerElement = document.getElementById('timer');
                const timerLabel = document.getElementById('timerLabel');
                const resend = document.getElementById('resend');

                button.addEventListener('click', function() {
                    const inputValue = mobileNumber.value;
                    if (validateMobileNumber(inputValue)) {
                        mobileNumber.classList.remove('shake');
                        invoke(inputValue, quiz.score);
                    } else {
                        mobileNumber.classList.add('shake');
                        mobileNumber.focus();
                    }
                });

                otpButton.addEventListener('click', function() {
                    const url = '<?=$checkOtpUrl?>';
                    const otpValue = otp.value;

                    const data = {
                        otp: otpValue,
                    };

                    const options = {
                    method: 'POST', // HTTP method
                    headers: {
                        'Content-Type': 'application/json', // Specify the content type
                    },
                    body: JSON.stringify(data), // Convert the data to JSON format
                    };

                    // Make the POST request using fetch
                    fetch(url, options)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json(); // Parse the response body as JSON
                    })
                    .then(data => {
                        if (data.status) {
                            otp.style.display = 'none';
                            otpButton.style.display = 'none';
                            label.textContent = 'We have forwareded the score to your whats-app else please login <a href="<?=$loginUrl?>">here</a>';
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
                });

                mobileNumber.addEventListener('blur', function() {
                    mobileNumber.classList.remove('shake');
                });

                function validateMobileNumber(mobileNumber) {
                    const pattern = /^[0-9]{10}$/;

                    return pattern.test(mobileNumber);
                }

                function invoke(mobile, score){
                    const url = '<?=$invokeUrl?>';

                    const data = {
                        mobile: mobile,
                        score: score,
                    };

                    const options = {
                    method: 'POST', // HTTP method
                    headers: {
                        'Content-Type': 'application/json', // Specify the content type
                    },
                    body: JSON.stringify(data), // Convert the data to JSON format
                    };

                    // Make the POST request using fetch
                    fetch(url, options)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json(); // Parse the response body as JSON
                    })
                    .then(data => {
                        if (data.status) {
                            mobileNumber.style.display = 'none';
                            button.style.display = 'none';

                            otp.style.display = 'block';
                            otpButton.style.display = 'block';
                            label.textContent = 'Please Check Your Whatsapp For OTP';
                            
                            let timeLeft = 30;

                            function updateTimer() {

                                timerLabel.style.display = 'block';
                                timerElement.textContent = timeLeft;

                                // Check if the timer has reached 0
                                if (timeLeft <= 0) {
                                    clearInterval(interval); // Stop the timer
                                    timerLabel.textContent = 'Time\'s up!';
                                    resend.style.display = 'block';

                                } else {
                                    timeLeft--; // Decrement the time
                                }
                            }
                            const interval = setInterval(updateTimer, 1000);
                            updateTimer();
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });

                }
                
                resend.addEventListener('click', function() {
                    mobileNumber.style.display = 'block';
                    button.style.display = 'block';

                    timerLabel.style.display = 'none';
                    otp.style.display = 'none';
                    otpButton.style.display = 'none';
                    resend.style.display = 'none';
                })
            },
            
            

            populateIdWithHTML: function(id, text) {
                var element = document.getElementById(id);
                if (text != null) {
                    element.innerHTML = text;
                }
            },
            guessHandler: function(id, guess) {
                var button = document.getElementById(id);
                button.onclick = function() {
                    quiz.guess(guess);
                    QuizUI.displayNext();
                }
            },
            
            displayProgress: function() {
                var currentQuestionNumber = quiz.currentQuestionIndex + 1;
                this.populateIdWithHTML("progress", "Question " + currentQuestionNumber + " of " + quiz.questions.length);
            }
        };
        //Create Questions
        var questions = [
            <?php foreach ($quiz['questions'] as $key => $value) { ?>
                new Question("<?=$value['question']?>", [ "<?=$value['options']['0']?>" , "<?=$value['options']['1']?>" , "<?=$value['options']['2']?>" , "<?=$value['options']['3']?>" ], "<?=$value['answer']?>"),
            <?php } ?>
        ];

        //Create Quiz
        var quiz = new Quiz(questions);

        //Display Quiz
        QuizUI.displayNext();
    </script>