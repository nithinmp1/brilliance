        <section class="question-section">
            <div class="question">
                <h2 class="question-num">Question <?=$id?></h2>
                <p class="question-text"><?=$question->question?></p>
            </div>
            <div class="answer">
                <label class="answer-item">
                    <input type="radio" name="option1" onchange="toggleParentClass(this)" id="">
                    <span><?=$question->option1?></span>
                </label>
                <label class="answer-item">
                    <input type="radio" name="option2" onchange="toggleParentClass(this)" id="">
                    <span><?=$question->option2?></span>
                </label>
                <label class="answer-item">
                    <input type="radio" name="option3" onchange="toggleParentClass(this)" id="">
                    <span><?=$question->option3?></span>
                </label>
                <label class="answer-item">
                    <input type="radio" name="option4" onchange="toggleParentClass(this)" id="">
                    <span><?=$question->option4?></span>
                </label>
            <?php if($question->option5 != ''){ ?>
                <label class="answer-item">
                    <input type="radio" name="option5" onchange="toggleParentClass(this)" id="">
                    <span><?=$question->option5?></span>
                </label>
            <?php } ?> 
            </div>
            <div class="action">
                <?php 
                if(isset($pidPrev) === true){
                ?>
                <button class="btn action" do="view" pid="<?=$pidPrev?>" actionUrl="<?=$this->action['viewUrl']?>">Prev</button>
                <?php 
                }
                if(isset($pidNext) === true){
                ?>
                <button class="btn action" do="view" pid="<?=$pidNext?>" actionUrl="<?=$this->action['viewUrl']?>">Next</button>
                <?php 
                }
                ?>
            </div>
        </section>
      <?php if($question->have_explanation){ ?>
      <section class="explanation-section">
        <h2 class="section-title">Explanation</h2>
        <p class="explanation-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </section>
      <?php } ?>
      <?php /*
      <section class="questions-nav-section">
        <p class="question-context"> 
         <a href="#"><span class="question-num">Question 11/20</span></a>  
         <a href="#"><span class="question-help">Need Help?</span></a> 
        </p>
        <div class="d-flex"> 
          <ul class="question-nums-list">
            <li><a class="done" href="#">1</a></li>
            <li><a class="done" href="#">2</a></li>
            <li><a class="done" href="#">3</a></li>
            <li><a class="done" href="#">4</a></li>
            <li><a class="done" href="#">5</a></li>
            <li><a class="done" href="#">6</a></li>
            <li><a class="done" href="#">7</a></li>
            <li><a class="done" href="#">8</a></li>
            <li><a class="done" href="#">9</a></li>
            <li><a class="done" href="#">10</a></li>
            <li><a class="active" href="#">11</a></li>
            <li><a href="#">12</a></li>
            <li><a href="#">13</a></li>
            <li><a href="#">14</a></li>
            <li><a href="#">15</a></li>
            <li><a href="#">16</a></li>
            <li><a href="#">17</a></li>
            <li><a href="#">18</a></li>
            <li><a href="#">19</a></li>
            <li><a href="#">20</a></li>
          </ul>
        </div>
      </section>
      */ ?>