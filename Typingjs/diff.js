/**
 * This function will return array of words which match with expected passage words
 * If expected word is present in output array of words return by executing this function
 * then we will mark that word in green in expected passage else it will be marked in red
 * @param {Expected Passage} expectedPassage | string
 * @param {User Input} userInput | string
 * @returns string
 */
const getLongestContinuousSequence = (expectedPassage, userInput) => {
  const expectedPassageWords = expectedPassage.trim().split(" ");
  const userInputWords = userInput.trim().split(" ");

  const m = expectedPassageWords.length;
  const n = userInputWords.length;

  // Create a 2D array to store the lengths of LCS
  const dp = [];
  for (let i = 0; i <= m; i++) {
    dp[i] = new Array(n + 1).fill(0);
  }

  // Build the dp array in bottom-up manner
  for (let i = 1; i <= m; i++) {
    for (let j = 1; j <= n; j++) {
      if (expectedPassageWords[i - 1] === userInputWords[j - 1]) {
        dp[i][j] = dp[i - 1][j - 1] + 1;
      } else {
        dp[i][j] = Math.max(dp[i - 1][j], dp[i][j - 1]);
      }
    }
  }

  // Reconstruct the correctWords
  let i = m;
  let j = n;
  const correctWords = [];
  while (i > 0 && j > 0) {
    if (expectedPassageWords[i - 1] === userInputWords[j - 1]) {
      correctWords.unshift(expectedPassageWords[i - 1]);
      i--;
      j--;
    } else if (dp[i - 1][j] > dp[i][j - 1]) {
      i--;
    } else {
      j--;
    }
  }

  return correctWords;
};

const getCorrectWordsHighlighted = (wordsCorrectlyTyped, expectedWords) => {
  let expectedWordsIndex = 0;
  let typedWordIndex = 0;
  let correctWords = 0;
  const spansStartingWithW = document.querySelectorAll('[id^="w"]');

  // Iterate through both arrays
  while (
    typedWordIndex < wordsCorrectlyTyped.length &&
    expectedWordsIndex < expectedWords.length
  ) {
    const currentExpectedWord = expectedWords[expectedWordsIndex];
    const currentCorrectWord = wordsCorrectlyTyped[typedWordIndex];
    // If the words match, move to the next word in both arrays
    if (currentExpectedWord === currentCorrectWord) {
      const currentElement = spansStartingWithW[expectedWordsIndex];
      currentElement.style.color = "green";
      typedWordIndex += 1;
      correctWords += 1;
    } else if (!expectedWords.includes(currentCorrectWord)) {
      // If the words from wordsCorrectlyTyped is not present in expectedWords, move to the next word in wordsCorrectlyTyped
      typedWordIndex += 1;
    }
    expectedWordsIndex += 1;
  }

  return correctWords;
};
