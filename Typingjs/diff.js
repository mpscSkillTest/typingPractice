const remingtonMapping = {
  q: "ु",
  w: "ू",
  e: "म",
  r: "त",
  t: "ज",
  y: "ल",
  u: "न",
  i: "प",
  o: "व",
  p: "च",
  a: "ं",
  s: "े",
  d: "क",
  f: "ि",
  g: "ह",
  h: "ी",
  j: "र",
  k: "ा",
  l: "स",
  z: "्र",
  x: "ग",
  c: "ब",
  v: "अ",
  b: "इ",
  n: "द",
  m: "उ",
  "~": "द्य",
  "`": "़",
  1: "१",
  2: "२",
  3: "३",
  4: "४",
  5: "५",
  6: "६",
  7: "७",
  8: "८",
  9: "९",
  0: "०",
  "-": "ञ",
  _: ".",
  "=": "ृ",
  "\\": ".",
  "[": "ख्",
  "]": ",",
  ";": "य",
  "?": "घ्‍",
  ",": "ए",
  ".": "ण्",
  "/": "ध्",
  Q: "फ",
  W: "ॅ",
  E: "म्",
  R: "त्",
  T: "ज्",
  Y: "ल्",
  U: "न्",
  I: "प्",
  O: "व्",
  P: "च्",
  A: "ा",
  S: "ै",
  D: "क्",
  F: "थ्",
  G: "ळ",
  H: "भ्",
  J: "श्र",
  K: "ज्ञ",
  L: "स्",
  Z: "र्",
  X: "ग्",
  C: "ब्",
  V: "ट",
  B: "ठ",
  N: "छ",
  M: "ड",
  "`": "़",
  "!": "|",
  "@": "/",
  "#": ":",
  $: "ऱ्‍",
  "%": "-",
  "^": "“",
  "&": "‘",
  "*": "द्ध",
  "(": "त्र",
  ")": "ऋ",
  "+": "्",
  "|": "\\",
  "{": "क्ष्",
  "}": "द्व",
  ":": "रू",
  '"': "ष्",
  "<": "ढ",
  ">": "झ",
  "?": "घ्",
  '"': "ष्",
  "'": "श्‍",
};

const half_letter = {
  H: "भ",
  E: "म",
  R: "त",
  T: "ज",
  Y: "ल",
  U: "न",
  I: "प",
  O: "व",
  P: "च",

  "[": "ख",
  "{": "क्ष",
  D: "क",
  F: "थ",
  L: "स",
  '"': "ष",
  "'": "श",
  X: "ग",
  C: "ब",
  v: "आ",
  ".": "ण",
  "?": "घ",
  "/": "ध",
};

const half_letter_rafar = {
  F: "र्थ",
  H: "र्भ",
  '"': "र्ष ",
  "'": "र्श ",
  ".": "र्ण",
  "?": "र्घ",
  "/": "र्ध",
  "{": "र्क्ष",
  "[": "र्ख ",
};

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

const isHalfLetter = (letter) => {
  return half_letter.hasOwnProperty(letter);
};

