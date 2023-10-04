        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById('background-music');
            var muteButton = document.getElementById('mute-button');

            muteButton.addEventListener('click', function() {
                if (audio.paused) {
                    audio.play();
                    muteButton.classList.add('fa-volume-up');
                    muteButton.classList.remove('fa-volume-0ff');
                } else {
                    audio.pause();
                    muteButton.classList.add('fa-volume-off');
                    muteButton.classList.remove('fa-volume-up');
                }
            });
        });

        function Quiz(questions) {
            this.score = 0;
            this.questions = questions;
            this.currentQuestionIndex = 0;
            this.answerArray = [];
            }

        Quiz.prototype.guess = function(answer) {
            this.answerArray.push(answer);
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

                    var question = document.getElementById('question');
                    question.focus();
                    
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
                var gameOverHTML = '<div class="container" style="text-align: center; padding-left: 9%"><h1 ><?=$quiz['resultHead']?></h1>';
                gameOverHTML +='<div class="row quiz-box">';
                gameOverHTML +='<div class="question-div" style="display: flex;justify-content: center;align-items: center;">';
                gameOverHTML +='<form>';
                gameOverHTML +='<div class="form-group" id="resultDiv" style="display :none">';
                gameOverHTML +='<label >Please Check your mail for the result</label>';
                gameOverHTML +='<label >For more Quiz <a href="<?=$loginUrl?>">here</a></label>';
                gameOverHTML +='</div>';
                gameOverHTML +='<div class="form-group submit-form">';
                gameOverHTML +='<label for="name">Full Name</label>';
                gameOverHTML +='<input type="email" class="form-control" id="name" placeholder="Full Name">'
                gameOverHTML +='</div>';
                gameOverHTML +='<div class="form-group submit-form">';
                gameOverHTML +='<label for="email">Email</label>';
                gameOverHTML +='<input type="email" autofill class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">'
                gameOverHTML +='<small id="emailHelp" class="form-text text-muted">We ll never share your email with anyone else.</small>'
                gameOverHTML +='</div>';
                gameOverHTML +='<div class="form-group submit-form">';
                gameOverHTML +='<label for="mobileNumber">Mobile Number</label>';
                gameOverHTML +='<input type="text" autofill class="form-control" id="mobileNumber" aria-describedby="mobileHelp" placeholder="Mobile Number">';
                gameOverHTML +='<small id="mobileHelp" class="form-text text-muted">We ll never share your number with anyone else.</small>'
                gameOverHTML +='</div>';
                gameOverHTML +='<div id="otp" class="form-group" style="display :none">';
                gameOverHTML +='<label for="mobileNumber">OTP</label>';
                gameOverHTML +='<input type="text" class="form-control" id="otpInput" aria-describedby="otpHelp" placeholder="OTP">';
                gameOverHTML +='<small id="otpHelp" class="form-text text-muted">OTP has bees send to your number. Remaining <span  id="timer">30</span> seconds</small>'
                gameOverHTML +='</div>';
                gameOverHTML +='<button type="submit" id="submit" class="btn--default submit-form">Get OTP</button>'
                gameOverHTML +='<button type="submit" id="otpButton" style="display :none" class="btn--default">Submit</button>'
                gameOverHTML +='</form>';
                gameOverHTML +='</div>';
                gameOverHTML +='</div>';
                gameOverHTML +='<div class="row qiues-title">';
                gameOverHTML +='</div>';
                gameOverHTML +='</div>';
                this.populateIdWithHTML("quiz", gameOverHTML);
                

                const button = document.getElementById('submit');
                const mobileNumber = document.getElementById('mobileNumber');
                const name = document.getElementById('name');
                const email = document.getElementById('email');
                const otp = document.getElementById('otp');
                const otpButton = document.getElementById('otpButton');
                const timerElement = document.getElementById('timer');
                const timerLabel = document.getElementById('otpHelp');
                // const resend = document.getElementById('resend');
                const otpInput = document.getElementById('otpInput');
                const resultDiv = document.getElementById('resultDiv');

                button.addEventListener('click', function() {
                    event.preventDefault();
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
                    event.preventDefault();
                    const url = '<?=$checkOtpUrl?>';
                    const otpValue = otpInput.value;
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
                            resultDiv.style.display = 'block';
                            // clearInterval(interval);
                            // Construct the query parameters
                            const postData = {
                              mobile: inputValue,
                              otp: otpValue,
                            };

                            const queryString = Object.keys(postData)
                              .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(postData[key])}`)
                              .join('&');

                            // Append the query string to the URL and navigate
                            const newURL = `https://exam.brilliance.college/result?${queryString}`;
                            window.location.href = newURL;

                            setTimeout(function() {
                              window.location.href = "<?=$loginUrl?>";
                            }, 3000);
                        }else{
                            alert('In Valid OTP');
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
                        answers:JSON.stringify(quiz.answerArray),
                        questions:localStorage.getItem('questions')
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
                        let timeLeft = 30;

                        return response.json(); // Parse the response body as JSON
                    })
                    .then(data => {
                        if (data.status) {
                            
                            var submitForm = document.getElementsByClassName("submit-form");
                            for (let i = 0; i < submitForm.length; i++) {
                                submitForm[i].style.display = 'none';
                            }

                            otp.style.display = 'block';
                            otpButton.style.display = 'block';
                            timerLabel.html = 'OTP has bees send to your number. Remaining <span  id="timer">30</span> seconds';
                            

                            function updateTimer() {

                                timerLabel.style.display = 'block';
                                if (typeof timeLeft === 'undefined') {
                                    timeLeft = 30;
                                }
                                timerElement.textContent = timeLeft;
                                
                                // Check if the timer has reached 0
                                if (timeLeft <= 0) {
                                    clearInterval(interval);
                                    // timerLabel.textContent = 'Time\'s up!';
                                    otpButton.style.display = 'none';
                                    // resend.style.display = 'block';
                                    otp.style.display = 'none';
                                    for (let i = 0; i < submitForm.length; i++) {
                                        submitForm[i].style.display = '';
                                    }
                                    timeLeft = undefined;
                                } else {
                                    timeLeft--; 
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
                    button.checked = false;
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
        localStorage.setItem('questions', JSON.stringify(questions));
        
        //Display Quiz
        QuizUI.displayNext();
    </script>