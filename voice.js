// Get the user query.
const query = document.querySelector("#query").value;

// Call the Bard API.
fetch("https://bard.ai/v1/query", {
  method: "POST",
  body: JSON.stringify({
    query: query,
  }),
  headers: {
    "Content-Type": "application/json",
  },
})
  .then((response) => response.json())
  .then((result) => {
    // Display the Bard answer.
    document.getElementById("bard-results").innerHTML = result.answer;
  });

// Call the ChatGPT API.
fetch("https://chatgpt.googleapis.com/v1/text/generate", {
  method: "POST",
  body: JSON.stringify({
    text: query,
  }),
  headers: {
    "Content-Type": "application/json",
  },
})
  .then((response) => response.json())
  .then((result) => {
    // Display the ChatGPT answer.
    document.getElementById("chatgpt-results").innerHTML = result.text;
  });