function convertToMarathi(englishText = "") {
  const a = [];
  let z = 0;

  for (let i = 0; i < englishText.length; i++) {
    const currentLetter = englishText[i];
    const previousLetter = englishText[i - 1];
    const previousToPreviousLetter = englishText[i - 2];
    const thirdPreviousLetter = englishText[i - 3];
    const nextLetter = englishText[i + 1];

    const isPreviousToPreviousLetterValid =
      previousToPreviousLetter && !!previousToPreviousLetter.trim();

    const isPreviousLetterValid = previousLetter && !!previousLetter.trim();

    // for half letter and full letter rafar and kana with half letter for र्भा , र्भ .
    if (
      previousLetter == "k" &&
      currentLetter == "Z" &&
      isPreviousToPreviousLetterValid
    ) {
      if (isHalfLetter(previousToPreviousLetter)) {
        console.log("a[i] first ", a[i]);
        const halfLetterValue = half_letter[previousToPreviousLetter];
        if (thirdPreviousLetter == "f") {
          console.log("a[i]", a[i]);
          a[i - 3] =
            remingtonMapping[currentLetter] +
            halfLetterValue +
            remingtonMapping[thirdPreviousLetter];
          console.log("for र्भि like letters ", a[i - 3]);
        } else {
          a[i - 2] = remingtonMapping[currentLetter] + halfLetterValue;
          console.log("BOOO " + a[i - 2], "><><><><", a[i - 3]);
        }
      } else if (
        isHalfLetter(thirdPreviousLetter) &&
        previousLetter == "k" &&
        previousToPreviousLetter == "k"
      ) {
        const halfLetterValue = half_letter[thirdPreviousLetter];
        a[i - 3] = remingtonMapping[currentLetter] + halfLetterValue;
        console.log("o", a[i - 3]);
      } else if (isHalfLetter(thirdPreviousLetter) && previousLetter == "k") {
        // H ; k Z \\ H ; Z
        a[i - 3] =
          remingtonMapping[currentLetter] +
          remingtonMapping[thirdPreviousLetter];
      } else {
        a[i - 2] =
          remingtonMapping[currentLetter] +
          remingtonMapping[previousToPreviousLetter];
        console.log("in rafar with kana", a[i - 2]);
      }
      i += 1;
    }

    // for rafar with pahili velanti
    if (
      previousToPreviousLetter == "f" &&
      currentLetter == "Z" &&
      isPreviousLetterValid
    ) {
      a[i - 2] =
        remingtonMapping[currentLetter] +
        remingtonMapping[previousLetter] +
        remingtonMapping[previousToPreviousLetter];

      console.log("in rafar with pahili velanti (र्वि)", a[i - 2]);
      i += 1;
    }

    // "for letters like (प्रि)"
    if (
      previousToPreviousLetter == "f" &&
      currentLetter == "z" &&
      isPreviousLetterValid
    ) {
      a[i - 2] =
        remingtonMapping[previousLetter] +
        remingtonMapping[currentLetter] +
        remingtonMapping[previousToPreviousLetter];

      console.log("for letters like (प्रि)", a[i - 2]);
      i += 1;
    }

    //  for rafar with dusri velanti
    if (
      previousLetter == "h" &&
      currentLetter == "Z" &&
      isPreviousToPreviousLetterValid
    ) {
      // for half letter rafar and velanti
      if (
        previousToPreviousLetter == "k" &&
        isHalfLetter(thirdPreviousLetter)
      ) {
        const halfLetterValue = half_letter[thirdPreviousLetter];
        a[i - 3] = remingtonMapping[currentLetter] + halfLetterValue;
        i += 1;
      }
      // for full letter rafar and velanti
      else {
        a[i - 2] =
          remingtonMapping[currentLetter] +
          remingtonMapping[previousToPreviousLetter];
        console.log("in rafar with  dusri velanti", a[i - 2]);
        i++;
      }
    }

    // for velanti of half lettr velanti
    if (
      currentLetter != "" &&
      currentLetter != "k" &&
      isHalfLetter(previousLetter) &&
      previousToPreviousLetter === "f"
    ) {
      var joiner =
        remingtonMapping[previousLetter] +
        remingtonMapping[currentLetter] +
        remingtonMapping[previousToPreviousLetter];
      a[i - 2] = joiner;
      console.log("hurrey NAVIN " + joiner);
      i += 1;
    }

    // for world like "स्थि"
    if (
      currentLetter == "k" &&
      isHalfLetter(previousToPreviousLetter) &&
      isHalfLetter(previousLetter) &&
      thirdPreviousLetter === "f"
    ) {
      const halfPositionValue = half_letter[previousToPreviousLetter];
      a[i - 3] =
        remingtonMapping[previousToPreviousLetter] +
        halfPositionValue +
        remingtonMapping[thirdPreviousLetter];
      console.log("for two half letter with pahili velanti ", a[i - 3]);
    }

    // for थ्रि
    else if (
      isHalfLetter(previousToPreviousLetter) &&
      thirdPreviousLetter == "f" &&
      previousLetter == "k" &&
      currentLetter == "z"
    ) {
      const halfPositionValue = half_letter[previousToPreviousLetter];
      a[i - 3] =
        halfPositionValue +
        remingtonMapping[currentLetter] +
        remingtonMapping[thirdPreviousLetter];
      console.log("for थ्रि ", a[i - 3]);
    }

    // for words like र्हे and र्धे
    else if (
      currentLetter == "Z" &&
      previousLetter == "s" &&
      isPreviousToPreviousLetterValid
    ) {
      // for words like र्धे (half letter vale )
      if (
        isHalfLetter(thirdPreviousLetter) &&
        previousToPreviousLetter == "k"
      ) {
        const halfPositionValue = half_letter[thirdPreviousLetter];
        a[i - 3] = remingtonMapping[currentLetter] + halfPositionValue;
        console.log(" for words like र्धे", a[i - 3]);
      }
      // for words like र्हे
      else {
        a[i - 2] =
          remingtonMapping[currentLetter] +
          remingtonMapping[previousToPreviousLetter];
        console.log("for words like र्हे ", a[i - 2]);
      }
    }

    // FOR PAHILE VELANTI
    else if (
      currentLetter === "k" &&
      isHalfLetter(previousLetter) &&
      previousToPreviousLetter === "f"
    ) {
      const halfPositionValue = half_letter[previousLetter];

      var temp = halfPositionValue + remingtonMapping[previousToPreviousLetter];
      a[i - 2] = temp;
      console.log("hurrey" + temp);
      // i++
    } else if (
      currentLetter == "f" &&
      nextLetter != " " &&
      remingtonMapping[nextLetter] != undefined
    ) {
      a[i] = remingtonMapping[nextLetter] + remingtonMapping[currentLetter];
      i += 1;
      console.log("PRIMARY IF");
    }
    //FOR half letter and kana and AA
    else if (
      isHalfLetter(currentLetter) &&
      (nextLetter == "k" || nextLetter == "A")
    ) {
      console.log("in 2nd if");
      const halfPositionValue = half_letter[currentLetter];
      a[i] = halfPositionValue;
      console.log("SECONDARY IF  for AA ", a[i]);
      i += 1;
    }
    // for "ओ"
    else if (
      previousToPreviousLetter == "v" &&
      previousLetter == "k" &&
      currentLetter == "s"
    ) {
      a[i - 2] = "ओ";
      console.log("in ओ");
    }

    // for "औ"
    else if (
      previousToPreviousLetter == "v" &&
      previousLetter == "k" &&
      currentLetter == "S"
    ) {
      a[i - 2] = "औ";
      console.log("in औ");
    }

    // for ॲ
    else if (previousLetter == "v" && currentLetter == "W") {
      a[i - 1] = "ॲ";
    }

    // for ऑ
    else if (
      previousToPreviousLetter == "v" &&
      previousLetter == "k" &&
      currentLetter == "W"
    ) {
      a[i - 2] = "ऑ";
    }

    // for ऐ
    else if (previousLetter == "," && currentLetter == "s") {
      a[i - 1] = "ऐ";
    }

    // for ऊ
    else if (currentLetter == "m" && nextLetter == "Q") {
      // initialize only for ऊ
      console.log("in ऊ");
      a[i] = "ऊ";
      i += 1;
    }
    //   for rafar of jodshabda and purna shbda rafar
    else if (
      currentLetter == "Z" &&
      previousLetter != " " &&
      remingtonMapping[previousLetter] != undefined
    ) {
      // for jodshabda
      if (isHalfLetter(previousToPreviousLetter)) {
        console.log("in jeeee ", previousToPreviousLetter);
        console.log(
          "for if wala rafar ",
          currentLetter,
          previousLetter,
          previousToPreviousLetter
        );
        console.log(
          remingtonMapping[currentLetter],
          remingtonMapping[previousLetter],
          remingtonMapping[previousToPreviousLetter]
        );
        a[i - 2] =
          remingtonMapping[currentLetter] +
          remingtonMapping[previousToPreviousLetter];
      } else {
        // for sadha rafar
        console.log("in else");
        a[i - 1] =
          remingtonMapping[currentLetter] + remingtonMapping[previousLetter];
        console.log(currentLetter, previousLetter);
      }
      console.log("in rafar");
    } else if (
      // in big rafar
      currentLetter == "Z" &&
      previousLetter == "k" &&
      remingtonMapping[previousLetter] != undefined
    ) {
      a[i] = remingtonMapping[currentLetter] + remingtonMapping[previousLetter];
    }

    // for big "E"
    else if (currentLetter == "b" && nextLetter == "Z") {
      a[i] = "ई";
      console.log("in ई ");
      i++;
    }
    //FOR NORMAL
    else {
      console.log("in sadha loop");
      a[i] = remingtonMapping[currentLetter] || currentLetter;
    }
  }
  return a.join("");
}
