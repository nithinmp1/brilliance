<div class="card">
      <h1 class="quiz-title"><?=$title?></h1>
      <?php 
        $question = $this->db->get_where('question',['question_id' => $id])->row();
        $this->load->view($this->template.'question-templates/template-'.$question->question_type,['question' => $question]);
      ?>
</div>

  <script>
    function toggleParentClass(radio) {
        var parent = radio.parentNode;

        // Remove 'checked' class from all answer-items
        var answerItems = document.querySelectorAll('.answer-item');
        for (var i = 0; i < answerItems.length; i++) {
            if (answerItems[i] !== parent) { 
            answerItems[i].classList.remove('checked');
            answerItems[i].querySelector('input[type="radio"]').checked = false; 
            }
        } 
        
        if (parent.querySelector('span').innerHTML.trim() !== "componentDidMount") {
        parent.classList.add('wrong');
        console.log(parent.querySelector('span').innerHTML);
        }


        if (radio.checked) {
            parent.classList.add('checked');
        } else {
            parent.classList.remove('checked');
        }
        }  
  </script>