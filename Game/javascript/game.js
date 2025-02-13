let targetNumber;
let remainingAttempts = 10;
let previousGuesses = [];

function initializeGame() {
  targetNumber = Math.floor(Math.random() * 100) + 1;
  remainingAttempts = 10;
  previousGuesses = [];
  updateDisplay();
  document.getElementById("guessInput").disabled = false;
  document.getElementById("restartButton").style.display = "none";
}

function checkGuess() {
  const userInput = document.getElementById("guessInput");
  const messageElement = document.getElementById("message");
  const guess = parseInt(userInput.value);

  if (isNaN(guess) || guess < 1 || guess > 100) {
    messageElement.textContent =
      "Please enter a valid number between 1 and 100!";
    messageElement.style.color = "red";
    return;
  }

  previousGuesses.push(guess);
  remainingAttempts--;

  if (guess === targetNumber) {
    endGame(true);
    return;
  }

  if (remainingAttempts === 0) {
    endGame(false);
    return;
  }

  messageElement.style.color = "black";
  messageElement.textContent = `Your guess is too ${
    guess < targetNumber ? "low" : "high"
  }!`;
  userInput.value = "";
  updateDisplay();
}

function endGame(won) {
  const messageElement = document.getElementById("message");
  document.getElementById("guessInput").disabled = true;
  document.getElementById("restartButton").style.display = "inline-block";

  if (won) {
    messageElement.textContent = `Congratulations! You guessed the number ${targetNumber} correctly!`;
    messageElement.style.color = "green";
  } else {
    messageElement.textContent = `Game over! The correct number was ${targetNumber}.`;
    messageElement.style.color = "red";
  }
}

function updateDisplay() {
  document.getElementById("attempts").textContent = remainingAttempts;
  document.getElementById("previousGuesses").textContent =
    previousGuesses.join(", ");
}

function restartGame() {
  initializeGame();
  document.getElementById("message").textContent = "";
}

// Initialize the game when the page loads
initializeGame();

// Add enter key support
document
  .getElementById("guessInput")
  .addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      checkGuess();
    }
  });
