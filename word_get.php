 <!DOCTYPE html>
<html>
<head>
    <title>Wordle Mock</title>

    <style>
		.board {
			width: 500px;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
		}
		
		h2 {
			background-color: gray;
			letter-spacing: 5px;
			color: black;
		}
		
		.green {
			background-color: green;
		}
		
		.yellow {
			background-color: yellow;
		}
    </style>

</head>
    
<body>
	<div class="board">
		<h2><span class="green">W</span>ORD</h2>
		<h2>HURP</h2>
		<h2><span class="green">W</span><span class="yellow">A</span>KE</h2>
		<h2>____</h2>
		<h2>____</h2>
		<h2>____</h2>
	</div>
	
	<div class="board">
	</div>
	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		include("word_lists/four-letter-words.php");
		
		function getWord($wordList) {
			// Returns a random word from the given list based on its array index.
			$wordCount = count($wordList);
			$selectedWord = $wordList[rand(0, $wordCount)];	
			return $selectedWord;
		}

		
		function checkGuess($guess, $answer) {
			// Check if word is the answer before parsing further.
			if ($guess == $answer) {
				return true;
			}
			return false; 
		}
		
		function checkLetters($guess, $answer) {
			$guessLetters = str_split($guess);
			$answerLetters = str_split($answer);
			$checkMatrix = array();
			// Set up a list that contains the match values for each position or if 
			// letter is in the answer. 
			for ($i=0; $i<count($guessLetters); $i++) {
				$letter = $guessLetters[$i];
				// check if letter is in the answer at all.
				$inWord = in_array($letter, $answerLetters);
				// check if letter is in correct position by index. 
				$position = false;
				if ($letter == $answerLetters[$i]) {
					$position = true;
				}
				// Set up answer matrix. Since there can duplicate letters
				// reference them by index position in word instead of by letter.
				// position = bool for if the letter matches the position of the answer (green)
				// inWord = bool indicates only if the letter is somewhere in the word (yellow)
				$checkMatrix[$i] = array("letter"=>$letter, "position"=>$position, "in_word"=>$inWord);
			}
			
			return $checkMatrix;
		}
			
			
		
		$myGuess = "tree";
		$answer = getWord($four_letter_words);
		echo "The selected word is: ".$answer."<br>You entered: ".$myGuess."<br>";
		echo "Testing below on the answer Tree<br>";
		$test = checkLetters($myGuess, "tffe");
		echo "This is a var dump of the word checkLetters function: <br>";
		echo '<pre>', var_dump($test), '</pre>';
	?>
	
	

</body>

</html> 