/**
 * This function will return array of words which match with expected passage words
 * If expected word is present in output array of words return by executing this function
 * then we will mark that word in green in expected passage else it will be marked in red
 * @param {Expected Passage} expectedPassage | string
 * @param {User Input} userInput | string
 * @returns string
 */
const getLongestContinuousSequence = (expectedPassage, userInput) => {
  const m = expectedPassage.length;
  const n = userInput.length;

  // Create a 2D array to store the lengths of LCS
  const dp = [];
  for (let i = 0; i <= m; i++) {
    dp[i] = new Array(n + 1).fill(0);
  }

  // Build the dp array in bottom-up manner
  for (let i = 1; i <= m; i++) {
    for (let j = 1; j <= n; j++) {
      if (expectedPassage[i - 1] === userInput[j - 1]) {
        dp[i][j] = dp[i - 1][j - 1] + 1;
      } else {
        dp[i][j] = Math.max(dp[i - 1][j], dp[i][j - 1]);
      }
    }
  }

  // Reconstruct the LCS
  let i = m;
  let j = n;
  const lcs = [];
  while (i > 0 && j > 0) {
    if (expectedPassage[i - 1] === userInput[j - 1]) {
      lcs.unshift(expectedPassage[i - 1]);
      i--;
      j--;
    } else if (dp[i - 1][j] > dp[i][j - 1]) {
      i--;
    } else {
      j--;
    }
  }

  return lcs.join("").split(/\s+/).filter(Boolean);
};
