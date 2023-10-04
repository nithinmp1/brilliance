        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById('background-music');
            var muteButton = document.getElementById('mute-button');

            muteButton.addEventListener('click', function() {
                if (audio.paused) {
                    audio.play();
                    muteButton.classList.add('fa-volume-up');
                    muteButton.classList.remove('fa-volume-0ff');
                    // muteButton.addClass = 'Mute';
                } else {
                    audio.pause();
                    muteButton.classList.add('fa-volume-off');
                    muteButton.classList.remove('fa-volume-up');

                    // muteButton.textContent = 'Unmute';
                }
            });
        //  var clickEvent = new Event('click');
        //  muteButton.dispatchEvent(clickEvent);
        });

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
                gameOverHTML +='<div class="row quiz-box">';
                gameOverHTML +='<div class="col-md-6" style="display: flex;justify-content: center;align-items: center;">';
                gameOverHTML +='<div class="form-group">';
                gameOverHTML +='<label for="mobileNumber" id="labelName">Enter Your Name</label>';
                gameOverHTML +='<input type="text" class="form-control" id="name" placeholder="Enter text">';
                
                gameOverHTML +='<label for="mobileNumber" id="labelEmail">Enter Your Email</label>';
                gameOverHTML +='<input type="text" class="form-control" id="email" placeholder="Enter text">';
                
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
                const name = document.getElementById('name');
                const email = document.getElementById('email');
                const label = document.getElementById('label');
                const labelName = document.getElementById('labelName');
                const labelEmail = document.getElementById('labelEmail');
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
                    const inputValue = mobileNumber.value;

                    const data = {
                        mobile: inputValue,
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
                    const nameValue = name.value;
                    const emailValue = email.value;

                    const data = {
                        mobile: mobile,
                        score: score,
                        identifier: "quiz",
                        name:nameValue,
                        email:emailValue,
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
                            name.style.display = 'none';
                            email.style.display = 'none';
                            labelEmail.style.display = 'none';
                            labelName.style.display = 'none';
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